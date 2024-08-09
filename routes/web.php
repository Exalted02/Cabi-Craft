<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('route-clear', function () {
    \Artisan::call('route:clear');
    dd("Route is cleared");
});

Route::get('queue-work', function () {
    \Artisan::call('queue:work');
});
Route::get('clear-cache', function () {
    \Artisan::call('config:cache');
    \Artisan::call('cache:clear');
	\Artisan::call('cache:clear');
    \Artisan::call('route:cache');
    \Artisan::call('view:clear');
    \Artisan::call('config:cache');
    \Artisan::call('optimize:clear');
	Log::info('Clear all cache');
    dd("Cache is cleared");
});
Route::get('storage-link', function () {
    return \Artisan::call('storage:link');
    dd("Storage link created");
});
Route::get('db-migrate', function () {
    \Artisan::call('migrate');
    dd("DB Migrated");
});
Route::get('db-migrate-fresh', function () {
    \Artisan::call('migrate:fresh');
    dd("DB Migrate Fresh");
});
Route::get('db-seed', function () {
    \Artisan::call('db:seed');
    dd("DB Seed");
});
//PAGE ROUTE START
Route::get('/', [FrontendController::class, 'index'])->name('home');
//Route::get('/tours/{id}', [FrontendController::class, 'tour_details'])->name('tour.details');
Route::get('/error', [FrontendController::class, 'error_page'])->name('error');

// ------------- temporary new post add route start ----------
Route::middleware(['auth'])->group(function () {	
	Route::get('/browsecatalogue', [FrontendController::class, 'browse'])->name('browsecatalogue');
	Route::get('/cartpage', [FrontendController::class, 'cart'])->name('cartpage');
	Route::get('/profilepage', [FrontendController::class, 'profile'])->name('profilepage');
	Route::get('/settingpage', [FrontendController::class, 'setting'])->name('settingpage');
	Route::get('/offerpage', [FrontendController::class, 'offer'])->name('offerpage');
	Route::get('/orderhistorys', [FrontendController::class, 'orderhistory'])->name('orderhistorys');
	Route::get('/offerdetailpage', [FrontendController::class, 'offerdetail'])->name('offerdetailpage');
	
	Route::get('/new-order', [FrontendController::class, 'neworder'])->name('neworder');
});
require __DIR__.'/auth.php';

require __DIR__.'/backend.php';