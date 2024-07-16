<?php

namespace App\Http\Controllers\Admin;
use App\Models\MaterialPly6MM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
class UserController extends Controller
{
    
    public function index()
    {
		$categories = DB::table('admins')->where('status', '!=', 2)->get();
		$result['data']=$categories;
        return view('admin.user.user',$result);
    }
	public function manage_user(Request $request,$id='')
    {
		$result = [];
		if($id>0){				
			$arr = DB::table('admins')->where('id', $id)->first(); 
			//echo '<pre>';print_r($arr);die;
			if($arr){
				$result['fname']=$arr->fname;
				$result['lname']=$arr->lname;
				$result['email']=$arr->email;
				$result['password']= Hash::make($arr->password);
				$result['role_id']	= $arr->role_id;
				$result['phone']=$arr->phone;
				$result['image']=$arr->image;
				$result['joindate']=$arr->created_at;
				$result['status']=$arr->status;
				$result['id']=$arr->id;
			}else{
				$result['fname']	='';
				$result['lname']	='';
				$result['email']	='';
				$result['password']	='';
				$result['phone']	='';
				$result['role_id']	='';
				$result['image']	= '';
				$result['joindate']	= '';
				$result['status']	='';
				$result['id']		= $id;
			}
        }else{
			
			$result['fname']	='';
			$result['lname']	='';
			$result['email']	='';
			$result['password']	='';
			$result['phone']	='';
			$result['role_id']	='';
			$result['image']	= '';
			$result['joindate']	= '';
			$result['status']	='';
			$result['id']=0;
        }
        return view('admin.user.manage_user',$result);
    }
    public function manage_user_process(Request $request)
    {
        $request->validate([
			'fname'=>'required',
			'lname'=>'required',
			'email'=>'required',
			'password' => $request->post('id') > 0 ? 'nullable' : 'required',
			'phone'=>'required',
			'role_id'=>'required',
			'joindate'=>'required',
			'status'=>'required',
		],
		[
			'fname.required' => 'The first name is required.',
			'lname.required' => 'The last name is required.',
			'email.required' => 'The email is required.',
			'password.required' => 'The password is required.',
			'phone.required' => 'The phone is required.',
			'role_id.required' => 'The user type is required.',
			'joindate.required' => 'Joining date is required.',
			'status.required' => 'The status is required.',
		]);
		
		if($request->file('image'))
		{
			$imageName = time().'.'.$request->image->extension();
			$request->image->move(public_path('admin-assets/images/users'), $imageName);
		}
		else{
			$imageName = $request->post('hidimg');
		}
		
        if($request->post('id')>0){
			$username = strtoupper($request->post('fname')[0]).strtoupper($request->post('lname')[0]).rand('1000','9999');
			
			$existingData = DB::table('admins')->where('id', $request->post('id'))->first();
			if ($existingData->fname != $request->post('fname') ||
				$existingData->lname != $request->post('lname') ||
				$existingData->email != $request->post('email') ||
				$existingData->phone != $request->post('phone') || 
				$existingData->role_id != $request->post('role_id') ||
				$existingData->image != $imageName ||
				$existingData->created_at != $request->post('joindate') ||
				$existingData->status != $request->post('status') ||
				($request->filled('password') && !Hash::check($request->post('password'), $existingData->password))
		    ) {
				DB::table('admins')
				->where('id', $request->post('id'))
				->update([
				'fname' => $request->post('fname'),
				'lname' => $request->post('lname'),
				'email' => $request->post('email'),
				'password' =>  Hash::make($request->post('password')),
				'username' =>  $username,
				'phone' => $request->post('phone'),
				'role_id' => $request->post('role_id'),
				'image' => $imageName,
				'created_at' => date('Y-m-d', strtotime(str_replace('/', '-', $request->post('joindate')))),
				'status' => $request->post('status'),
				'updated_at' => date('Y-M-d H:i:s'),
				]);
           		 $msg="user has been updated successfully.";
			}else {
				$msg = "No changes detected. User data remains unchanged.";
			}
        }
		else {
			$username = strtoupper($request->post('fname')[0]).strtoupper($request->post('lname')[0]).rand('1000','9999');
			DB::table('admins')->insert([
				'role_id' => 2,
				'fname' => $request->post('fname'),
				'lname' => $request->post('lname'),
				'email' => $request->post('email'),
				'password' =>  Hash::make($request->post('password')),
				'username' =>  $username,
				'phone' => $request->post('phone'),
				'role_id' => $request->post('role_id'),
				'image' 	=> $imageName,
				'created_at' => date('Y-m-d', strtotime(str_replace('/', '-', $request->post('joindate')))),
				'status' => $request->post('status'),
			]);
            $msg="New user has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('user');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('admins')
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
		$deleted = DB::table('admins')
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
		$updated = DB::table('admins')
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
		$updated = DB::table('admins')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','user status has been updated successfully.');
			return response()->json(['success'=>'user status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'user not updated.']);
		}
    }
	public function our_staff()
	{
		$staff = DB::table('admins')->where('role_id', '!=' ,1)->where('status', '!=', 2)->get();
		$result['data']=$staff;
        return view('admin.staff.staff',$result);
	}
}
