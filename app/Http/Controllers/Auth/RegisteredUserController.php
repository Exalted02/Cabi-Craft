<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'digits:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
		$username = strtoupper($request->post('name')[0]).strtoupper($request->post('name')[1]).rand('1000','9999');
		$user = new Admin;
		$user->fname = $request->post('name');
		$user->email = $request->post('email');
		$user->password = Hash::make($request->post('password'));
		$user->username = $username;
		$user->phone = $request->post('contact_number');
		$user->role_id = 2;
		$user->status = 1;
		$user->save();
		if($user){
			$data = [
				'email' => $request->post('email'),
				'password' => $request->post('password'),
			];
			
			if(Auth::guard('web')->attempt($data)) {
				return redirect()->intended(RouteServiceProvider::HOME);			
			}else{
				return redirect()->route('login');
			}
		}else{
			return redirect()->route('register')->with('error','Registration not done');
		}
    }
}
