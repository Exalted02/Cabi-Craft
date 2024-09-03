<?php 
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cabinettype;
use App\Models\Material;
use App\Models\Cabinet;
use App\Models\Exposide;
use App\Models\ShutterMaterial;
use App\Models\Legtype;
use App\Models\Handeltype;
use App\Models\Exposideprice;
use App\Models\Couponcode;
use App\Models\EmailManagement;

function getJsonData()
{
		$categories  		= Category::where('status',1)->get();
		$subcategories  	= Subcategory::where('status',1)->get();
		$cabinetTypes  		= Cabinettype::where('status',1)->get();
		$jsonDataArray = [];

		foreach ($categories as $category) {
			$categoryArray = [
				'id' => $category->id,
				'text' => $category->name,
				'image' => asset('admin-assets/images/categories/' .$category->image),
				'subcategories' => []
			];

			foreach ($subcategories as $subcategory) {
				if ($subcategory->category_id == $category->id) {
					$subcategoryArray = [
						'id' => $subcategory->id,
						'text' => $subcategory->name,
						'image' => asset('admin-assets/images/subcategories/' .$subcategory->image),
						'cabinetTypes' => []
					];

					foreach ($cabinetTypes as $cabinetType) {
						if ($cabinetType->subcategory_id == $subcategory->id) {
							$cabinetTypeArray = [
								'id' => $cabinetType->id,
								'text' => $cabinetType->name,
								'image' => asset('admin-assets/images/cabinettype/' .$cabinetType->image),
							];

							$subcategoryArray['cabinetTypes'][] = $cabinetTypeArray;
						}
					}

					$categoryArray['subcategories'][] = $subcategoryArray;
				}
			}

			$jsonDataArray[] = $categoryArray;
		}
	return $jsonDataArray;
}
function getMaterial()
{
	$material  = Material::where('status',1)->get();
	$materialArr = array();
	foreach($material as $key=>$val)
	{
		$materialArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'image' => asset('admin-assets/images/materials/' . $val->image),
        ];
	}
	return $materialArr;
}
function getCabinetcolour()
{
	$cabinet  = Cabinet::where('status',1)->get();
	$cabinetArr = array();
	foreach($cabinet as $key=>$val)
	{
		$cabinetArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'image' => asset('admin-assets/images/cabinetcolors/' . $val->image),
        ];
	}
	return $cabinetArr;
}
function getExposide()
{
	$exposide  = Exposide::where('status',1)->get();
	$exposideArr = array();
	foreach($exposide as $key=>$val)
	{
		$exposideArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'image' => asset('admin-assets/images/exposide/' . $val->image),
        ];
	}
	return $exposideArr;
}
function getShuttermaterial()
{
	$shuttermaterial  = ShutterMaterial::where('status',1)->get();
	$shuttermaterialArr = array();
	foreach($shuttermaterial as $key=>$val)
	{
		$shuttermaterialArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'image' => asset('admin-assets/images/shuttermaterial/' . $val->image),
        ];
	}
	return $shuttermaterialArr;
}
function getLegtype()
{
	$legtype  = Legtype::where('status',1)->get();
	$legtypeArr = array();
	foreach($legtype as $key=>$val)
	{
		$legtypeArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'image' => asset('admin-assets/images/legtype/' . $val->image),
        ];
	}
	return $legtypeArr;
}
function getHandeltype()
{
	$handeltype  = Handeltype::where('status',1)->get();
	$handeltypeArr = array();
	foreach($handeltype as $key=>$val)
	{
		$handeltypeArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'image' => asset('admin-assets/images/handletype/' . $val->image),
        ];
	}
	return $handeltypeArr;
}
function getmaterial18mmData()
{
	$Material18mm  = DB::table('materialply18mm')->where('status',1)->get();
	$Material18mmArr = array();
	foreach($Material18mm as $key=>$val)
	{
		$Material18mmArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'value' => $val->value,
        ];
	}
	return $Material18mmArr;
}
function getmaterial6mmData()
{
	$Material6mm  = DB::table('materialply6mm')->where('status',1)->get();
	$Material6mmArr = array();
	foreach($Material6mm as $key=>$val)
	{
		$Material6mmArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'value' => $val->value,
        ];
	}
	return $Material6mmArr;
}
function getShutterMaterial8mmData()
{
	$shutterMaterial18mm  = DB::table('shuttermaterialply18mm')->where('status',1)->get();
	$shutterMaterial18mmArr = array();
	foreach($shutterMaterial18mm as $key=>$val)
	{
		$shutterMaterial18mmArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'value' => $val->value,
        ];
	}
	return $shutterMaterial18mmArr;
}
function getExposidePriceData()
{
	$exposideprice  = Exposideprice::all();
	$exposidepriceArr = array();
	foreach($exposideprice as $key=>$val)
	{
		$exposidepriceArr[] = [
            'id' => $val->id,
            'text' => $val->exponame,
            'price1' => $val->price1,
            'price2' => $val->price2
        ];
	}
	return $exposidepriceArr;
}
function getCabinetTypePriceData()
{
	$cabinetTypePrice  = DB::table('cabinettypes')->where('status',1)->get();
	$cabinetTypeArr = array();
	foreach($cabinetTypePrice as $key=>$val)
	{
		$cabinetTypeArr[] = [
            'id' => $val->id,
            'text' => $val->name,
            'LXD' => $val->LXD,
            'WXD' => $val->WXD,
            'WXL' => $val->WXL,
            'hardwareAmt' => $val->hardware_amt,
        ];
	}
	return $cabinetTypeArr;
}
function order_status()
{
	$status = [
	   '1' => 'pending',
	   '2' => 'Approval',
	   '3' => 'Payment confirmation',
	   '4' => 'Ordered',
	   '5' => 'Manufacturing',
	   '6' => 'Ready to dispatch',
	   '7' => 'Dispatched',
	   '8' => 'Completed',
	   '9' => 'Confirm order',
	   '10' => 'Cancel order'
	 ];
	 return $status;
}
function couponCodeImages()
{
	$images = Couponcode::select('image')->get();
	return $images;
}
function get_email($id)
{
	$arr = EmailManagement::where('id',$id)->first();
	return $arr;
}

?>