<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable = [
        'approved_by',
        'article',
        'delivery_terms',
        'order',
        'order_date',
        'payment_date',
        'produced_by',
        'provider',
        'quantity',
        'received_by',
        'total',
        'unit_price',
        'user_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'order_date',
        'payment_date',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/requisitions/'.$this->getKey());
    }
}
