<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
		$data = Course::query()->where('status', '!=', 2)->get();
		$result['data']=$data;
        return view('admin.course.course',$result);
    }
    public function manage_course(Request $request,$id='')
    {
		$result = [];
		if($id>0){				
			$arr = Course::query()->where('id', $id)->first();
			if($arr){
				$result['name']=$arr->name;
				$result['id']=$arr->id;
			}else{
				$result['name']='';
				$result['id']= $id;
			}
        }else{
			$result['name']='';
			$result['id']=0;
        }
        return view('admin.course.manage_course',$result);
    }
    public function manage_course_process(Request $request)
    {
        $request->validate([
			'name'=>'required',
		]);
        if($request->post('id')>0){
			$model=Course::find($request->post('id'));
			$model->name=$request->post('name');
			$model->updated_at=date('Y-m-d H:i:s');
			$model->save();
            $msg="Course has been updated successfully.";

        }else{
            $model=new Course();
			$model->status=1;
			$model->name=$request->post('name');
			$model->updated_at=null;
			$model->save();
            $msg="New course has been added successfully.";
        }
        $request->session()->flash('message',$msg);
        return redirect('admin/course');
        
    }
	public function delete(Request $request){
		$deleted = Course::where('id',$request->id)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Course has been deleted successfully.');
			return response()->json(['success'=>'Course has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Course not deleted.']);
		}
    }
	public function multi_delete(Request $request){
		$ids = explode(',',$request->id);
		$deleted = Course::whereIn('id',$ids)
			->update(['status'=>2]);
        if($deleted){
			$request->session()->flash('message','Course has been deleted successfully.');
			return response()->json(['success'=>'Course has been deleted successfully.']);
		}else{
			return response()->json(['success'=>'Course not deleted.']);
		}
    }
	public function status(Request $request){
		$updated = Course::where('id',$request->id)
			->update(['status'=>$request->val]);
        
        if($updated){
			$request->session()->flash('message','Course status has been updated successfully.');
			return response()->json(['success'=>'Course status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Course not updated.']);
		}
    }
	public function multi_change_status(Request $request){
		$cat_ids = explode(',',$request->id);
		$updated = Course::whereIn('id',$cat_ids)
				->update(['status'=>$request->status]);
        if($updated){
			$request->session()->flash('message','Course status has been updated successfully.');
			return response()->json(['success'=>'Course status has been updated successfully.']);
		}else{
			return response()->json(['success'=>'Course not updated.']);
		}
    }
}
