<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tempaddtocart;
use App\Models\Temporderroomtype;
use App\Models\Order;
use App\Models\Order_details;
use App\Models\Products;

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
        return view('cart',compact('cartdata','order_id'));
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
	public function offerdetail($id='')
	{
		$product_details = Products::where(['id'=>$id,'status'=>1])->first();
        return view('offerdetails',compact('product_details'));
	}
	public function neworder()
	{
		return view('neworder');
	}
	public function save_order(Request $request)
	{
		$order_id = $request->post('order_id');
		$cartData = Tempaddtocart::where(['order_id'=>$order_id,'user_id'=>auth()->user()->id])->get();
		//echo "<pre>";print_r($cartData);die;
		
		$invoice_no = Order::orderBy('invoice_no', 'desc')->value('invoice_no');
		$exp_invoice_no = explode('-',$invoice_no);
	
		$add_invoice_no = sprintf('%03d', (int)$exp_invoice_no[1] + 1);
		$inv_no = 'INV-'.$add_invoice_no;
		
		
		$ordermodel = new Order();
		$ordermodel->username  		= auth()->user()->username;
		$ordermodel->customer_name  = auth()->user()->fname.' '.auth()->user()->lname;
		$ordermodel->invoice_no  		= $inv_no;
		$ordermodel->invoice_date  		= date('Y-m-d');
		$ordermodel->total_amount  		= $request->post('tot_amount');
		$ordermodel->discount_coupon  	= '';
		$ordermodel->gstAmt  			= $request->post('gst');
		$ordermodel->grand_total  		= $request->post('grand_tot');
		$ordermodel->status  			= 1;
		$ordermodel->created_at  		= date('Y-m-d h:i:s');
		$ordermodel->save();
		$lastId  = $ordermodel->id;
		
		foreach($cartData as $val)
		{
			$orderDtlsmodel = new Order_details();
			$orderDtlsmodel->order_id  			= $lastId;
			$orderDtlsmodel->room_id  			= $val->room_type_id;
			$orderDtlsmodel->product_id  		= $val->product_id;
			$orderDtlsmodel->width  			= $val->breadth;
			$orderDtlsmodel->length  			= $val->length;
			$orderDtlsmodel->deep  				= $val->deep;
			$orderDtlsmodel->quantity  			= $val->qty;
			$orderDtlsmodel->material  			= $val->cabinet_material;
			$orderDtlsmodel->cabinetcolour  	= $val->box_Inner_laminate;
			$orderDtlsmodel->exposide  			= $val->expo;
			$orderDtlsmodel->expo_colour  		= $val->expo_colour;
			$orderDtlsmodel->shutter_material  	= $val->shutter_material;
			$orderDtlsmodel->shutter_colour  	= '';
			$orderDtlsmodel->leg_type  			= $val->leg_type;
			$orderDtlsmodel->skthigh  			= $val->skt_height;
			$orderDtlsmodel->handel_type  		= $val->handle_type;
			$orderDtlsmodel->shutter_finish  	= $val->shutter_finish;
			$orderDtlsmodel->price  			= $val->price;
			$orderDtlsmodel->status  			= 1;
			$orderDtlsmodel->save();
		}
		
		return redirect()->back()->with('success', 'Order saved successfully.');
	}
}
