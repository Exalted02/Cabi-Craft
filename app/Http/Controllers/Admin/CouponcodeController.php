<?php

namespace App\Http\Controllers\Admin;

use App\Models\Couponcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Image;
use File;
use Carbon\Carbon;

class CouponcodeController extends Controller
{
    public function index()
    {
		$categories = Couponcode::query()->where('status','!=', 2)->get();
		// dd($categories);
		$result['data']=$categories;
        return view('admin.couponcode.couponcode',$result);
    }
    public function manage_couponcode(Request $request,$id='')
    {
		$result = [];
		if($id>0){				
			$arr = Couponcode::query()->where('id', $id)->first(); 
			// dd($arr);
			if($arr){
				$result['code']=$arr->code;
				$result['value']=$arr->value;
				$result['mode']=$arr->mode;
				$result['expire_date']=$arr->expire_date;
				$result['image']=$arr->image;
				$result['status']=$arr->status;
				//$result['price_per_quantity']=$arr->price_per_quantity;
				$result['id']=$arr->id;
			}else{
				$result['code']			='';
				$result['value']		='';
				$result['mode']			='';
				$result['expire_date']	='';
				$result['image']		='';
				$result['status']		='';
				//$result['price_per_quantity']		='';
				$result['id']			= $id;
			}
        }else{
			
			$result['code']			='';
			$result['value']		='';
			$result['mode']			='';
			$result['expire_date']	='';
			$result['image']		='';
			$result['status']		='';
			//$result['price_per_quantity']='';
			$result['id']			=0;
        }
        return view('admin.couponcode.manage_couponcode',$result);
    }
    public function manage_couponcode_process(Request $request)
    {
		
        $request->validate([
			'code'=>'required',
			'value'=>'required',
			'mode'=>'required',
			'expire_date'=>'required',
			//'image'=>'required',
			'status'=>'required',
		]);
		
		
        if($request->post('id')>0){
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				$request->image->move(public_path('admin-assets/images/couponcode'), $imageName);
			}
			else{
				$imageName = $request->post('hidimg');
			}
			
			$model=Couponcode::find($request->post('id'));
			$model->code=$request->post('code');
			$model->value=$request->post('value');
			$model->mode=$request->post('mode');
			//$model->expire_date= Carbon::createFromFormat('d/m/Y', $request->post('expire_date'))->format('Y-m-d');
			$model->image=$imageName;
			$model->status=$request->post('status');
			$model->updated_at=date('Y-m-d H:i:s');
			$model->save();
            $msg="Coupon code has been updated successfully.";

        }else{
			$imageName = '';
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				$request->image->move(public_path('admin-assets/images/couponcode'), $imageName);
			}
            $model=new Couponcode();
			$model->status = $request->post('status');
			$model->code = $request->post('code');
			$model->value = $request->post('value');
			$model->mode = $request->post('mode');
			$model->expire_date = Carbon::createFromFormat('d/m/Y', $request->post('expire_date'))->format('Y-m-d');
			$model->image=$imageName;
			//$model->updated_at=null;
			$model->save();
            $msg="New coupon code has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('couponcode');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('couponcodes')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Coupon code has been deleted successfully.');
			return response()->json(['success'=>'Coupon code has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Coupon code not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('couponcodes')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Coupon code has been deleted successfully.');
			return response()->json(['success'=>'Coupon code has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Coupon code not deleted.']);
		}
    }
	public function status(Request $request){
		//echo 'hello-'.$request->val;
		$updated = DB::table('couponcodes')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Coupon code status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Coupon code not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('couponcodes')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Coupon code  status has been updated successfully.');
			return response()->json(['success'=>'Coupon code status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Coupon code not updated.']);
		}
    }
	public function get_coupon_value(Request $request)
	{
		$result = [];
		$discount_code = $request->discount_code;
		$chk = Couponcode::select('value','mode')->where('code',$discount_code)->first();
		if($chk)
		{
			$result['status'] = 1;
			$result['mode'] = $chk->mode;
			$result['couponvalue'] = $chk->value;
		}
		else{
			$result['status'] = 0;
		}
		echo json_encode($result);
	}
}
