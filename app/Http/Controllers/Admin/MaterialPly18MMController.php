<?php

namespace App\Http\Controllers\Admin;
use App\Models\MaterialPly18MM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Image;
use File;

class MaterialPly18MMController extends Controller
{
    
    public function index()
    {
		$categories = DB::table('materialply18mm')->where('status','!=', 2)->get();
		// dd($categories);
		$result['data']=$categories;
        return view('admin.materialply18mm.materialply18mm',$result);
    }
    public function manage_materialply18mm(Request $request,$id='')
    {
		// dd($id.' in edit and add new page');
		//echo $request->file('image');
		//die;
		//$imageName = time().'.'.$request->image->extension();
		//$request->image->move(public_path('images'), $imageName);
		//echo $id; die;
		$result = [];
		if($id>0){				
			$arr = DB::table('materialply18mm')->where('id', $id)->first(); 
			// dd($arr);
			if($arr){
				$result['name']=$arr->name;
				// $result['image']=$arr->image;
				$result['value']=$arr->value;
				$result['status']=$arr->status;
				//$result['price_per_quantity']=$arr->price_per_quantity;
				$result['id']=$arr->id;
			}else{
				$result['name']			='';
				// $result['image']	='';
				$result['value']	='';
				$result['status']		='';
				//$result['price_per_quantity']		='';
				$result['id']			= $id;
			}
        }else{
			
			$result['name']='';
			// $result['image']='';
			$result['value']='';
			$result['status']='';
			//$result['price_per_quantity']='';
			$result['id']=0;
        }
        return view('admin.materialply18mm.manage_materialply18mm',$result);
    }
    public function manage_materialply18mm_process(Request $request)
    {
        $request->validate([
			'name'=>'required',
			//'image'=>'required',
			'status'=>'required',
		]);
		
		
        if($request->post('id')>0){
			// if($request->file('image'))
			// {
			// 	$imageName = time().'.'.$request->image->extension();
			// 	$request->image->move(public_path('admin-assets/images/materials'), $imageName);
			// }
			// else{
			// 	$imageName = $request->post('hidimg');
			// }
			
			// $model=DB::table('materialply6mm')->find($request->post('id'));
			// $model->name=$request->post('name');
			// $model->value=$request->post('value');
			// // $model->image=$imageName;
			// $model->status=$request->post('status');
			// $model->updated_at=date('Y-m-d H:i:s');
			// $model->save();

			DB::table('materialply18mm')
			->where('id', $request->post('id'))
			->update([
				'name' => $request->post('name'),
				'value' => $request->post('value'),
				'status' => $request->post('status'),
				'updated_at' => date('Y-m-d H:i:s'),
			]);

            $msg="Material Ply 18mm has been updated successfully.";

        }else{
			// $imageName = '';
			// if($request->file('image'))
			// {
			// 	$imageName = time().'.'.$request->image->extension();
			// 	$request->image->move(public_path('admin-assets/images/materials'), $imageName);
			// }
            // $model=new MaterialPly6MM();
			// $model->status=$request->post('status');
			// $model->name=$request->post('name');
            // $model->value=$request->post('value');
			//$model->quantity=$request->post('quantity');
			//$model->price_per_quantity=$request->post('price_per_quantity');
			// $model->image=$imageName;
			//$model->updated_at=null;
			// $model->save();

			DB::table('materialply18mm')->insert([
				'status' => $request->post('status'),
				'name' => $request->post('name'),
				'value' => $request->post('value'),
			]);
			

            $msg="New Material Ply 18mm has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('materialply18mm');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('materialply18mm')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Material Ply 18mm has been deleted successfully.');
			return response()->json(['success'=>'Material Ply 18mm has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Material Ply 18mm not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('materialply18mm')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Material Ply 18mm has been deleted successfully.');
			return response()->json(['success'=>'Material Ply 18mm has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Material Ply 18mm not deleted.']);
		}
    }
	public function status(Request $request){
		//echo 'hello-'.$request->val;
		$updated = DB::table('materialply18mm')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Material Ply 18mm status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Material Ply 18mm not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('materialply18mm')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Material Ply 18mm status has been updated successfully.');
			return response()->json(['success'=>'Material Ply 18mm status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Material Ply 18mm not updated.']);
		}
    }
}
