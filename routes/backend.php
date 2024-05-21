
<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;


Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    	Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
	
	// Course Routes
		Route::get('/course', [CourseController::class, 'index'])->name('course');
		Route::get('/course/add-course',[CourseController::class,'manage_course'])->name('add-course');
		Route::get('/course/update-course/{id}',[CourseController::class,'manage_course'])->name('update-course');
		Route::post('/course/manage_course_process',[CourseController::class,'manage_course_process'])->name('course.manage_course_process');
		Route::post('/course/view_category',[CourseController::class,'view_course']);
		Route::post('/course/delete',[CourseController::class,'delete']);
		Route::post('/course/multi_delete',[CourseController::class,'multi_delete']);
		Route::post('/course/status',[CourseController::class,'status']);
		Route::post('/course/multi_change_status',[CourseController::class,'multi_change_status']);

});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin_login');
    Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin_logout');
    Route::get('/forget-password', [AdminController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password-submit', [AdminController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}', [AdminController::class, 'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password-submit', [AdminController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

});





