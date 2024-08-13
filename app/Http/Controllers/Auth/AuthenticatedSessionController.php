<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Gloudemans\Shoppingcart\Facades\Cart;
use App;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
		$staticdata = DB::table('static')->where(['status'=>1])->limit(4)->get();
        return view('auth.login',compact('staticdata'));
        // return view('login');
    }

    /**
     * Handle an incoming authentication request.
     */
    /*public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
		
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }*/
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];
		
        if(Auth::guard('web')->attempt($data)) {
			//$user = Auth::guard('web')->user();
			if(Auth::guard('web')->user()->role_id == 2){
				return redirect()->intended(RouteServiceProvider::HOME)->with('success','Successfully Login');
			}else{
				Auth::guard('web')->logout();
				return redirect()->route('login')->with('error','Invalid Credentials');
			}
        } else {
            return redirect()->route('login')->with('error','Invalid Credentials');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
		//get selected language
		$lang = session()->get('locale');
		
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
		
		//Cart::destroy();
        return redirect('/login');
    }
	public function facebook()
    {
		return Socialite::driver('facebook')
                ->scopes(['email'])
                ->redirect();
    }
	public function facebook_callback()
    {
		try{
			$user = Socialite::driver('facebook')->user();
			$finduser = Admin::where('email', $user->email)->first();
			if($finduser){
				Auth::guard('web')->login($finduser);
				return redirect()->intended(RouteServiceProvider::HOME)->with('success','Successfully Login');		
			}else{
				$avatarUrl = $user->getAvatar();
				$avatarContents = file_get_contents($avatarUrl);
				$imageName = time().'.jpg';
				$path = public_path('front-assets/images/users/' . $imageName);
				file_put_contents($path, $avatarContents);
				
				$add_user = new Admin;
				$add_user->fname = $user->name;
				$add_user->email = $user->email;
				$add_user->password = Hash::make($user->id);
				$add_user->username = $username = strtoupper($user->name[0]).strtoupper($user->name[1]).rand('1000','9999');;
				$add_user->phone = '';
				$add_user->facebook_id = $user->id;
				$add_user->image = $imageName;
				$add_user->role_id = 2;
				$add_user->status = 1;
				$add_user->save();
				
				$data = [
					'email' => $user->email,
					'password' => $user->id,
				];
				Auth::guard('web')->attempt($data);
				return redirect()->intended(RouteServiceProvider::HOME)->with('success','Successfully Login');				
			}
		}catch (Exception $e) {
			dd($e->getMessage());
		}
    }
	public function google()
    {
		return Socialite::driver('google')->redirect();
    }
	public function google_callback()
    {
		try{
			$user = Socialite::driver('google')->user();
			$finduser = Admin::where('email', $user->email)->first();
			if($finduser){
				Auth::guard('web')->login($finduser);
				return redirect()->intended(RouteServiceProvider::HOME)->with('success','Successfully Login');		
			}else{
				$avatarUrl = $user->getAvatar();
				$avatarContents = file_get_contents($avatarUrl);
				$imageName = time().'.jpg';
				$path = public_path('front-assets/images/users/' . $imageName);
				file_put_contents($path, $avatarContents);
				
				$add_user = new Admin;
				$add_user->fname = $user->name;
				$add_user->email = $user->email;
				$add_user->password = Hash::make($user->id);
				$add_user->username = $username = strtoupper($user->name[0]).strtoupper($user->name[1]).rand('1000','9999');;
				$add_user->phone = '';
				$add_user->google_id = $user->id;
				$add_user->image = $imageName;
				$add_user->role_id = 2;
				$add_user->status = 1;
				$add_user->save();
				
				$data = [
					'email' => $user->email,
					'password' => $user->id,
				];
				Auth::guard('web')->attempt($data);
				return redirect()->intended(RouteServiceProvider::HOME)->with('success','Successfully Login');				
			}
		}catch (Exception $e) {
			dd($e->getMessage());
		}
    }
}
