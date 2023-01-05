<div class="form-group row align-items-center" :class="{'has-danger': errors.has('order'), 'has-success': fields.order && fields.order.valid }">
    <label for="order" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.order') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.order" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('order'), 'form-control-success': fields.order && fields.order.valid}" id="order" name="order" placeholder="{{ trans('admin.requisition.columns.order') }}">
        <div v-if="errors.has('order')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('order') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('provider'), 'has-success': fields.provider && fields.provider.valid }">
    <label for="provider" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.provider') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.provider" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('provider'), 'form-control-success': fields.provider && fields.provider.valid}" id="provider" name="provider" placeholder="{{ trans('admin.requisition.columns.provider') }}">
        <div v-if="errors.has('provider')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('provider') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('order_date'), 'has-success': fields.order_date && fields.order_date.valid }">
    <label for="order_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.order_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.order_date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('order_date'), 'form-control-success': fields.order_date && fields.order_date.valid}" id="order_date" name="order_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('order_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('order_date') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('payment_date'), 'has-success': fields.payment_date && fields.payment_date.valid }">
    <label for="payment_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.payment_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.payment_date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('payment_date'), 'form-control-success': fields.payment_date && fields.payment_date.valid}" id="payment_date" name="payment_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('payment_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('payment_date') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('delivery_terms'), 'has-success': fields.delivery_terms && fields.delivery_terms.valid }">
    <label for="delivery_terms" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.delivery_terms') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.delivery_terms" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('delivery_terms'), 'form-control-success': fields.delivery_terms && fields.delivery_terms.valid}" id="delivery_terms" name="delivery_terms" placeholder="{{ trans('admin.requisition.columns.delivery_terms') }}">
        <div v-if="errors.has('delivery_terms')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('delivery_terms') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('article'), 'has-success': fields.article && fields.article.valid }">
    <label for="article" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.article') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.article" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('article'), 'form-control-success': fields.article && fields.article.valid}" id="article" name="article" placeholder="{{ trans('admin.requisition.columns.article') }}">
        <div v-if="errors.has('article')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('article') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('quantity'), 'has-success': fields.quantity && fields.quantity.valid }">
    <label for="quantity" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.quantity') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.quantity" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('quantity'), 'form-control-success': fields.quantity && fields.quantity.valid}" id="quantity" name="quantity" placeholder="{{ trans('admin.requisition.columns.quantity') }}">
        <div v-if="errors.has('quantity')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('quantity') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('unit_price'), 'has-success': fields.unit_price && fields.unit_price.valid }">
    <label for="unit_price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.unit_price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.unit_price" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('unit_price'), 'form-control-success': fields.unit_price && fields.unit_price.valid}" id="unit_price" name="unit_price" placeholder="{{ trans('admin.requisition.columns.unit_price') }}">
        <div v-if="errors.has('unit_price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('unit_price') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('approved_by'), 'has-success': fields.approved_by && fields.approved_by.valid }">
    <label for="approved_by" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.approved_by') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.approved_by" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('approved_by'), 'form-control-success': fields.approved_by && fields.approved_by.valid}" id="approved_by" name="approved_by" placeholder="{{ trans('admin.requisition.columns.approved_by') }}">
        <div v-if="errors.has('approved_by')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('approved_by') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('received_by'), 'has-success': fields.received_by && fields.received_by.valid }">
    <label for="received_by" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.requisition.columns.received_by') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.received_by" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('received_by'), 'form-control-success': fields.received_by && fields.received_by.valid}" id="received_by" name="received_by" placeholder="{{ trans('admin.requisition.columns.received_by') }}">
        <div v-if="errors.has('received_by')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('received_by') }}</div>
    </div>
</div>