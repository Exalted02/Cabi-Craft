<?php

namespace App\Http\Controllers\Admin;

use App\Models\Handeltype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Image;
use File;

class HandletypeController extends Controller
{
    public function index()
    {
		$categories = Handeltype::query()->where('status','!=', 2)->get();
		// dd($categories);
		$result['data']=$categories;
        return view('admin.handletype.handletype',$result);
    }
    public function manage_handletype(Request $request,$id='')
    {
		// dd($id.' in edit and add new page');
		//echo $request->file('image');
		//die;
		//$imageName = time().'.'.$request->image->extension();
		//$request->image->move(public_path('images'), $imageName);
		//echo $id; die;
		$result = [];
		if($id>0){				
			$arr = Handeltype::query()->where('id', $id)->first(); 
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
        return view('admin.handletype.manage_handletype',$result);
    }
    public function manage_handletype_process(Request $request)
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
				$request->image->move(public_path('admin-assets/images/handletype'), $imageName);
			}
			else{
				$imageName = $request->post('hidimg');
			}
			
			$model=Handeltype::find($request->post('id'));
			$model->name=$request->post('name');
			$model->image=$imageName;
			$model->status=$request->post('status');
			$model->updated_at=date('Y-m-d H:i:s');
			$model->save();
            $msg="Handle Type has been updated successfully.";

        }else{
			$imageName = '';
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				$request->image->move(public_path('admin-assets/images/handletype'), $imageName);
			}
            $model=new Handeltype();
			$model->status=$request->post('status');
			$model->name=$request->post('name');
			//$model->quantity=$request->post('quantity');
			//$model->price_per_quantity=$request->post('price_per_quantity');
			$model->image=$imageName;
			//$model->updated_at=null;
			$model->save();
            $msg="New Handle Type has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('handletype');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('handeltypes')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Handle Type has been deleted successfully.');
			return response()->json(['success'=>'Handle Type has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Handle Type not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('handeltypes')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Handle Type has been deleted successfully.');
			return response()->json(['success'=>'Handle Type has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Handle Type not deleted.']);
		}
    }
	public function status(Request $request){
		//echo 'hello-'.$request->val;
		$updated = DB::table('handeltypes')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Handle Type status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Handle Type not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('handeltypes')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Handle Type status has been updated successfully.');
			return response()->json(['success'=>'Handle Type status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Handle Type not updated.']);
		}
    }
}
