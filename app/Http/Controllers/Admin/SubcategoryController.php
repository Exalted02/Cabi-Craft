<?php
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Image;
use File;

class SubcategoryController extends Controller
{
   public function index()
    {
		$subcategory = Subcategory::query()->where('status','!=', 2)->get();
		// dd($categories);
		$result['data']=$subcategory;
        return view('admin.subcategory.subcategory',$result);
    }
    public function manage_subcategory(Request $request,$id='')
    {
		// dd($id.' in edit and add new page');
		//echo $request->file('image');
		//die;
		//$imageName = time().'.'.$request->image->extension();
		//$request->image->move(public_path('images'), $imageName);
		//echo $id; die;
		$category = Category::where('status',1)->get();
		$result = [];
		if($id>0){				
			$arr = Subcategory::query()->where('id', $id)->first(); 
			//echo "<pre>";print_r($arr);die;
			// dd($arr);
			if($arr){
				$result['category']=$category;
				$result['category_id']=$arr->category_id;
				$result['name']=$arr->name;
				$result['image']=$arr->image;
				$result['status']=$arr->status;
				//$result['price_per_quantity']=$arr->price_per_quantity;
				$result['id']=$arr->id;
			}else{
				$result['category']=$category;
				$result['name']			='';
				$result['image']	='';
				$result['status']		='';
				//$result['price_per_quantity']		='';
				$result['id']			= $id;
			}
        }else{
			$result['category']=$category;
			$result['name']='';
			$result['image']='';
			$result['status']='';
			//$result['price_per_quantity']='';
			$result['id']=0;
        }
        return view('admin.subcategory.manage_subcategory',$result);
    }
    public function manage_subcategory_process(Request $request)
    {
        $request->validate([
			'category_id'=>'required',
			'name'=>'required',
			//'image'=>'required',
			'status'=>'required',
		]);
		
	
        if($request->post('id')>0){
			
			if($request->file('image'))
			{
				//$imageName = time().'.'.$request->image->extension();
				$imageName = $request->image->getClientOriginalName();
				$request->image->move(public_path('admin-assets/images/subcategories'), $imageName);
			}
			else{
				$imageName = $request->post('hidimg');
			}
			
			$model=Subcategory::find($request->post('id'));
			$model->name=$request->post('name');
			$model->category_id=$request->post('category_id');
			$model->image=$imageName;
			$model->status=$request->post('status');
			$model->updated_at=date('Y-m-d H:i:s');
			$model->save();
            $msg="Subcategory has been updated successfully.";

        }else{
			$imageName = '';
			if($request->file('image'))
			{
				//$imageName = time().'.'.$request->image->extension();
				$imageName = $request->image->getClientOriginalName();
				$request->image->move(public_path('admin-assets/images/subcategories'), $imageName);
			}
            $model=new Subcategory();
			$model->status=$request->post('status');
			$model->category_id=$request->post('category_id');
			$model->name=$request->post('name');
			//$model->quantity=$request->post('quantity');
			//$model->price_per_quantity=$request->post('price_per_quantity');
			$model->image=$imageName;
			//$model->updated_at=null;
			$model->save();
            $msg="New Subcategory has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('subcategory');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('subcategories')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Subcategory has been deleted successfully.');
			return response()->json(['success'=>'Subcategory has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Subcategory not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('subcategories')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Subcategory has been deleted successfully.');
			return response()->json(['success'=>'Subcategory has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Subcategory not deleted.']);
		}
    }
	public function status(Request $request){
		$updated = DB::table('subcategories')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Subcategory status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Subcategory not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('subcategories')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Subcategory status has been updated successfully.');
			return response()->json(['success'=>'Subcategory status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Subcategory not updated.']);
		}
    }
	/*public function get_subcategory(Request $request)
	{
		$id = $request->id;
	}*/
}
