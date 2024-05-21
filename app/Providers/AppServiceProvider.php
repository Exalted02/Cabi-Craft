<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['_includes.*'], function ($view) {
			if(Auth::check()){
				$userDetails = User::query()->where('id', Auth::user()->id)->first();
				$view->with('userDetails', $userDetails);
			}
		});
    }
}
