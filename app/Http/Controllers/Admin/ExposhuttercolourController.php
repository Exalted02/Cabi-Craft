<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Image;
use File;

class ExposhuttercolourController extends Controller
{
    public function index()
    {
		$expocolor = DB::table('expo_shutter_colour')->where('status', '!=', 2)->get();
		// dd($categories);
		$result['data']=$expocolor;
        return view('admin.expo-shutter-colour.expo-shutter-colour',$result);
    }
    public function manage_expo_shutter_colour(Request $request,$id='')
    {
		$result = [];
		if($id>0){				
			$arr = DB::table('expo_shutter_colour')->where('id', $id)->first(); 
			// dd($arr);
			if($arr){
				$result['name']=$arr->name;
				$result['image']=$arr->image;
				$result['description']=$arr->description;
				$result['flag']=$arr->flag;
				$result['status']=$arr->status;
				//$result['price_per_quantity']=$arr->price_per_quantity;
				$result['id']=$arr->id;
			}else{
				$result['name']			='';
				$result['image']	='';
				$result['description']	='';
				$result['flag']	='';
				$result['status']		='';
				//$result['price_per_quantity']		='';
				$result['id']			= $id;
			}
        }else{
			
			$result['name']='';
			$result['image']='';
			$result['description']='';
			$result['flag']='';
			$result['status']='';
			//$result['price_per_quantity']='';
			$result['id']=0;
        }
		
        return view('admin.expo-shutter-colour.manage_expo-shutter-colour',$result);
    }
    public function manage_expo_shutter_colour_process(Request $request)
    {
        $request->validate([
			'name'=>'required',
			//'image'=>'required',
			'flag'=>'required',
		]);
		
		
        if($request->post('id')>0){
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				$request->image->move(public_path('admin-assets/images/exposhuttercolors'), $imageName);
			}
			else{
				$imageName = $request->post('hidimg');
			}
			
			DB::table('expo_shutter_colour')
				->where('id', $request->post('id'))
				->update([
				'name' => $request->post('name'),
				'flag' => $request->post('flag'),
				'image' => $imageName,
				'description' => $request->post('description'),
				'updated_at' => date('Y-M-d H:i:s'),
				]);
			
            $msg="Cabinet has been updated successfully.";

        }else{
			$imageName = '';
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				$request->image->move(public_path('admin-assets/images/exposhuttercolors'), $imageName);
			}
            DB::table('expo_shutter_colour')->insert([
				'name' => $request->post('name'),
				'flag' => $request->post('flag'),
				'image' => $imageName,
				'description' => $request->post('description'),
				'created_at' => date('Y-m-d H h:i:s'),
				'status' => 1,
			]);
			
            $msg="New Expo/shutter colour has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('admin/expo-shutter-colour');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('cabinets')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Expo/shutter colour has been deleted successfully.');
			return response()->json(['success'=>'Expo/shutter colour has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Expo/shutter colour not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('cabinets')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Expo/shutter colour has been deleted successfully.');
			return response()->json(['success'=>'Expo/shutter colour has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Expo/shutter colour not deleted.']);
		}
    }
	public function status(Request $request){
		//echo 'hello-'.$request->val;
		$updated = DB::table('cabinets')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Expo/shutter colour status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Expo/shutter colour not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('cabinets')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Expo/shutter colour status has been updated successfully.');
			return response()->json(['success'=>'Expo/shutter colour status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Expo/shutter colour not updated.']);
		}
    }
}
