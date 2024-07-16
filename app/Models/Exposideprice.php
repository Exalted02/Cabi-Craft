<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exposideprice extends Model
{
    use HasFactory;
	protected $fillable = [
        'exponame',
        'price1',
		'price2'
    ];
}
