<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailManagement;
use Illuminate\Http\Request;

class EmailManagementController extends Controller
{
    public function index()
    {
		$data = EmailManagement::query()->where('status', '!=', '2')->get();
		$result['data']=$data;
        return view('admin.email_management.email_management',$result);
    }
    public function manage_email_management(Request $request,$id='')
    {
		if($id>0){
			$arr = EmailManagement::query()->where('id', $id)->get();	
			if(!$arr->isEmpty()){
				$result['message']=$arr['0']->message;
				$result['message_subject']=$arr['0']->message_subject;
				$result['status']=$arr['0']->status;
				$result['id']=$arr['0']->id;
			}else{
				$result['message']='';
				$result['message_subject']='';
				$result['status']='';
				$result['id']=$id;
			}
        }else{
            $result['message']='';
            $result['message_subject']='';
            $result['status']='';
            $result['id']=0;
            
        }
        return view('admin.email_management.manage_email_management',$result);
    }
	public function manage_email_management_process(Request $request)
    {
		if($request->post('id')>0){
			$model = EmailManagement::find($request->post('id'));
			$model->updated_at=date('Y-m-d h:i:s');
			$model->message=$request->post('message');
			$model->message_subject=$request->post('message_subject');
			$model->status=$request->post('status');
			$model->save();
			$msg="Data has been updated successfully.";
		}else{
			$model=new EmailManagement();
			$model->updated_at=null;
			$model->message=$request->post('message');
			$model->message_subject=$request->post('message_subject');
			$model->status=$request->post('status');
			$model->save();
			$msg="New data has been added successfully.";
		}
		$request->session()->flash('message',$msg);
        return redirect('admin/email-management');
	}
	public function view_email_management(Request $request){
		$select_val = EmailManagement::query()->where('id', $request->id)->get();
		
		$var = '';
		$var .= '<div class="cms_body"><h6><b>Message Subject :</b>'.$select_val['0']->message_subject.'</h6></div>
				<div class="cms_body"><h6><b>Message :</b>'.$select_val['0']->message.'</h6></div>';
		return response()->json(['html'=>$var]);
    }
	public function delete(Request $request){
        $deleted = EmailManagement::query()->where('id', $request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Data has been deleted successfully.');
			return response()->json(['success'=>'Data has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Data not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$cat_ids = explode(',',$request->id);
		$deleted = EmailManagement::query()->whereIn('id',$cat_ids)
				->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Data has been deleted successfully.');
			return response()->json(['success'=>'Data has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Data not deleted.']);
		}
    }
	public function status(Request $request){
		$updated = EmailManagement::query()->where('id', $request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			return response()->json(['success'=>'Data status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Data not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = EmailManagement::query()->whereIn('id', $cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Data status has been updated successfully.');
			return response()->json(['success'=>'Data status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Data not updated.']);
		}
    }
}
