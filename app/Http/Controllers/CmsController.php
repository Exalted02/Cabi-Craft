<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cms_pages;
use App\Models\Cms_form_submissions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CmsController extends Controller
{	
	public function cms_page($slug='')
	{
		$data = Cms_pages::where(['status'=>1,'slug'=>$slug])->first();
		return view('cms_page',compact('data'));
		
	}
	public function send_mail(Request $request)
	{
		$id = $request->id;
		$name = $request->name;
		$email = $request->email;
		$phone = $request->phone;
		$comment = $request->comment;
		
		// add to table 
		$model=new Cms_form_submissions();
		$model->status=1;
		$model->cms_id=$id;
		$model->name=$name;
		$model->email=$email;
		$model->phone=$phone;
		$model->comment=$comment;
		$model->created_at=date('Y-m-d H:i:s');
		$model->save();
		
		// get admin email address
		$settings = getSettings();
		$get_label_data = !empty($settings->data) ? json_decode($settings->data, true) : '';
		$admin_name = $get_label_data['admin_name'];
		$admin_email = $get_label_data['admin_email'];
		// send mail to admin 
		$get_email = get_email(config('custom.CMS_ADMIN_FORM_EMAIL_ID_RECEIVED_BY_ADMIN'));
		
		$data = [
            'subject' => $get_email->message_subject,
            'body' => str_replace(array("[ADMINNAME]", "[CONTENT]", "[NAME]", "[CONTACT]", "[EMAIL]"), array($admin_name,$comment,$name,$phone,$email), $get_email->message),
            'toEmails' => array($admin_email),
            // 'bccEmails' => array('exaltedsol06@gmail.com','exaltedsol04@gmail.com'),
            // 'ccEmails' => array('exaltedsol04@gmail.com'),
            // 'files' => [public_path('images/logo.jpg'), public_path('css/app.css'),],
        ];
		send_email($data);
		
		// send mail to Sender 
		$get_email = get_email(config('custom.CMS_FORM_EMAIL_ID_RECEIVED_BY_ADMIN'));
		
		$data = [
            'subject' => $get_email->message_subject,
            'body' => str_replace(array("[NAME]", "[CONTENT]", "[CONTACT]", "[EMAIL]"), array($name,$comment,$phone,$email), $get_email->message),
            'toEmails' => array($email),
            // 'bccEmails' => array('exaltedsol06@gmail.com','exaltedsol04@gmail.com'),
            // 'ccEmails' => array('exaltedsol04@gmail.com'),
            // 'files' => [public_path('images/logo.jpg'), public_path('css/app.css'),],
        ];
		send_email($data);
		return response()->json(['message' => 'success'], 200);
	}
	
}
