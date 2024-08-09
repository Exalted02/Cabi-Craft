<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
class StaticController extends Controller
{
    public function index()
    {
		$static = DB::table('static')->where('status', '!=', 2)->get();
		// dd($categories);
		$result['data']=$static;
        return view('admin.static.static',$result);
    }
    public function manage_static(Request $request,$id='')
    {
		$result = [];
		if($id>0){				
			$arr = DB::table('static')->where('id', $id)->first(); 
			// dd($arr);
			if($arr){
				$result['name']=$arr->name;
				$result['image']=$arr->image;
				$result['status']=$arr->status;
				//$result['price_per_quantity']=$arr->price_per_quantity;
				$result['id']=$arr->id;
			}else{
				$result['name']			='';
				$result['image']		='';
				$result['status']		='';
				//$result['price_per_quantity']		='';
				$result['id']			= $id;
			}
        }else{
			
			$result['name']			='';
			$result['image']		='';
			$result['status']		='';
			//$result['price_per_quantity']='';
			$result['id']=0;
        }
		
        return view('admin.static.manage_static',$result);
    }
    public function manage_static_process(Request $request)
    {
        $request->validate([
			'name'=>'required',
			//'image'=>'required',
		]);
		
		
        if($request->post('id')>0){
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				
				$request->image->move(public_path('admin-assets/images/static'), $imageName);
				// Load the image, resize it, and save it to the specified path
				/*$image = Image::make($request->image->path());
				$image->resize(360, 270, function ($constraint) {
					$constraint->aspectRatio();  // Maintain the aspect ratio
					$constraint->upsize();       // Prevent possible upsizing
				})->save(public_path('admin-assets/images/product') . '/' . $imageName);*/
			}
			else{
				$imageName = $request->post('hidimg');
			}
			
			DB::table('static')
				->where('id', $request->post('id'))
				->update([
				'name' => $request->post('name'),
				'image' => $imageName,
				'updated_at' => date('Y-M-d H:i:s'),
				]);
			
            $msg="Static has been updated successfully.";

        }else{
			$imageName = '';
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				$request->image->move(public_path('admin-assets/images/static'), $imageName);
			}
            DB::table('static')->insert([
				'name' => $request->post('name'),
				'image' => $imageName,
				'created_at' => date('Y-m-d H h:i:s'),
				'status' => 1,
			]);
			
            $msg="New Static colour has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('admin/static');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('static')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Static has been deleted successfully.');
			return response()->json(['success'=>'Static has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Static not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('static')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Static has been deleted successfully.');
			return response()->json(['success'=>'Static has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Static not deleted.']);
		}
    }
	public function status(Request $request){
		//echo 'hello-'.$request->val;
		$updated = DB::table('static')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Static status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Static not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('static')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Static status has been updated successfully.');
			return response()->json(['success'=>'Static status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Static not updated.']);
		}
    }
}
