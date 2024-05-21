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
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
		
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
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
		
		Cart::destroy();
		//set selected language
		App::setLocale($lang);
        session()->put('locale', $lang);
        return redirect('/login');
    }
}
