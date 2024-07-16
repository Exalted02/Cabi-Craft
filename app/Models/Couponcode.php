<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couponcode extends Model
{
    use HasFactory;
	protected $fillable = [
        'code',
        'value',
        'mode',
        'expire_date',
        'image',
		'status'
    ];
}
