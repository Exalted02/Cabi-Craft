<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinettype extends Model
{
    use HasFactory;
	protected $fillable = [
        'subcategory_id',
        'name',
        'LXD',
        'WXD',
        'WXL',
        'hardware_amt',
        'image',
		'status'
    ];
}
