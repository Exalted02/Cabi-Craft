<?php

namespace App\Http\Controllers\Admin;
use App\Models\MaterialPly6MM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
use App\Models\Projecttype;
class ProjecttypeController extends Controller
{
    
    public function index()
    {
		$projecttype = DB::table('projecttype')->where('status', '!=', 2)->get();
		
		//$projecttype = Projecttype::where('status', '!=', 2)->get();
		//echo "<pre>";print_r($projecttype);die;
		$result['data']=$projecttype;
        return view('admin.projecttype.projecttype',$result);
    }
	public function manage_projecttype(Request $request,$id='')
    {
		$result = [];
		if($id>0){				
			$arr = DB::table('projecttype')->where('id', $id)->first(); 
			//echo '<pre>';print_r($arr);die;
			if($arr){
				$result['name']=$arr->name;
				$result['joindate']=$arr->created_at;
				$result['status']=$arr->status;
				$result['id']=$arr->id;
			}else{
				$result['name']	='';
				$result['status']	='';
				$result['id']		= $id;
			}
        }else{
			
			$result['name']	='';
			$result['status']	='';
			$result['id']=0;
        }
        return view('admin.projecttype.manage_projecttype',$result);
    }
    public function manage_projecttype_process(Request $request)
    {
        $request->validate([
			'name'=>'required',
		],
		[
			'name.required' => 'The first name is required.',
		]);
		
		
		
        if($request->post('id')>0){
			$existingData = DB::table('projecttype')->where('id', $request->post('id'))->first();
			if($existingData->name != $request->post('name'))
		    {
				DB::table('projecttype')
				->where('id', $request->post('id'))
				->update([
				'name' => $request->post('name'),
				'updated_at' => date('Y-M-d H:i:s'),
				]);
           		 $msg="Projecttype has been updated successfully.";
			}else {
				$msg = "No changes detected. Projecttype data remains unchanged.";
			}
        }
		else {
			DB::table('projecttype')->insert([
				'name' => $request->post('name'),
				'created_at' => date('Y-m-d H h:i:s'),
				'status' => 1,
			]);
            $msg="New projecttype has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('admin/projecttype');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('projecttype')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','projecttype has been deleted successfully.');
			return response()->json(['success'=>'projecttype has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'projecttype not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('projecttype')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','projecttype has been deleted successfully.');
			return response()->json(['success'=>'projecttype has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'projecttype not deleted.']);
		}
    }
	public function status(Request $request){
		$updated = DB::table('projecttype')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        //echo $updated;die;
        if($updated){
			return response()->json(['success'=>'projecttype status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'projecttype status not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('projecttype')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','projecttype status has been updated successfully.');
			return response()->json(['success'=>'projecttype status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'projecttype not updated.']);
		}
    }
	
}
