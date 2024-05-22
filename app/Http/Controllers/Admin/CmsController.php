<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms_pages;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$cmsPages = Cms_pages::query()->where('status', '!=', 2)->get();
		//return $cmsPages;
		$result['data']=$cmsPages;
        return view('admin.cms.cms',$result);
    }
	public function cms_edit(Request $request,$id='')
    {
		$result = [];
		if($id>0){
            $arr = Cms_pages::query()->where('id', $id)->get();
			
			if(!$arr->isEmpty()){	
				$result['cms_page_name']=$arr['0']->cms_page_name;
				$result['slug']=$arr['0']->slug;
				$result['cms_page_content']=$arr['0']->cms_page_content;
				$result['status']=$arr['0']->status;
				$result['id']=$arr['0']->id;	
			}else{
				$result['cms_page_name']='';
				$result['slug']='';
				$result['cms_page_content']='';
				$result['status']='';
				$result['id']=$id;
			}
        }else{
            $result['cms_page_name']='';
            $result['slug']='';
            $result['cms_page_content']='';
			$result['status']='';
            $result['id']=0;
            
        }
        return view('admin.cms.cms_edit',$result);
    }
    public function manage_cms_process(Request $request)
    {
		// dd($request->all());
		//echo "<pre>";print_r($request->all());die;
        $request->validate([
            'cms_page_name'=>'required',
            'slug'=>'required'
        ]);
		
        if($request->post('id')>0){
			$arr = Cms_pages::updateOrCreate([
				'id'   => $request->post('id'),
			],[
				'cms_page_name'     => $request->post('cms_page_name'),
				'slug' 				=> $request->post('slug'),
				'cms_page_content'  => $request->post("cms_page_content"),
				'status'  => $request->post("status"),
			]);
            $msg="Data has been updated successfully.";
        }else{
            $model=new Cms_pages();
			$model->status=$request->post('status');
			$model->cms_page_name=$request->post('cms_page_name');
			$model->slug=$request->post('slug');
			$model->cms_page_content=$request->post('cms_page_content');
			$model->updated_at=null;
			$model->save();

            $msg="Data has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('admin/cms');
        
    }
	public function view_cms(Request $request){
		$select_val = $arr = Cms_pages::query()->where('id', $request->id)->get();
		$var = '';
		$var .= '<div class="cms_body"><h6><b>Page Name :</b>'.$select_val['0']->cms_page_name.'</h6></div>
				<div class="cms_body"><h6><b>Page Content :</b>'.$select_val['0']->cms_page_content.'</h6></div>';		
		return response()->json(['html'=>$var]);
    }
	public function status(Request $request){
		$updated = Cms_pages::where('id',$request->id)->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Data status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Data not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = Cms_pages::whereIn('id',$cat_ids)->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Status has been updated successfully.');
			return response()->json(['success'=>'Status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Status not updated.']);
		}
    }
}
