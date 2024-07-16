<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Billgenerate;
use App\Models\ExpanseTracker;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cabinettype;
use App\Models\Material;
use App\Models\Cabinet;
use App\Models\Exposide;
use App\Models\ShutterMaterial;
use App\Models\Legtype;
use App\Models\Handeltype;
use DataTables; 
use App\Models\MaterialPly18MM;
use App\Models\MaterialPly6MM;
use App\Models\ShutterMaterialPly18MM;
use App\Models\Exposideprice;
use App\Models\Settings;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Push_notification;
use Image;
use File;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
	 $appApiKey = Settings::select('appapikey')->where('status',1)->first();
     $request->session()->put('appApiKey', $appApiKey->appapikey);
		$role_id = Auth::guard('admin')->user()->role_id;
		$username = Auth::guard('admin')->user()->username;
		return view('admin.index',compact('role_id','username'));
    }
	public function getRelationalType()
	{
		$JsonData = getJsonData();
		echo json_encode($JsonData);
	}
	public function getMaterialData()
	{
		$material = getMaterial();
		//echo "<pre>";print_r($material);die;
		echo json_encode($material);
	}
	public function getCabinetcolourData()  
	{
		$cabinetClr = getCabinetcolour();
		//echo "<pre>";print_r($cabinetClr);die;
		echo json_encode($cabinetClr);
	}
	public function getExposideData()  
	{
		$exposideClr = getExposide();
		echo json_encode($exposideClr);
	}
	public function getShutterMrlData()  
	{
		$shutterMrl = getShuttermaterial();
		echo json_encode($shutterMrl);
	}
	public function getLegtypData()  
	{
		$legtype = getLegtype();
		echo json_encode($legtype);
	}
	public function geHandeltypeData()  
	{
		$handeltype = getHandeltype();
		echo json_encode($handeltype);
	}
	public function getMaterial18mmVal()
	{
		$material18mmVal = getmaterial18mmData();
		echo json_encode($material18mmVal);
		//return $material18mmVal;
	}
	public function getMaterial6mmVal()
	{
		$material6mmVal = getmaterial6mmData();
		echo json_encode($material6mmVal);
	}
	public function getShutterMaterial18mmVal()
	{
		$shutterMaterial18mmVal = getShutterMaterial8mmData();
		echo json_encode($shutterMaterial18mmVal);
	}
	public function getExposidePrice()
	{
		$expoSidePriceVal = getExposidePriceData();
		echo json_encode($expoSidePriceVal);
	}
	public function getCabinetTyPrcVal()
	{
		$cabinetTypePriceVal = getCabinetTypePriceData();
		echo json_encode($cabinetTypePriceVal);
	}
	public function user_invoice()
	{
		$username = Auth::guard('admin')->user()->username;
		//echo $username; die;
		return view('admin.user.user_invoice_list');
	}
	public function manage_apikey(Request $request,$id='')
	{
		$result = [];
		if($id > 0){
			$arr = DB::table('settings')->select('appapikey')->where('status',1)->first();
			if(!empty($arr)){
				$result['appapikey'] = $arr->appapikey;
				$result['id']=$id;
			}
			else
			{
				$result['appapikey'] = '';
				$result['id']=$id;
			}
			//echo "<pre>";print_r($result);die;
			
		}
		
		return view('admin.apikey.manage_apikey',$result);
	}
	public function manage_apikey_process(Request $request)
	{
		$request->validate([
		 	'appapikey'=>'required',
		 ],
		 [
		 	'appapikey.required' => 'The App Script Api Key is required.',
		 ]);
		 
		 if($request->post('id')>0){
			Settings::query()->truncate();
			$appapikey = $request->post('appapikey');
			$insertData[] = [
					'appapikey' 	=> $appapikey,
					'status' 		=> 1,
					'updated_at' 	=> date('Y-m-d H:i:s')
				];
			DB::table('settings')->insert($insertData); 
			
			$msg="App Script Api Key has been updated successfully.";
			}
		 else{
			$appapikey = $request->post('appapikey');
			$insertData[] = [
					'appapikey' 	=> $appapikey,
					'status' 		=> 1,
					'updated_at' 	=> date('Y-m-d H:i:s')
				];
			DB::table('settings')->insert($insertData); 
			
			$msg = "App Script Api Key entries have been added successfully.";
		 }
		 $request->session()->flash('message',$msg);
		 return redirect('apikey/add-apikey/1');
	}
	public function user_account(Request $request)
	{
		$id= Auth::guard('admin')->user()->id;
		$result = [];
		if($id>0){				
			$arr = DB::table('admins')->where('id', $id)->first(); 
			if($arr){
				$result['fname']=$arr->fname;
				$result['lname']=$arr->lname;
				$result['email']=$arr->email;
				$result['password']= Hash::make($arr->password);
				$result['phone']=$arr->phone;
				$result['status']=$arr->status;
				$result['id']=$arr->id;
				$result['oldpassword']=$arr->password;
			}else{
				$result['fname']	='';
				$result['lname']	='';
				$result['email']	='';
				$result['password']	='';
				$result['phone']	='';
				$result['status']	='';
				$result['id']			= $id;
			}
        }else{
			
			$result['fname']	='';
			$result['lname']	='';
			$result['email']	='';
			$result['password']	='';
			$result['phone']	='';
			$result['status']	='';
			$result['id']=0;
        }
		return view('admin.account.manage_account',$result);
	}
	public function manage_user_account_process(Request $request)
	{
		$request->validate([
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
		]);

        if($request->post('id')>0){
			$username = strtoupper($request->post('fname')[0]).strtoupper($request->post('lname')[0]).rand('1000','9999');
			
			$password = ($request->post('password') == '') ? $request->post('oldpassword') : Hash::make($request->post('password'));
			//$2y$10$AxN.Cqzk30dXqHftQOigO...sqy2V/1QrlXuqE1BJuywIXh2nciO6
			//echo '$2y$10$AxN.Cqzk30dXqHftQOigO...sqy2V/1QrlXuqE1BJuywIXh2nciO6'.' 000000 '.$password; die;
			$existingData = DB::table('admins')->where('id', $request->post('id'))->first();
			//if ($existingData->fname != $request->post('fname') ||
				//$existingData->lname != $request->post('lname') ||
				//$existingData->email != $request->post('email') ||
				//$existingData->phone != $request->post('phone') ||
				//$existingData->status != $request->post('status')
		    //) {
				DB::table('admins')
				->where('id', $request->post('id'))
				->update([
				'fname' => $request->post('fname'),
				'lname' => $request->post('lname'),
				'email' => $request->post('email'),
				'password' =>  $password,
				'username' =>  $username,
				'phone' => $request->post('phone'),
				'status' => $request->post('status'),
				'updated_at' => date('Y-m-d H:i:s'),
				]);
           		 $msg="Account has been updated successfully.";
			//}else {
				//$msg = "No changes detected. Account data remains unchanged.";
			//}
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
				'status' => $request->post('status'),
			]);
            $msg="Account has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('account');
		
	}
	public function login()
    {
        return view('admin.auth.login');
    }
    public function login_submit(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];
		
        if(Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('success','Login Successfull');
        } else {
            return redirect()->route('admin_login')->with('error','Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success','Logout Successfully');
    }

    public function forget_password()
    {
        return view('admin.auth.forget-password');
    }

    public function forget_password_submit(Request $request)
    {   
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin_data = Admin::where('email',$request->email)->first();
        if(!$admin_data) {
            return redirect()->back()->with('error','Email not found');
        }

        $token = hash('sha256',time());
        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = "Reset Password";
        $message = "Please click on below link to reset your password<br><br>";
        $message .= "<a href='".$reset_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','Reset password link sent on your email');
    }

    public function reset_password($token,$email)
    {
        $admin_data = Admin::where('email',$email)->where('token',$token)->first();
        if(!$admin_data) {
            return redirect()->route('admin_login')->with('error','Invalid token or email');
        }
        return view('admin.auth.reset-password', compact('token','email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $admin_data = Admin::where('email',$request->email)->where('token',$request->token)->first();
        $admin_data->password = Hash::make($request->password);
        $admin_data->token = "";
        $admin_data->update();

        return redirect()->route('admin_login')->with('success','Password reset successfully');
    }
	
}
