<?php

namespace App\Http\Controllers\Admin;
use App\Models\Exposideprice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class ExposidepriceController extends Controller
{
    
    public function index()
    {
		$id = 1;
		$expoprice = DB::table('exposideprices')->where('status', '!=', 2)->get();
		//echo "<pre>";print_r($expoprice);die;
		$result['data']=$expoprice;
        return view('admin.exposideprice.exposideprice',compact('result','id'));
    }
    public function manage_exposideprice(Request $request,$id='')
    {
		$result = [];
		
		//$ids =1;
		
		if($id > 0){				
			//$arr = DB::table('exposideprices')->where('id', $id)->first(); 
			$arr = DB::table('exposideprices')->where('status', '!=', 2)->get();
			//echo $arr[1]->exponame; 
			//echo "<pre>";print_r($arr);die;
			if($arr->count()>0){
				$result['exponame0']=$arr[0]->exponame;
				$result['exponame1']=$arr[1]->exponame;
				$result['exponame2']=$arr[2]->exponame;
				$result['exponame3']=$arr[3]->exponame;
				
				$result['price11']=$arr[0]->price1;
				$result['price12']=$arr[0]->price2;
				
				$result['price21']=$arr[1]->price1;
				$result['price22']=$arr[1]->price2;
				
				$result['price31']=$arr[2]->price1;
				$result['price32']=$arr[2]->price2;
				
				$result['price41']=$arr[3]->price1;
				$result['price42']=$arr[3]->price2;
				
				
				$result['status']=$arr[0]->status;
				$result['id']=$arr[0]->id;
			}
			else{
				$result['exponame0']='';
				$result['exponame1']='';
				$result['exponame2']='';
				$result['exponame3']='';
				
				$result['price11']='';
				$result['price12']='';
				
				$result['price21']='';
				$result['price22']='';
				
				$result['price31']='';
				$result['price32']='';
				
				$result['price41']='';
				$result['price42']='';
				
				
				//$result['status']=$arr[0]->status;
				$result['id']=1;
			}
        }else{
			//$id = 1;
			//echo 'hello';die;
			// $arr = DB::table('exposideprices')->where('id', $id)->first(); 
			$result['exponame']	='';
			$result['price1']	='';
			$result['price2']	='';
			$result['status']	='';
			$result['id']=0;
        }
        return view('admin.exposideprice.manage_exposideprice',$result);
    }
    public function manage_exposideprice_process(Request $request)
    {
         /*$request->validate([
		 	'fname'=>'required',
		 	'lname'=>'required',
		 	'email'=>'required',
		 	'password' => $request->post('id') > 0 ? 'nullable' : 'required',
		 	'phone'=>'required',
		 	'status'=>'required',
		 ],
		 [
		 	'fname.required' => 'The first name is required.',
		 	'lname.required' => 'The last name is required.',
		 	'email.required' => 'The email is required.',
		 	'password.required' => 'The password is required.',
		 	'phone.required' => 'The phone is required.',
		 	'status.required' => 'The status is required.',
		 ]);*/
		
        if($request->post('id')>0){
			Exposideprice::query()->truncate();
			//$status = $request->post('status');
			$exponames = $request->post('exponame');
			$price1_values = $request->post('price1');
			$price2_values = $request->post('price2');
			$insertData = [];
			foreach ($exponames as $key => $exponame_val) {
				$insertData[] = [
					'exponame' => $exponame_val,
					'price1' => $price1_values[$key],
					'price2' => $price2_values[$key],
					'status' => 1,
					'updated_at' => date('Y-m-d H:i:s')
				];
			}
			//echo "<pre>";print_r($insertData); 
			//die;
			DB::table('exposideprices')->insert($insertData);
			$msg="Expoprice has been updated successfully.";
			
        }
		else {
			$status = $request->post('status');
			$exponames = $request->post('exponame');
			$price1_values = $request->post('price1');
			$price2_values = $request->post('price2');
			$insertData = [];
			foreach ($exponames as $key => $exponame_val) {
				$insertData[] = [
					'exponame' => $exponame_val,
					'price1' => $price1_values[$key],
					'price2' => $price2_values[$key],
					'status' => $status,
					'created_at' => date('Y-m-d H:i:s')
				];
			}
			//echo "<pre>";print_r($insertData); 
			//die;
			DB::table('exposideprices')->insert($insertData);

			$msg = "New Expoprice entries have been added successfully.";
        }
        $request->session()->flash('message',$msg);
        //return redirect('exposideprice');
        return redirect('exposideprice/add-exposideprice/1');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('exposideprices')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','user has been deleted successfully.');
			return response()->json(['success'=>'user has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'user not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('exposideprices')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','user has been deleted successfully.');
			return response()->json(['success'=>'user has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'user not deleted.']);
		}
    }
	public function status(Request $request){
		$updated = DB::table('exposideprices')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'user status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'user not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('exposideprices')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','user status has been updated successfully.');
			return response()->json(['success'=>'user status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'user not updated.']);
		}
    }
}
