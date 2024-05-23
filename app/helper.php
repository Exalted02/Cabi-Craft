<?php
//common functions here
use App\Models\User;
use App\Models\Country;
use App\Models\Settings;
use App\Models\EmailManagement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// use File;
	
//get login user details
    function get_user_details(){
		$user = [];
		if(Auth::user()){
			$user = User::query()->where('id', Auth::user()->id)->first();
		}
        return $user;
    }
//get website settings
    function web_settings(){
		$data = array(
			'logo' => url('images/logo.png'),
			'screen_name' => config('app.name', 'Laravel'),
			'linkedin' => 'https://linkedin.com',
			'linkedin_image' => url('images/linkedin.png'),
			'instagram' => 'https://instagram.com',
			'instagram_image' => url('images/instagram.png'),
			'year' => date('Y'),
		);
        return $data;
    }
//uc all text
    function uc_all($data){
        return strtoupper($data);
    }
// this function fetch dynamic data of cms page
    function getCms($id){
        $cms_data = Cms::where('id', $id)->first();
        return $cms_data;
    }
//this function making slug 
    function slug_create($text, string $divider = '-'){
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, $divider);
        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    } 
    function link_create($text, string $divider = '-'){
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, $divider);
        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return '';
        }
        return $text;
    }
	
//All country list
	function all_country(){
		return Country::query()->where('status', 1)->get();
	}
//All state list by country id
	function state_by_country($country_id){
		return State::query()->where('country_id', $country_id)->where('status', 1)->orderBy('state_name')->get();
	}
//Image upload
	function uploadResizeImage($details_path='', $dest_path='', $dest_thumb_path='', $width='', $height='', $takeimage){		
		$paths = [
			'image_path' => $dest_path,
			'thumbnail_path' => $dest_thumb_path
		];
		
		foreach($paths as $key => $path) {
			if(!File::isDirectory($path)){
				File::makeDirectory($path, 0777, true, true);
			}
		}
		
		$imageName = time().'-'.$takeimage->getClientOriginalName();
		
		// create image manager with desired driver
		$manager = new ImageManager(new Driver());
		
		$original_img = $img = $manager->read($takeimage);
		$img->save($dest_path.$imageName);
		// $img = $img->resize($width,$height);
		/*$img->resize($width, $height, function ($constraint) {
			// $constraint->aspectRatio();
		});*/
		$img->save($dest_thumb_path.$imageName);
		
		return $imageName;
	}
//Generate a unique username using Database
	function generate_unique_username($string_name){
		$i = 0;
		while(true){
			$username_parts = array_filter(explode(" ", strtolower($string_name))); //explode and lowercase name
			$username_parts = array_slice($username_parts, 0, 2); //return only first two arry part
		
			$part1 = (!empty($username_parts[0]))?substr($username_parts[0], 0,8):""; //cut first name to 8 letters
			$part2 = (!empty($username_parts[1]))?substr($username_parts[1], 0,5):""; //cut second name to 5 letters
			$part3 = rand(1111, 9999);
			if($i == 0){
				$username = $part1.$part2;
			}else{
				$username = $part1.$part2.$part3;
			}
			//$username = $part1.$part2; //str_shuffle to randomly shuffle all characters 
			
			$username_exist_in_db = username_exist_in_database($username); //check username in database
			if(!$username_exist_in_db){
				return $username;
			}
			$i++;
		}
	}
//Generate a unique username using Database
	function username_exist_in_database($string_name){
		$user = User::query()->where('username', $string_name)->get();
		if(count($user) > 0){
			return true;
		}else{
			return false;
		}
	}
    function get_username($id)
	{
		$username = User::select('username')->where('id',$id)->first();
		if($username!='')
		{
			$usernames = $username->username;
		}
		else{
			$usernames = '';
		}
		return $usernames;
		//return $username->username;
	}
	function getMinDigit($string) {
		$length = strlen($string);
		if ($length >= 1) {
			return pow(10, $length - 1);
		} else {
			return null;
		}
	}
	function getMaxDigit($string) {
		$length = strlen($string);
		if ($length >= 1) {
			return pow(10, $length + 1);
		} else {
			return null;
		}
	}
	//Language translate api
	function languageTranslate($string) {
		//if(app()->getLocale() != 'en'){
		if($string != ''){
			return GoogleTranslate::trans($string, app()->getLocale());
		}else{
			return $string;
		}
	}
	//Language translate api
	function currency() {
		return '₹';
	}
	//Unlink files
	function unlink_files($files) {
		if(!empty($files)){
			foreach($files as $file){
				if(file_exists($file)){
					unlink($file);
				}
			}
		}
	}
	// this function fetch dynamic data of Settings page
	function getSettings(){
		$settings = Settings::find(1);
		return $settings;
	}
	//Email Configuration
	function set_email_configuration(){
		$settings = getSettings();
		$get_label_data = !empty($settings->data) ? json_decode($settings->data, true) : '';
		if(!is_null($get_label_data)) {
			$config = array(
				'driver'     =>     isset($get_label_data['driver']) ? $get_label_data['driver'] : '',
				'host'       =>     isset($get_label_data['host']) ? $get_label_data['host'] : '',
				'port'       =>     isset($get_label_data['port']) ? $get_label_data['port'] : '',
				'username'   =>     isset($get_label_data['username']) ? $get_label_data['username'] : '',
				'password'   =>     isset($get_label_data['password']) ? $get_label_data['password'] : '',
				'encryption' =>    isset($get_label_data['encryption']) ? $get_label_data['encryption'] : '',
				'from'       =>     array('address' => isset($get_label_data['sender_email']) ? $get_label_data['sender_email'] : '', 'name' => isset($get_label_data['sender_name']) ? $get_label_data['sender_name'] : ''),
			);
			Config::set('mail', $config);					
		}
	}
	//get email template
	function get_email($id){
		$arr = EmailManagement::where('id',$id)
				->first();
		return $arr;
	}
	//send email template
	function send_email($data){
		// toEmails = Receiver Email, bccEmails = Bcc Receiver, ccEmails = Cc Receiver, files = For attatchment files.
		$data['body'] = str_replace(array("[SCREEN_NAME]", "[YEAR]"), array(config('app.name', 'Laravel'),date('Y')), $data['body']);
		set_email_configuration();
		Mail::send('email.sendmail', $data, function($message)use($data) {
			$message->to($data["toEmails"]);
			if(isset($data['bccEmails']) && count($data['bccEmails']) > 0){
				$message->bcc($data["bccEmails"]);
			}
			if(isset($data['ccEmails']) && count($data['ccEmails']) > 0){
				$message->cc($data["ccEmails"]);
			}
			$message->subject($data["subject"]);
			if(isset($data['files']) && count($data['files']) > 0){
				foreach ($data['files'] as $file){
					$message->attach($file);
				}
			}
		});
	}
?>