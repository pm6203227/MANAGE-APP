<?php

namespace App\Http\Requests\Admin\Requisition;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreRequisition extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.requisition.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'approved_by' => ['nullable', 'string'],
            'article' => ['nullable', 'string'],
            'delivery_terms' => ['nullable', 'string'],
            'order' => ['nullable', 'string'],
            'order_date' => ['nullable', 'date'],
            'payment_date' => ['nullable', 'date'],
            'produced_by' => ['nullable', 'string'],
            'provider' => ['nullable', 'string'],
            'quantity' => ['nullable', 'integer'],
            'received_by' => ['nullable', 'string'],
            'total' => ['nullable', 'numeric'],
            'unit_price' => ['nullable', 'numeric'],
            'user_id' => ['nullable', 'integer'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
