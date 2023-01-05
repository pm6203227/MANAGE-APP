import AppForm from '../app-components/Form/AppForm';

Vue.component('requisition-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                approved_by:  '' ,
                article:  '' ,
                delivery_terms:  '' ,
                order:  '' ,
                order_date:  '' ,
                payment_date:  '' ,
                produced_by:  '' ,
                provider:  '' ,
                quantity:  '' ,
                received_by:  '' ,
                total:  '' ,
                unit_price:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});