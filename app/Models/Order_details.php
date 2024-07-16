<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
	protected $guarded = [];
    use HasFactory;
	protected $fillable = [
        'order_id',
        'Category',
        'subcategory',
        'cabinet_type',
        'width',
		'length',
		'deep',
		'quantity',
		'material',
		'cabinetcolour',
		'exposide',
		'expo_colour',
		'shutter_material',
		'shutter_colour',
		'leg_type',
		'skthigh',
		'handel_type',
		'shutter_finish',
		'remarks',
		'price',
		'LXD',
		'WXL',
		'WXD',
		'status'
    ];
	public function category()
    {
        return $this->belongsTo(Category::class, 'Category');
    }
	public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory');
    }
	public function cabinettypes()
    {
        return $this->belongsTo(Cabinettype::class, 'cabinet_type');
    }
	public function materials()
    {
        return $this->belongsTo(Material::class, 'material');
    }
	public function cabinetcolour()
    {
        return $this->belongsTo(Cabinet::class, 'cabinetcolour');
    }
	public function exposides()
    {
        return $this->belongsTo(Exposide::class, 'exposide');
    }
	public function shuttermaterials()
    {
        return $this->belongsTo(ShutterMaterial::class, 'shutter_material');
    }
	public function legtypes()
    {
        return $this->belongsTo(Legtype::class, 'leg_type');
    }
	public function handeltypes()
    {
        return $this->belongsTo(Handeltype::class, 'handel_type');
    }
}
