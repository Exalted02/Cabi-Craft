<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpanseTracker extends Model
{
    use HasFactory;
	protected $fillable = [
        'miscellaneous',
        // 'price',
        'expensetypes_id',
        'amount',
        'date',
        'paymentmode_id',
        'remark',
		'status'
    ];

    public function expense_type()
    {
        // return $this->hasMany('App\Models\ExpenseType');
        return $this->hasMany(ExpenseType::class);
    }
}
