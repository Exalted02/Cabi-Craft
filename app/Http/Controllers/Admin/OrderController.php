<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_details;
use Dompdf\Dompdf;
use Dompdf\Options;
use Auth;

class OrderController extends Controller
{
    public function order(Request $request)
	{
		//$data = array();
		$data  = (Auth::guard('admin')->user()->role_id == 1) ? Order::all() : Order::where('username' , Auth::guard('admin')->user()->username)->get();
		$statusArr = order_status();
		//echo "<pre>";print_r($data);die;
		//echo 'order'; die;
		return view('admin.order.order_list_new',compact('data','statusArr'));
		//return view('admin.order.order_list',compact('data','statusArr'));
	}
	public function order_store(Request $request)
	{
		$cust_nm 		= $request->cust_nm;
		$addr 			= $request->addr;
		$inv_dt 		= $request->inv_dt;
		$city 			= $request->city;
		$state 			= $request->state;
		$zipcode 		= $request->zipcode;
		$username 		= $request->username;
		$inv_no 		= $request->inv_sl;
		$total_amount 	= $request->total_amount;
		$discount_coupon 	= $request->discount_coupon;
		$gstAmt 		= $request->gstAmt;
		$grand_total 	= $request->grand_total;
		$excel_sl_no 	= $request->excel_sl_no;
		$order_type 	= $request->order_type;
		//echo $zipcode.''.$username;die;
		//Order::
		/*'total_amount' 		=> $total_amount ,
			'discount_coupon' 	=> $discount_coupon ,
			'gstAmt' 			=> $gstAmt ,
			'grand_total' 		=> $grand_total ,*/
		//echo "<pre>";print_r($request->storedData);die;
			
		$arr = Order::query()->where('excel_sl_no',$excel_sl_no)->first(); 
		$update = [];
		$order_id = '';
		if($arr)
		{
			$update = [
				'username' 			=> $username,
				'excel_sl_no' 		=> $excel_sl_no,
				'invoice_no' 		=> $inv_no,
				'customer_name' 	=> $cust_nm ,
				'address' 			=> $addr,
				'city' 				=> $city,
				'state' 			=> $state,
				'zipcode' 			=> $zipcode,
				'invoice_date' 		=> $inv_dt,
				'total_amount' 		=> $total_amount,
				'discount_coupon' 	=> $discount_coupon,
				'gstAmt' 			=> $gstAmt,
				'grand_total' 		=> $grand_total,
				'order_type' 		=> $order_type,
				'status' 			=> 1,
				'created_at' 		=> date('Y-m-d H:i:s'),
				'updated_at' 		=> date('Y-m-d H:i:s')
			];
			Order::where('excel_sl_no',$excel_sl_no)->update($update);
			
			$order_id = $arr->id;
			Order_details::where('order_id', $order_id)->delete();
			foreach($request->storedData as $val)
			{
				Order_details::create([
					'order_id' 			=> $order_id,
					'Category' 			=> $val['categoryId'],
					'subcategory' 		=> $val['subcategoryId'],
					'cabinet_type' 		=> $val['cabinetTypeId'],
					'width' 			=> $val['width'],
					'length' 			=> $val['deep'],
					'deep' 				=> $val['length'],
					'quantity' 			=> $val['qty'],
					'material' 			=> $val['materialSelectId'],
					'cabinetcolour' 	=> $val['cabinetcolourId'],
					'exposide' 			=> $val['exposideId'],
					'expo_colour' 		=> $val['expocolour'],
					'shutter_material' 	=> $val['shuttermaterialId'],
					'shutter_colour' 	=> $val['shuttercolour'],
					'leg_type' 			=> $val['legtypeId'],
					'skthigh' 			=> $val['sktheight'],
					'handel_type' 		=> $val['handeltypeId'],
					'shutter_finish' 	=> '',
					'remarks' 			=> '',
					'price' 			=> $val['price'],
					'LXD' 				=> $val['A1'],
					'WXL' 				=> $val['A3'],
					'WXD' 				=> $val['A2'],
					'status' 			=> 1,
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s')
				]);
			}
		}
		else{
			Order::create([
				'username' 			=> $username,
				'excel_sl_no' 		=> $excel_sl_no,
				'invoice_no' 		=> $inv_no,
				'customer_name' 	=> $cust_nm ,
				'address' 			=> $addr,
				'city' 				=> $city,
				'state' 			=> $state,
				'zipcode' 			=> $zipcode,
				'invoice_date' 		=> $inv_dt,
				'total_amount' 		=> $total_amount,
				'discount_coupon' 	=> $discount_coupon,
				'gstAmt' 			=> $gstAmt,
				'grand_total' 		=> $grand_total,
				'order_type' 		=> $order_type,
				'status' 			=> 1,
				'created_at' 		=> date('Y-m-d H:i:s'),
				'updated_at' 		=> date('Y-m-d H:i:s')
			]);
		
			$maxId = Order::max('id');
			foreach($request->storedData as $val)
			{
				Order_details::create([
					'order_id' 			=> $maxId,
					'Category' 			=> $val['categoryId'],
					'subcategory' 		=> $val['subcategoryId'],
					'cabinet_type' 		=> $val['cabinetTypeId'],
					'width' 			=> $val['width'],
					'length' 			=> $val['deep'],
					'deep' 				=> $val['length'],
					'quantity' 			=> $val['qty'],
					'material' 			=> $val['materialSelectId'],
					'cabinetcolour' 	=> $val['cabinetcolourId'],
					'exposide' 			=> $val['exposideId'],
					'expo_colour' 		=> $val['expocolour'],
					'shutter_material' 	=> $val['shuttermaterialId'],
					'shutter_colour' 	=> $val['shuttercolour'],
					'leg_type' 			=> $val['legtypeId'],
					'skthigh' 			=> $val['sktheight'],
					'handel_type' 		=> $val['handeltypeId'],
					'shutter_finish' 	=> '',
					'remarks' 			=> '',
					'price' 			=> $val['price'],
					'LXD' 				=> $val['A1'],
					'WXL' 				=> $val['A3'],
					'WXD' 				=> $val['A2'],
					'status' 			=> 1,
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s')
				]);
			}
		}
		echo  $inv_no;
		//echo json_encode($inv_no);
	}
	public function order_status(Request $request)
	{
		$status   = $request->status;
		$order_id = $request->order_id;
		$updated = Order::where(['id'=>$request->order_id])
			->update(['status'=>$request->status]);
		if($updated){
			return response()->json(['success'=>'status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Not updated.']);
		}
		
	}
	public function download_pdf($id='')
	{
		$order = Order::where('id',$id)->first();
		$ordtls = Order_details::with('category','subcategory','cabinettypes','materials','cabinetcolour','exposides','shuttermaterials','legtypes','handeltypes')->where('order_id',$id)->get();
		//echo "<pre>";print_r($ordtls);die;
		/*$pdfContent = view('pdf/orderpdf')->render();
		$dompdf = new Dompdf();
        $dompdf->loadHtml($pdfContent);
        $dompdf->render();
        return $dompdf->stream('document.pdf');*/
		//$name = '';
		//$imgpath = asset('admin-assets/images/cabinettype/product-04.jpg');
		//echo $imgpath; die;
		$html = view('pdf/orderpdf',compact('order','ordtls'))->render();

        // Setup Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
		
		/*$pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->getDomPDF()->setHttpContext($contxt);
		$pdf->loadView('pdf', compact('performer_order_details','perform_candidate','receipt','pdf'));*/

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // (Optional) Set the paper size and orientation
        //$dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (inline or download)
        return $dompdf->stream('invoice.pdf');
	}
	public function order_edit_bck($exlid='')
	{
		$orderDetails = Order_details::where('order_id',$exlid)->get();
		//echo "<pre>";print_r($orderDetails);die;
		//$order_type = $order->order_type;
		$statusArr = order_status();
		$role_id = Auth::guard('admin')->user()->role_id;
		$username = Auth::guard('admin')->user()->username;
		return view('admin.order.order_list_new_details',compact('role_id','username','exlid','orderDetails','statusArr'));
	}
	public function order_edit($exlid='') // 30-08-2024
	{
		$order = Order::select('order_type')->where('excel_sl_no',$exlid)->first();
		$order_type = $order->order_type;
		$role_id = Auth::guard('admin')->user()->role_id;
		$username = Auth::guard('admin')->user()->username;
		return view('admin.order.order_edit',compact('role_id','username','exlid','order_type'));
	}
	public function order_view($exlid='')
	{
		$role_id = Auth::guard('admin')->user()->role_id;
		$username = Auth::guard('admin')->user()->username;
		$ord = Order::where('excel_sl_no',$exlid)->first();
		$totAmt  		= $ord->total_amount;
		$discountAmt  	= $ord->discount_coupon;
		$gstAmt  		= $ord->gstAmt;
		$g_totAmt  		= $ord->grand_total;
		return view('admin.order.order_view',compact('role_id','username','exlid','totAmt','discountAmt','gstAmt','g_totAmt'));
	}
	public function order_search(Request $request)
	{
		$statusArr = order_status();
		$orders = Order::query();
		if ($request->filled('customer_name')) {
			$customer_name = $request->customer_name;
			$orders->where('customer_name', 'like', "%{$customer_name}%");
		}

		if ($request->filled('start_date') && $request->filled('end_date')) {
			$start_date = $request->start_date;
			$end_date = $request->end_date;
			$orders->whereBetween('invoice_date', [$start_date, $end_date]);
		}

		if ($request->filled('order_status')) {
			$order_status = $request->order_status;
			$orders->where('status', $order_status);
		}
		
		$data = $orders->get();
		//echo "<pre>"; print_r($ordetlist);die;
		return view('admin.order.order_list',compact('data','statusArr'));

	}
	public function order_view_details($ordid='')
	{
		$orderDetails = Order_details::with('product','room')->where('order_id',$ordid)->get();
		//echo "<pre>";print_r($orderDetails);die;
		//$order_type = $order->order_type;
		$statusArr = order_status();
		$role_id = Auth::guard('admin')->user()->role_id;
		$username = Auth::guard('admin')->user()->username;
		return view('admin.order.order_list_new_details',compact('role_id','username','ordid','orderDetails','statusArr'));
	}
	public function sub_order_details(Request $request)
	{
		$id = $request->post('id');
		$Order_details  = Order_details::with('cabinettypes','materials','cabinetcolour','exposides','shuttermaterials','legtypes','handeltypes')->where('id',$id)->first();
		
		//echo "<pre>";print_r($Order_details);die;
		//dd($Order_details->cabinetcolour->name);
		//echo $Order_details->cabinetcolour->id;die;
		$result = array();
		//$result['cabinettypes']  = $Order_details->cabinettypes->name ?? '';
		$result['materials']  	 = $Order_details->materials->name ?? '';
		$result['cabinetcolour']  = $Order_details->cabinetcolour->name ?? '';
		$result['exposides']  	 = $Order_details->exposides->name ?? '';
		$result['shuttermaterials'] = $Order_details->shuttermaterials->name ?? '';
		$result['legtypes']  	 = $Order_details->legtypes->name ?? '';
		$result['handeltypes']   = $Order_details->handeltypes->name ?? '';
		echo json_encode($result);
	}
	
	/*public function order_store_details(Request $request) // not used for testing purpose
	{
		//echo "<pre>";print_r($request->storedData);die;
		foreach($request->storedData as $val)
		{
			Order_details::create([
				'order_id' 			=> 1,
				'Category' 			=> $val['categoryId'],
				'subcategory' 		=> $val['subcategoryId'],
				'cabinet_type' 		=> $val['cabinetTypeId'],
				'width' 			=> $val['width'],
				'length' 			=> $val['deep'],
				'deep' 				=> $val['length'],
				'quantity' 			=> $val['qty'],
				'material' 			=> $val['materialSelectId'],
				'cabinetcolour' 	=> $val['cabinetcolourId'],
				'exposide' 			=> $val['exposideId'],
				'expo_colour' 		=> $val['expocolour'],
				'shutter_material' 	=> $val['shuttermaterialId'],
				'shutter_colour' 	=> $val['shuttercolour'],
				'leg_type' 			=> $val['legtypeId'],
				'skthigh' 			=> $val['sktheight'],
				'handel_type' 		=> $val['handeltypeId'],
				'shutter_finish' 	=> '',
				'remarks' 			=> '',
				'price' 			=> $val['price'],
				'LXD' 				=> $val['A1'],
				'WXL' 				=> $val['A3'],
				'WXD' 				=> $val['A2'],
				'status' 			=> 1,
				'created_at' 		=> date('Y-m-d H:i:s'),
				'updated_at' 		=> date('Y-m-d H:i:s')
			]);
		}
	}*/
}
