<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporderroomtype extends Model
{
    use HasFactory;
	
	protected $table = 'temp_order_room_types';
	
	
	public function get_cart_data()
	{
      return $this->hasMany(Tempaddtocart::class, 'room_type_id', 'id');
	}
	
}

