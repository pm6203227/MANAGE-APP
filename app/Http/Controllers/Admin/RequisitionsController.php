<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Requisition\BulkDestroyRequisition;
use App\Http\Requests\Admin\Requisition\DestroyRequisition;
use App\Http\Requests\Admin\Requisition\IndexRequisition;
use App\Http\Requests\Admin\Requisition\StoreRequisition;
use App\Http\Requests\Admin\Requisition\UpdateRequisition;
use App\Models\Requisition;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class RequisitionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRequisition $request
     * @return array|Factory|View
     */
    public function index(IndexRequisition $request)
    {
        
        $user = Auth::user();
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Requisition::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['approved_by', 'article', 'delivery_terms', 'id', 'order', 'order_date', 'payment_date', 'produced_by', 'provider', 'quantity', 'received_by', 'total', 'unit_price', 'user_id'],

            // set columns to searchIn
            ['approved_by', 'article', 'delivery_terms', 'id', 'order', 'produced_by', 'provider', 'received_by']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.requisition.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.requisition.create');

        return view('admin.requisition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequisition $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRequisition $request)
    {
        
        $user = Auth::user();
        
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Requisition
        $requisition = new Requisition;
        $requisition->fill($request->all());
        $requisition->user_id = $user->id;
        $requisition->produced_by = $user->first_name;
        $requisition->total = $request->input("quantity") * $request->input("unit_price");
        $requisition->save();
        

        if ($request->ajax()) {
            return ['redirect' => url('admin/requisitions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/requisitions');
    }

    /**
     * Display the specified resource.
     *
     * @param Requisition $requisition
     * @throws AuthorizationException
     * @return void
     */
    public function show(Requisition $requisition)
    {
        $this->authorize('admin.requisition.show', $requisition);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Requisition $requisition
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Requisition $requisition)
    {
        $this->authorize('admin.requisition.edit', $requisition);


        return view('admin.requisition.edit', [
            'requisition' => $requisition,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequisition $request
     * @param Requisition $requisition
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRequisition $request, $id)
    {
         $user = Auth::user();

        // Update changed values Requisition
        $requisition = Requisition::where('id',$id)->first();
        $requisition->fill($request->all());
        $requisition->user_id = $user->id;
        $requisition->produced_by = $user->first_name;
        $requisition->total = $request->input("quantity") * $request->input("unit_price");
        $requisition->save();

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/requisitions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/requisitions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRequisition $request
     * @param Requisition $requisition
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRequisition $request, Requisition $requisition)
    {
        $requisition->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRequisition $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRequisition $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Requisition::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
