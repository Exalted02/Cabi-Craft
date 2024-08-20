<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tempaddtocart;
use App\Models\Temporderroomtype;

class FrontendController extends Controller
{	
	public function index()
	{
		//dd(Category::get());
		return view('home');
	}
	public function browse()
	{
        return view('browsecatalogue');
	}
	public function cart($order_id='')
	{
		$cartdata = Temporderroomtype::with(['get_cart_data.get_products'])->where(['order_id'=>$order_id,'user_id'=>auth()->user()->id])->where('cabinet_material', '!=',0)->get();
		//echo "<pre>";print_r($cartdata);die;
        return view('cart',compact('cartdata'));
	}
	public function profile()
	{
        return view('profile');
	}
	public function setting()
	{
        return view('setting');
	}
	public function offer()
	{
        return view('offer');
	}
	public function orderhistory()
	{
        return view('orderhistory');
	}
	public function offerdetail()
	{
        return view('offerdetails');
	}
	public function neworder()
	{
		return view('neworder');
	}
}
