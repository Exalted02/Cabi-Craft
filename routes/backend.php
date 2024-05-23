
<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\EmailManagementController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SettingsController;


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
	
		
	// CMS Routes
		Route::get('cms', [CmsController::class, 'index'])->name('cms');
		Route::get('/cms/add-cms',[CmsController::class,'cms_edit'])->name('add-cms');
		Route::get('/cms/cms-edit/{id}', [CmsController::class, 'cms_edit'])->name('cms-edit');
		Route::post('/cms/manage_cms_process',[CmsController::class,'manage_cms_process'])->name('cms.manage_cms_process');
		Route::post('/cms/view-cms',[CmsController::class,'view_cms']);
		Route::post('/cms/status',[CmsController::class,'status']);
		Route::post('/cms/multi_change_status',[CmsController::class,'multi_change_status']);
		
	
	// Email Management Routes
		Route::get('email-management', [EmailManagementController::class,'index'])->name('email-management');
		Route::get('/email-management/add-email-management',[EmailManagementController::class,'manage_email_management'])->name('add-email-management');
		Route::get('/email-management/email-management-edit/{id}', [EmailManagementController::class, 'manage_email_management'])->name('email-management-edit');
		Route::post('/email-management/manage_email_management_process',[EmailManagementController::class,'manage_email_management_process'])->name('email-management.manage_email_management_process');
		Route::post('/email-management/view_email_management',[EmailManagementController::class,'view_email_management']);
		Route::post('/email-management/delete',[EmailManagementController::class,'delete']);
		Route::post('/email-management/multi_delete',[EmailManagementController::class,'multi_delete']);
		Route::post('/email-management/status',[EmailManagementController::class,'status']);
		Route::post('/email-management/multi_change_status',[EmailManagementController::class,'multi_change_status']);
		
		// settings
		Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
		Route::post('/settings/manage_settings_process',[SettingsController::class,'manage_settings_process'])->name('settings.manage_settings_process');
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





