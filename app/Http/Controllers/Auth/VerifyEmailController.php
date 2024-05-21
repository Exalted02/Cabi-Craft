<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
			$msg=languageTranslate('Successfully verified with your email.');
			$request->session()->flash('message',$msg);
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
		
		
		$msg=languageTranslate('Successfully verified with your email.');
		$request->session()->flash('message',$msg);
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
	public function verify(Request $request, $id, $hash)
    {
		//get selected language
		$lang = session()->get('locale');
		
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
		
		
		//set selected language
		App::setLocale($lang);
        session()->put('locale', $lang);
		
		$user = User::find($id);
		
		if(empty($user)){
			return redirect()->route('error');
		}

		if($user->markEmailAsVerified()){
			$msg=languageTranslate('Successfully verified with your email.');
			$request->session()->flash('message',$msg);
			return redirect()->intended('login');			
		}else{
			$msg=languageTranslate('The verification link is not valid.');
			$request->session()->flash('message',$msg);
			return redirect()->intended('login');
		}
    }
}
