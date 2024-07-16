<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
	protected $fillable = [
        'username',
        'excel_sl_no',
        'invoice_no',
        'customer_name',
        'address',
		'city',
		'state',
		'zipcode',
		'invoice_date',
		'total_amount',
		'discount_coupon',
		'gstAmt',
		'grand_total',
		'order_type',
		'status'
    ];
	
}
