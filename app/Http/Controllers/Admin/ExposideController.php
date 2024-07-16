<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exposide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Image;
use File;

class ExposideController extends Controller
{
    public function index()
    {
		$categories = Exposide::query()->where('status','!=', 2)->get();
		// dd($categories);
		$result['data']=$categories;
        return view('admin.exposide.exposide',$result);
    }
    public function manage_exposide(Request $request,$id='')
    {
		// dd($id.' in edit and add new page');
		//echo $request->file('image');
		//die;
		//$imageName = time().'.'.$request->image->extension();
		//$request->image->move(public_path('images'), $imageName);
		//echo $id; die;
		$result = [];
		if($id>0){				
			$arr = Exposide::query()->where('id', $id)->first(); 
			// dd($arr);
			if($arr){
				$result['name']=$arr->name;
				$result['image']=$arr->image;
				$result['status']=$arr->status;
				//$result['price_per_quantity']=$arr->price_per_quantity;
				$result['id']=$arr->id;
			}else{
				$result['name']			='';
				$result['image']	='';
				$result['status']		='';
				//$result['price_per_quantity']		='';
				$result['id']			= $id;
			}
        }else{
			
			$result['name']='';
			$result['image']='';
			$result['status']='';
			//$result['price_per_quantity']='';
			$result['id']=0;
        }
        return view('admin.exposide.manage_exposide',$result);
    }
    public function manage_exposide_process(Request $request)
    {
        $request->validate([
			'name'=>'required',
			//'image'=>'required',
			'status'=>'required',
		]);
		
		
        if($request->post('id')>0){
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				$request->image->move(public_path('admin-assets/images/exposide'), $imageName);
			}
			else{
				$imageName = $request->post('hidimg');
			}
			
			$model=Exposide::find($request->post('id'));
			$model->name=$request->post('name');
			$model->image=$imageName;
			$model->status=$request->post('status');
			$model->updated_at=date('Y-m-d H:i:s');
			$model->save();
            $msg="Expo Side has been updated successfully.";

        }else{
			$imageName = '';
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				$request->image->move(public_path('admin-assets/images/exposide'), $imageName);
			}
            $model=new Exposide();
			$model->status=$request->post('status');
			$model->name=$request->post('name');
			//$model->quantity=$request->post('quantity');
			//$model->price_per_quantity=$request->post('price_per_quantity');
			$model->image=$imageName;
			//$model->updated_at=null;
			$model->save();
            $msg="New Expo Side has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('exposide');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('exposides')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Expo Side has been deleted successfully.');
			return response()->json(['success'=>'Expo Side has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Expo Side not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('exposides')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Expo Side has been deleted successfully.');
			return response()->json(['success'=>'Expo Side has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Expo Side not deleted.']);
		}
    }
	public function status(Request $request){
		//echo 'hello-'.$request->val;
		$updated = DB::table('exposides')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Expo Side status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Expo Side not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('exposides')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Expo Side status has been updated successfully.');
			return response()->json(['success'=>'Expo Side status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Expo Side not updated.']);
		}
    }
}
