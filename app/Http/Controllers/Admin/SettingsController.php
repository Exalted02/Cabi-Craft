<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
	{
		$settings = getSettings();
		$result = json_decode($settings->data);
		return view('admin.settings.settings',compact('result'));
	}
	public function manage_settings_process(Request $request)
	{
		$request->validate([
			'driver' => 'required',
			'host' => 'required',
			'port' => 'required',
			//'email' => 'required',
			'encryption' => 'required',
            'username' => 'required|email',
            'password' => 'required',
            'sender_name' => 'required',
            'sender_email' => 'required|email',
			'address' => 'required',
			'phone' => 'required',
			'twitter' => 'required',
			'facebook' => 'required|url',
			'linkedIn' => 'required|url',
			'youtube' => 'required|url',
	]);
		$model=Settings::find(1);
		$model->data=json_encode($request->all());
		$model->save();
		$msg="Record has been updated successfully.";
		$request->session()->flash('message',$msg);
        return redirect('admin/settings');
	}
}
