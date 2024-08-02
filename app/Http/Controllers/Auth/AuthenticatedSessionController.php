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
use Carbon\Carbon;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
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
}
