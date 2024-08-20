<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempaddtocart extends Model
{
    use HasFactory;
	protected $fillable = [
        'product_id',
        'product_name',
        'price',
        'length',
        'breadth',
        'deep'
    ];
	
	public function get_products()
	{
		return $this->belongsTo(Products::class, 'product_id', 'id');
	}
}
