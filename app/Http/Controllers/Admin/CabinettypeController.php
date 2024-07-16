<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cabinettype;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Image;
use File;

class CabinettypeController extends Controller
{
    public function index()
    {
		$subcategory = Cabinettype::query()->where('status','!=', 2)->get();
		// dd($categories);
		$result['data']=$subcategory;
        return view('admin.cabinettype.cabinettype',$result);
    }
    public function manage_cabinettype(Request $request,$id='')
    {
		// dd($id.' in edit and add new page');
		//echo $request->file('image');
		//die;
		//$imageName = time().'.'.$request->image->extension();
		//$request->image->move(public_path('images'), $imageName);
		//echo $id; die;
		$Subcategory = Subcategory::where('status',1)->get();
		$result = [];
		if($id>0){				
			$arr = Cabinettype::query()->where('id', $id)->first(); 
			//echo "<pre>";print_r($arr);die;
			// dd($arr);
			if($arr){
				$result['subcategory']=$Subcategory;
				$result['subcategory_id']=$arr->subcategory_id;
				$result['name']=$arr->name;
				$result['LXD']=$arr->LXD;
				$result['WXD']=$arr->WXD;
				$result['WXL']=$arr->WXL;
				$result['hardware_amt']=$arr->hardware_amt;
				$result['image']=$arr->image;
				$result['status']=$arr->status;
				//$result['price_per_quantity']=$arr->price_per_quantity;
				$result['id']=$arr->id;
			}else{
				$result['subcategory']=$Subcategory;
				$result['name']			='';
				$result['LXD']			='';
				$result['WXD']			='';
				$result['WXL']			='';
				$result['hardware_amt'] ='';
				$result['image']	='';
				$result['status']		='';
				//$result['price_per_quantity']		='';
				$result['id']			= $id;
			}
        }else{
			$result['subcategory']=$Subcategory;
			$result['name']			='';
			$result['LXD']			='';
			$result['WXD']			='';
			$result['WXL']			='';
			$result['hardware_amt'] ='';
			$result['image']		='';
			$result['status']		='';
			//$result['price_per_quantity']='';
			$result['id']=0;
        }
        return view('admin.cabinettype.manage_cabinettype',$result);
    }
    public function manage_cabinettype_process(Request $request)
    {
        $request->validate([
			'subcategory_id'=>'required',
			'name'=>'required',
			'LXD'=>'required',
			'WXD'=>'required',
			'WXL'=>'required',
			'hardware_amt'=>'required',
			//'image'=>'required',
			'status'=>'required',
		]);
		
	
        if($request->post('id')>0){
			
			if($request->file('image'))
			{
				//$imageName = time().'.'.$request->image->extension();
				$imageName = $request->image->getClientOriginalName();
				$request->image->move(public_path('admin-assets/images/cabinettype'), $imageName);
			}
			else{
				$imageName = $request->post('hidimg');
			}
			
			$model=Cabinettype::find($request->post('id'));
			$model->name=$request->post('name');
			$model->subcategory_id	=	$request->post('subcategory_id');
			$model->LXD				=	$request->post('LXD');
			$model->WXD				=	$request->post('WXD');
			$model->WXL				=	$request->post('WXL');
			$model->hardware_amt	=	$request->post('hardware_amt');
			$model->image			=	$imageName;
			$model->status			=	$request->post('status');
			$model->updated_at=date('Y-m-d H:i:s');
			$model->save();
            $msg="Cabinettype has been updated successfully.";

        }else{
			$imageName = '';
			if($request->file('image'))
			{
				//$imageName = time().'.'.$request->image->extension();
				$imageName = $request->image->getClientOriginalName();
				$request->image->move(public_path('admin-assets/images/cabinettype'), $imageName);
			}
            $model=new Cabinettype();
			$model->status=$request->post('status');
			$model->subcategory_id=$request->post('subcategory_id');
			$model->name=$request->post('name');
			$model->LXD				=	$request->post('LXD');
			$model->WXD				=	$request->post('WXD');
			$model->WXL				=	$request->post('WXL');
			$model->hardware_amt	=	$request->post('hardware_amt');
			//$model->quantity=$request->post('quantity');
			//$model->price_per_quantity=$request->post('price_per_quantity');
			$model->image=$imageName;
			//$model->updated_at=null;
			$model->save();
            $msg="New cabinettype has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('cabinettype');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('cabinettypes')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Cabinettype has been deleted successfully.');
			return response()->json(['success'=>'Cabinettype has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Cabinettype not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('cabinettypes')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Cabinettype has been deleted successfully.');
			return response()->json(['success'=>'Cabinettype has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Cabinettype not deleted.']);
		}
    }
	public function status(Request $request){
		$updated = DB::table('cabinettypes')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Cabinettype status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Cabinettype not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('cabinettypes')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Cabinettype status has been updated successfully.');
			return response()->json(['success'=>'Cabinettype status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Cabinettype not updated.']);
		}
    }
}
