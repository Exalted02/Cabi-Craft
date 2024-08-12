<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartorderforms extends Model
{
    use HasFactory;
	protected $fillable = [
        'project_name',
        'address',
        'city',
        'zip_code',
        'state',
        'country',
        'mobile',
        'project_type',
		'status'
    ];
}
