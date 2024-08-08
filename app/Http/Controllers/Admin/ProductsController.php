<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
class ProductsController extends Controller
{
    public function index()
    {
		$products = DB::table('products')->where('status', '!=', 2)->get();
		// dd($categories);
		$result['data']=$products;
        return view('admin.product.product',$result);
    }
    public function manage_products(Request $request,$id='')
    {
		$result = [];
		if($id>0){				
			$arr = DB::table('products')->where('id', $id)->first(); 
			// dd($arr);
			if($arr){
				$result['name']=$arr->name;
				$result['image']=$arr->image;
				$result['size']=$arr->size;
				$result['price']=$arr->price;
				$result['description']=$arr->description;
				$result['status']=$arr->status;
				//$result['price_per_quantity']=$arr->price_per_quantity;
				$result['id']=$arr->id;
			}else{
				$result['name']			='';
				$result['image']		='';
				$result['size']			=  '';
				$result['price']		='';
				$result['description']	='';
				$result['status']		='';
				//$result['price_per_quantity']		='';
				$result['id']			= $id;
			}
        }else{
			
			$result['name']			='';
			$result['image']		='';
			$result['size']			=  '';
			$result['price']		='';
			$result['description']	='';
			$result['status']		='';
			//$result['price_per_quantity']='';
			$result['id']=0;
        }
		
        return view('admin.product.manage_product',$result);
    }
    public function manage_products_process(Request $request)
    {
        $request->validate([
			'name'=>'required',
			//'image'=>'required',
			'size'=>'required',
			'price'=>'required',
			'description'=>'required',
		]);
		
		
        if($request->post('id')>0){
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				
				$request->image->move(public_path('admin-assets/images/product'), $imageName);
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
			
			DB::table('products')
				->where('id', $request->post('id'))
				->update([
				'name' => $request->post('name'),
				'size' => $request->post('size'),
				'price' => $request->post('price'),
				'description' => $request->post('description'),
				'image' => $imageName,
				'updated_at' => date('Y-M-d H:i:s'),
				]);
			
            $msg="Product has been updated successfully.";

        }else{
			$imageName = '';
			if($request->file('image'))
			{
				$imageName = time().'.'.$request->image->extension();
				$request->image->move(public_path('admin-assets/images/product'), $imageName);
			}
            DB::table('products')->insert([
				'name' => $request->post('name'),
				'size' => $request->post('size'),
				'price' => $request->post('price'),
				'description' => $request->post('description'),
				'image' => $imageName,
				'created_at' => date('Y-m-d H h:i:s'),
				'status' => 1,
			]);
			
            $msg="New Product colour has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('admin/products');
        
    }
	public function delete(Request $request){
		$deleted = DB::table('products')
			->where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Product has been deleted successfully.');
			return response()->json(['success'=>'Product has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Product not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = DB::table('products')
			->whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Product has been deleted successfully.');
			return response()->json(['success'=>'Product has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Product not deleted.']);
		}
    }
	public function status(Request $request){
		//echo 'hello-'.$request->val;
		$updated = DB::table('products')
			->where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Product status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Product not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = DB::table('products')
				->whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Product status has been updated successfully.');
			return response()->json(['success'=>'Product status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Product not updated.']);
		}
    }
}
