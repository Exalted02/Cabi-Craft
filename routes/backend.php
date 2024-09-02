
<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\CabinetcolorController;
use App\Http\Controllers\Admin\ExposideController;
use App\Http\Controllers\Admin\LegtypeController;
use App\Http\Controllers\Admin\HandletypeController;
use App\Http\Controllers\Admin\MaterialPly6MMController;
use App\Http\Controllers\Admin\MaterialPly18MMController;
use App\Http\Controllers\Admin\ShutterMaterialPly18MMController;
use App\Http\Controllers\Admin\ExposidepriceController;
use App\Http\Controllers\Admin\ShutterMaterialController;
use App\Http\Controllers\Admin\StockmanagtementController;
use App\Http\Controllers\Admin\ExpanseTrackerController;
use App\Http\Controllers\Admin\CustomerBillController;
use App\Http\Controllers\Admin\CustomerListController;
use App\Http\Controllers\Admin\PaymentModeController;
use App\Http\Controllers\Admin\BillGenerateController;
use App\Http\Controllers\Admin\ExpenseTypeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CabinettypeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponcodeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjecttypeController;
use App\Http\Controllers\Admin\ExposhuttercolourController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\StaticController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\EmailManagementController;

Route::middleware('admin')->prefix('admin')->name('')->group(function () {
	// Admin Panel Routes
	// Datatable Routes
		Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
		Route::get('/add-invoice', [AdminController::class, 'index'])->name('admin.index');
		Route::get('/materialUrl', [AdminController::class, 'getMaterialData'])->name('admin.materialUrl');
		Route::get('/cabinetcolour', [AdminController::class, 'getCabinetcolourData']);
		Route::get('/exposideUrl', [AdminController::class, 'getExposideData']);
		Route::get('/shutterMaterial', [AdminController::class, 'getShutterMrlData']);
		Route::get('/legtyp', [AdminController::class, 'getLegtypData']);
		Route::get('/handeltype', [AdminController::class, 'geHandeltypeData']);
		Route::get('/relationaltype', [AdminController::class, 'getRelationalType']);
		
		Route::get('/getMaterial18mmVal', [AdminController::class, 'getMaterial18mmVal']);
		Route::get('/getMaterial6mmVal', [AdminController::class, 'getMaterial6mmVal']);
		Route::get('/getShutterMaterial18mmVal', [AdminController::class, 'getShutterMaterial18mmVal']);
		
		Route::get('/getExposidePrice', [AdminController::class, 'getExposidePrice']);
		
		// LXD--LXW--WXD---
		Route::get('/getCabinetTyPrcVal', [AdminController::class, 'getCabinetTyPrcVal']);
		
		// Route::get('getAdminUsers', [AdminCRUDController::class, 'getAdminUsers'])->name('admin.getUsers');
	
	// Category Routes
		Route::get('category', [CategoryController::class, 'index'])->name('admin.category');
		Route::get('/category/add-category',[CategoryController::class,'manage_category'])->name('admin.add-category');
		Route::get('/category/update-category/{id}',[CategoryController::class,'manage_category'])->name('admin.update-category');
		Route::post('/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('admin.category.manage_category_process');
		Route::post('/category/view_category',[CategoryController::class,'view_category']);
		Route::post('/category/delete',[CategoryController::class,'delete']);
		Route::post('/category/multi_delete',[CategoryController::class,'multi_delete']);
		Route::post('/category/status',[CategoryController::class,'status']);
		Route::post('/category/multi_change_status',[CategoryController::class,'multi_change_status']);
		
		// subcategory Routes
		Route::get('subcategory', [SubcategoryController::class, 'index'])->name('admin.subcategory');
		Route::get('/subcategory/add-subcategory',[SubcategoryController::class,'manage_subcategory'])->name('admin.add-subcategory');
		Route::get('/subcategory/update-subcategory/{id}',[SubcategoryController::class,'manage_subcategory'])->name('admin.update-subcategory');
		Route::post('/subcategory/manage_subcategory_process',[SubcategoryController::class,'manage_subcategory_process'])->name('admin.subcategory.manage_subcategory_process');
		Route::post('/subcategory/view_subcategory',[SubcategoryController::class,'view_subcategory']);
		Route::post('/subcategory/delete',[SubcategoryController::class,'delete']);
		Route::post('/subcategory/multi_delete',[SubcategoryController::class,'multi_delete']);
		Route::post('/subcategory/status',[SubcategoryController::class,'status']);
		Route::post('/subcategory/multi_change_status',[SubcategoryController::class,'multi_change_status']);
		
		// cabinettype Routes
		Route::get('cabinettype', [CabinettypeController::class, 'index'])->name('admin.cabinettype');
		Route::get('/cabinettype/add-cabinettype',[CabinettypeController::class,'manage_cabinettype'])->name('admin.add-cabinettype');
		Route::get('/cabinettype/update-cabinettype/{id}',[CabinettypeController::class,'manage_cabinettype'])->name('admin.update-cabinettype');
		Route::post('/cabinettype/manage_cabinettype_process',[CabinettypeController::class,'manage_cabinettype_process'])->name('admin.cabinettype.manage_cabinettype_process');
		Route::post('/cabinettype/view_cabinettype',[CabinettypeController::class,'view_cabinettype']);
		Route::post('/cabinettype/delete',[CabinettypeController::class,'delete']);
		Route::post('/cabinettype/multi_delete',[CabinettypeController::class,'multi_delete']);
		Route::post('/cabinettype/status',[CabinettypeController::class,'status']);
		Route::post('/cabinettype/multi_change_status',[CabinettypeController::class,'multi_change_status']);
		//Route::post('/getsubcategory/',[SubcategoryController::class,'get_subcategory'])->name('admin.subcategory');

		// Users Routes
		Route::get('user', [UserController::class, 'index'])->name('admin.user');
		Route::get('/user/add-user',[UserController::class,'manage_user'])->name('admin.add-user');
		Route::get('/user/update-user/{id}',[UserController::class,'manage_user'])->name('admin.update-user');
		Route::post('/user/manage_user_process',[UserController::class,'manage_user_process'])->name('admin.user.manage_user_process');
		Route::post('/user/view_user',[UserController::class,'view_user']);
		Route::post('/user/delete',[UserController::class,'delete']);
		Route::post('/user/multi_delete',[UserController::class,'multi_delete']);
		Route::post('/user/status',[UserController::class,'status']);
		Route::post('/user/multi_change_status',[UserController::class,'multi_change_status']);

		// Material Routes
		Route::get('material', [MaterialController::class, 'index'])->name('admin.material');
		Route::get('/material/add-material',[MaterialController::class,'manage_material'])->name('admin.add-material');
		Route::get('/material/update-material/{id}',[MaterialController::class,'manage_material'])->name('admin.update-material');
		Route::post('/material/manage_material_process',[MaterialController::class,'manage_material_process'])->name('admin.material.manage_material_process');
		Route::post('/material/view_material',[MaterialController::class,'view_material']);
		Route::post('/material/delete',[MaterialController::class,'delete']);
		Route::post('/material/multi_delete',[MaterialController::class,'multi_delete']);
		Route::post('/material/status',[MaterialController::class,'status']);
		Route::post('/material/multi_change_status',[MaterialController::class,'multi_change_status']);

		// Cabinet Colour Routes
		Route::get('cabinet', [CabinetcolorController::class, 'index'])->name('admin.cabinet');
		Route::get('/cabinet/add-cabinet',[CabinetcolorController::class,'manage_cabinet'])->name('admin.add-cabinet');
		Route::get('/cabinet/update-cabinet/{id}',[CabinetcolorController::class,'manage_cabinet'])->name('admin.update-cabinet');
		Route::post('/cabinet/manage_cabinet_process',[CabinetcolorController::class,'manage_cabinet_process'])->name('admin.cabinet.manage_cabinet_process');
		Route::post('/cabinet/view_cabinet',[CabinetcolorController::class,'view_cabinet']);
		Route::post('/cabinet/delete',[CabinetcolorController::class,'delete']);
		Route::post('/cabinet/multi_delete',[CabinetcolorController::class,'multi_delete']);
		Route::post('/cabinet/status',[CabinetcolorController::class,'status']);
		Route::post('/cabinet/multi_change_status',[CabinetcolorController::class,'multi_change_status']);
		
		// Expo Side Colour Routes
		Route::get('exposide', [ExposideController::class, 'index'])->name('admin.exposide');
		Route::get('/exposide/add-exposide',[ExposideController::class,'manage_exposide'])->name('admin.add-exposide');
		Route::get('/exposide/update-exposide/{id}',[ExposideController::class,'manage_exposide'])->name('admin.update-exposide');
		Route::post('/exposide/manage_exposide_process',[ExposideController::class,'manage_exposide_process'])->name('admin.exposide.manage_exposide_process');
		Route::post('/exposide/view_exposide',[ExposideController::class,'view_exposide']);
		Route::post('/exposide/delete',[ExposideController::class,'delete']);
		Route::post('/exposide/multi_delete',[ExposideController::class,'multi_delete']);
		Route::post('/exposide/status',[ExposideController::class,'status']);
		Route::post('/exposide/multi_change_status',[ExposideController::class,'multi_change_status']);

		// Shutter Material Routes
		Route::get('shutter-material', [ShutterMaterialController::class, 'index'])->name('admin.shutter-material');
		Route::get('/shutter-material/add-shutter-material',[ShutterMaterialController::class,'manage_shutter_material'])->name('admin.add-shutter-material');
		Route::get('/shutter-material/update-shutter-material/{id}',[ShutterMaterialController::class,'manage_shutter_material'])->name('admin.update-shutter-material');
		Route::post('/shutter-material/manage_shutter_material_process',[ShutterMaterialController::class,'manage_shutter_material_process'])->name('admin.shutter-material.manage_shutter_material_process');
		Route::post('/shutter-material/view_shutter_material',[ShutterMaterialController::class,'view_shutter_material']);
		Route::post('/shutter-material/delete',[ShutterMaterialController::class,'delete']);
		Route::post('/shutter-material/multi_delete',[ShutterMaterialController::class,'multi_delete']);
		Route::post('/shutter-material/status',[ShutterMaterialController::class,'status']);
		Route::post('/shutter-material/multi_change_status',[ShutterMaterialController::class,'multi_change_status']);

		// Leg Type Routes
		Route::get('legtype', [LegtypeController::class, 'index'])->name('admin.legtype');
		Route::get('/legtype/add-legtype',[LegtypeController::class,'manage_legtype'])->name('admin.add-legtype');
		Route::get('/legtype/update-legtype/{id}',[LegtypeController::class,'manage_legtype'])->name('admin.update-legtype');
		Route::post('/legtype/manage_legtype_process',[LegtypeController::class,'manage_legtype_process'])->name('admin.legtype.manage_legtype_process');
		Route::post('/legtype/view_legtype',[LegtypeController::class,'view_legtype']);
		Route::post('/legtype/delete',[LegtypeController::class,'delete']);
		Route::post('/legtype/multi_delete',[LegtypeController::class,'multi_delete']);
		Route::post('/legtype/status',[LegtypeController::class,'status']);
		Route::post('/legtype/multi_change_status',[LegtypeController::class,'multi_change_status']);

		// Handle Type Routes
		Route::get('handletype', [HandletypeController::class, 'index'])->name('admin.handletype');
		Route::get('/handletype/add-handletype',[HandletypeController::class,'manage_handletype'])->name('admin.add-handletype');
		Route::get('/handletype/update-handletype/{id}',[HandletypeController::class,'manage_handletype'])->name('admin.update-handletype');
		Route::post('/handletype/manage_handletype_process',[HandletypeController::class,'manage_handletype_process'])->name('admin.handletype.manage_handletype_process');
		Route::post('/handletype/view_handletype',[HandletypeController::class,'view_handletype']);
		Route::post('/handletype/delete',[HandletypeController::class,'delete']);
		Route::post('/handletype/multi_delete',[HandletypeController::class,'multi_delete']);
		Route::post('/handletype/status',[HandletypeController::class,'status']);
		Route::post('/handletype/multi_change_status',[HandletypeController::class,'multi_change_status']);

		// materialply6mm Type Routes
		Route::get('materialply6mm', [MaterialPly6MMController::class, 'index'])->name('admin.materialply6mm');
		Route::get('/materialply6mm/add-materialply6mm',[MaterialPly6MMController::class,'manage_materialply6mm'])->name('admin.add-materialply6mm');
		Route::get('/materialply6mm/update-materialply6mm/{id}',[MaterialPly6MMController::class,'manage_materialply6mm'])->name('admin.update-materialply6mm');
		Route::post('/materialply6mm/manage_materialply6mm_process',[MaterialPly6MMController::class,'manage_materialply6mm_process'])->name('admin.materialply6mm.manage_materialply6mm_process');
		Route::post('/materialply6mm/view_materialply6mm',[MaterialPly6MMController::class,'view_materialply6mm']);
		Route::post('/materialply6mm/delete',[MaterialPly6MMController::class,'delete']);
		Route::post('/materialply6mm/multi_delete',[MaterialPly6MMController::class,'multi_delete']);
		Route::post('/materialply6mm/status',[MaterialPly6MMController::class,'status']);
		Route::post('/materialply6mm/multi_change_status',[MaterialPly6MMController::class,'multi_change_status']);

		// materialply18mm Type Routes
		Route::get('materialply18mm', [MaterialPly18MMController::class, 'index'])->name('admin.materialply18mm');
		Route::get('/materialply18mm/add-materialply18mm',[MaterialPly18MMController::class,'manage_materialply18mm'])->name('admin.add-materialply18mm');
		Route::get('/materialply18mm/update-materialply18mm/{id}',[MaterialPly18MMController::class,'manage_materialply18mm'])->name('admin.update-materialply18mm');
		Route::post('/materialply18mm/manage_materialply18mm_process',[MaterialPly18MMController::class,'manage_materialply18mm_process'])->name('admin.materialply18mm.manage_materialply18mm_process');
		Route::post('/materialply18mm/view_materialply18mm',[MaterialPly18MMController::class,'view_materialply18mm']);
		Route::post('/materialply18mm/delete',[MaterialPly18MMController::class,'delete']);
		Route::post('/materialply18mm/multi_delete',[MaterialPly18MMController::class,'multi_delete']);
		Route::post('/materialply18mm/status',[MaterialPly18MMController::class,'status']);
		Route::post('/materialply18mm/multi_change_status',[MaterialPly18MMController::class,'multi_change_status']);

		// shuttermaterialply18mm Type Routes
		Route::get('shuttermaterialply18mm', [ShutterMaterialPly18MMController::class, 'index'])->name('admin.shuttermaterialply18mm');
		Route::get('/shuttermaterialply18mm/add-shuttermaterialply18mm',[ShutterMaterialPly18MMController::class,'manage_shuttermaterialply18mm'])->name('admin.add-shuttermaterialply18mm');
		Route::get('/shuttermaterialply18mm/update-shuttermaterialply18mm/{id}',[ShutterMaterialPly18MMController::class,'manage_shuttermaterialply18mm'])->name('admin.update-shuttermaterialply18mm');
		Route::post('/shuttermaterialply18mm/manage_shuttermaterialply18mm_process',[ShutterMaterialPly18MMController::class,'manage_shuttermaterialply18mm_process'])->name('admin.shuttermaterialply18mm.manage_shuttermaterialply18mm_process');
		Route::post('/shuttermaterialply18mm/view_shuttermaterialply18mm',[ShutterMaterialPly18MMController::class,'view_shuttermaterialply18mm']);
		Route::post('/shuttermaterialply18mm/delete',[ShutterMaterialPly18MMController::class,'delete']);
		Route::post('/shuttermaterialply18mm/multi_delete',[ShutterMaterialPly18MMController::class,'multi_delete']);
		Route::post('/shuttermaterialply18mm/status',[ShutterMaterialPly18MMController::class,'status']);
		Route::post('/shuttermaterialply18mm/multi_change_status',[ShutterMaterialPly18MMController::class,'multi_change_status']);

		// Exposide Price Routes
		Route::get('exposideprice', [ExposidepriceController::class, 'index'])->name('admin.exposideprice');
		Route::get('/exposideprice/add-exposideprice/{id}',[ExposidepriceController::class,'manage_exposideprice'])->name('admin.add-exposideprice');
		Route::get('/exposideprice/update-exposideprice/{id}',[ExposidepriceController::class,'manage_exposideprice'])->name('admin.update-exposideprice');
		Route::post('/exposideprice/manage_exposideprice_process',[ExposidepriceController::class,'manage_exposideprice_process'])->name('admin.exposideprice.manage_exposideprice_process');
		Route::post('/exposideprice/view_exposideprice',[ExposidepriceController::class,'view_exposideprice']);
		Route::post('/exposideprice/delete',[ExposidepriceController::class,'delete']);
		Route::post('/exposideprice/multi_delete',[ExposidepriceController::class,'multi_delete']);
		Route::post('/exposideprice/status',[ExposidepriceController::class,'status']);
		Route::post('/exposideprice/multi_change_status',[ExposidepriceController::class,'multi_change_status']);
		
		// app api key 
		Route::get('/apikey/add-apikey/{id}',[AdminController::class,'manage_apikey'])->name('admin.apikey');
		Route::post('/apikey/manage_apikey_process',[AdminController::class,'manage_apikey_process'])->name('admin.apikey.manage_apikey_process');
		
		// users invoice list 
		Route::get('/user-invoice', [AdminController::class, 'user_invoice'])->name('admin.user-invoice');
		
		//StockmanagtementController Routes
		Route::get('stock-management/', [StockmanagtementController::class, 'index'])->name('admin.stock-management');
		Route::get('stock-management/add-stock', [StockmanagtementController::class, 'add_stock'])->name('admin.add-stock');
		Route::post('/stock-management/stock-management-process',[StockmanagtementController::class,'stock_management_process'])->name('admin.stock-management.stock-management-process');
		Route::get('/stock-management/update-stock-management/{id}',[StockmanagtementController::class,'add_stock'])->name('admin.update-stock-management');
		Route::post('/stock-management/delete',[StockmanagtementController::class,'delete']);
		Route::post('/stock-management/multi_delete',[StockmanagtementController::class,'multi_delete']);
		Route::post('/stock-management/status',[StockmanagtementController::class,'status']);
		Route::post('/stock-management/multi_change_status',[StockmanagtementController::class,'multi_change_status']);
		
		// Customer List
		Route::get('customer-list/', [CustomerListController::class, 'index'])->name('admin.customer-list');
		Route::get('/customer/add-customer-list',[CustomerListController::class,'manage_customer'])->name('admin.add-customer-list');
		Route::get('/customer/update-customer/{id}',[CustomerListController::class,'manage_customer'])->name('admin.update-customer');
		Route::post('/customer/manage_customer_process',[CustomerListController::class,'manage_customer_process'])->name('admin.customer.manage_customer_process');
		Route::post('/customerlist/status',[CustomerListController::class,'status']);
		Route::post('/customerlist/delete',[CustomerListController::class,'delete']);
		Route::post('/custometlist/multi_change_status',[CustomerListController::class,'multi_change_status']);
		Route::post('/custometlist/multi_delete',[CustomerListController::class,'multi_delete']);
		
		// Payment Mode
		
		Route::get('payment-mode/', [PaymentModeController::class, 'index'])->name('admin.payment-mode');
		Route::get('/payment-mode/add-payment-mode',[PaymentModeController::class,'manage_payment'])->name('admin.add-payment-mode');
		Route::get('/payment-mode/update-payment-mode/{id}',[PaymentModeController::class,'manage_payment'])->name('admin.update-payment-mode');
		Route::post('/paymentmode/manage_paymentmode_process',[PaymentModeController::class,'manage_paymentmode_process'])->name('admin.paymentmode.manage_payment_mode_process');
		Route::post('/paymentmode/status',[PaymentModeController::class,'status']);
		Route::post('/paymentmode/delete',[PaymentModeController::class,'delete']);
		Route::post('/paymentmode/multi_change_status',[PaymentModeController::class,'multi_change_status']);
		Route::post('/paymentmode/multi_delete',[PaymentModeController::class,'multi_delete']);
		
		// Generate Bill
		
		Route::get('bill-generate/', [BillGenerateController::class, 'index'])->name('admin.bill-generate');
		Route::get('/bill-generate/add-bill-generate',[BillGenerateController::class,'manage_bill'])->name('admin.add-bill-generate');
		Route::post('/billgenerate/manage_billgenerate_process',[BillGenerateController::class,'manage_billgenerate_process'])->name('admin.billgenerate.manage_bill_process');
		
		Route::post('/bill-generate/edit-bill-generate',[BillGenerateController::class,'update_bill_generate']);
		
		 Route::get('/bill-generate/update-bill-generate/{id}',[BillGenerateController::class,'update_bill'])->name('admin.update-bill-generate');
		 Route::post('/billgenerate/status',[BillGenerateController::class,'status']);
		 Route::post('/billgenerate/delete',[BillGenerateController::class,'delete']);
		 Route::post('/billgenerate/multi_change_status',[BillGenerateController::class,'multi_change_status']);
		 Route::post('/billgenerate/multi_delete',[BillGenerateController::class,'multi_delete']);
		 Route::post('/billgenerate/view',[BillGenerateController::class,'view']);
		 Route::post('/billgenerate/updade-status',[BillGenerateController::class,'update_bill_status']);
		 
		 Route::post('/billgenerate/delete-category-details',[BillGenerateController::class,'delete_category_details']);
		 Route::get('bill-generate-pdf/pdf-generate/{bill}',[BillGenerateController::class,'generate_pdf']);
		 Route::post('billgenerate/addMoreSelect',[BillGenerateController::class,'add_more_select']);
		 Route::post('billgenerate/addMoreReduceBill',[BillGenerateController::class,'add_more_reduce_bill']);
		
		// Expanse Tracker
		Route::get('expanse-tracker/', [ExpanseTrackerController::class, 'index'])->name('admin.expanse-tracker');
		Route::get('expanse-tracker/add-expanse', [ExpanseTrackerController::class, 'manage_expanse'])->name('admin.expanse-tracker.add-expanse');
		Route::get('/expanse-tracker/update-expanse/{id}',[ExpanseTrackerController::class,'manage_expanse'])->name('admin.update-expanse');
		Route::post('/expanse-tracker/manage_expanse_process',[ExpanseTrackerController::class,'manage_expanse_process'])->name('admin.expanse-tracker.manage_expanse_process');
		Route::post('/expanse-tracker/delete',[ExpanseTrackerController::class,'delete']);
		Route::post('/expanse-tracker/multi_delete',[ExpanseTrackerController::class,'multi_delete']);
		Route::post('/expanse-tracker/status',[ExpanseTrackerController::class,'status']);
		Route::post('/expanse-tracker/multi_change_status',[ExpanseTrackerController::class,'multi_change_status']);

		// Customer Bill 
		
		Route::get('customer-bill/', [CustomerBillController::class, 'index'])->name('admin.customer-bill');
		Route::get('customer-bill/add-customer', [CustomerBillController::class, 'add_customer'])->name('admin.add-customer');
		Route::post('/customer-bill/customer-bill-process',[CustomerBillController::class,'customer_bill_process'])->name('admin.customer-bill.customer-bill-process');
		Route::get('/customer-bill/update-customer-bill/{id}',[CustomerBillController::class,'add_customer'])->name('admin.update-customer-bill');
		Route::post('/customer-bill/delete',[CustomerBillController::class,'delete']);
		// Route::post('/customer-bill/multi_delete',[CustomerBillController::class,'multi_delete']);
		Route::post('/customer-bill/status',[CustomerBillController::class,'status']);
		Route::post('/customer-bill/multi_change_status',[CustomerBillController::class,'multi_change_status']);
		
		//expense type

		Route::get('expense-type/', [ExpenseTypeController::class, 'index'])->name('admin.expense-type');
		Route::get('expense-type/add-expense-type',[ExpenseTypeController::class,'manage_expense'])->name('admin.add-expense-type');
		Route::get('/expense-type/update-expense-type/{id}',[ExpenseTypeController::class,'manage_expense'])->name('admin.update-expense-type');
		Route::post('/expense-type/manage-expense-process',[ExpenseTypeController::class,'manage_expense_process'])->name('admin.expense-type.manage_expense_process');
		Route::post('/expense-type/status',[ExpenseTypeController::class,'status']);
		Route::post('/expense-type/delete',[ExpenseTypeController::class,'delete']);
		Route::post('/expense-type/multi_change_status',[ExpenseTypeController::class,'multi_change_status']);
		Route::post('/expense-type/multi_delete',[ExpenseTypeController::class,'multi_delete']);
		
		
		//Report section
		Route::get('sales-report/', [ReportController::class, 'sales_report'])->name('admin.sales-report');
		Route::post('sales-report/', [ReportController::class, 'sales_report_search'])->name('admin.sales-report-search');
		Route::get('ledger-report/', [ReportController::class, 'ledger_report'])->name('admin.ledger-report');
		Route::post('ledger-report/', [ReportController::class, 'ledger_report_search'])->name('admin.ledger-report-search');
		Route::get('expense-report/', [ReportController::class, 'expense_report'])->name('admin.expense-report');
		Route::post('expense-report/', [ReportController::class, 'expense_report_search'])->name('admin.expense-report-search');
		Route::get('stock-summery/', [ReportController::class, 'stock_summery'])->name('admin.stock-summery');
		Route::post('stock-summery-search/', [ReportController::class, 'stock_summery_search'])->name('admin.stock-summery-search');

		// setting controller
		Route::get('setting', [SettingController::class, 'index'])->name('admin.setting');
		Route::post('setting-update/{id}', [SettingController::class, 'updateDetails'])->name('admin.setting.update');
		
		// order
		Route::get('order-details', [OrderController::class, 'order'])->name('admin.order'); 
		
		Route::post('/order-store-data', [OrderController::class, 'order_store'])->name('admin.orderstore');
		
		Route::post('/order-store-details', [OrderController::class, 'order_store_details'])->name('admin.orderdetailsstore');
		Route::post('/order-status', [OrderController::class, 'order_status'])->name('admin.orderStatusChange');
		
		Route::post('/sub-order', [OrderController::class, 'sub_order_details'])->name('admin.subOrderDetails');
		
		// Coupon code Routes
		Route::get('couponcode', [CouponcodeController::class, 'index'])->name('admin.couponcode');
		Route::get('/couponcode/add-couponcode',[CouponcodeController::class,'manage_couponcode'])->name('admin.add-couponcode');
		Route::get('/couponcode/update-couponcode/{id}',[CouponcodeController::class,'manage_couponcode'])->name('admin.update-couponcode');
		Route::post('/couponcode/manage_couponcode_process',[CouponcodeController::class,'manage_couponcode_process'])->name('admin.couponcode.manage_couponcode_process');
		Route::post('/couponcode/view_handletype',[CouponcodeController::class,'view_couponcode']);
		Route::post('/couponcode/delete',[CouponcodeController::class,'delete']);
		Route::post('/couponcode/multi_delete',[CouponcodeController::class,'multi_delete']);
		Route::post('/couponcode/status',[CouponcodeController::class,'status']);
		Route::post('/couponcode/multi_change_status',[CouponcodeController::class,'multi_change_status']);
		
		// check coupon code
		Route::post('/couponcodeVal', [CouponcodeController::class, 'get_coupon_value'])->name('admin.couponcodevalue');
		
		// order download
		Route::get('/order-download-pdf/{id}', [OrderController::class, 'download_pdf']);
		
		Route::get('/order-edit/{id}', [OrderController::class, 'order_edit']);
		Route::get('/order-view/{id}', [OrderController::class, 'order_view']);
		Route::post('/order-details', [OrderController::class, 'order_search'])->name('admin.order.search');
		
		Route::get('/order-view-details/{id}', [OrderController::class, 'order_view_details']);
		// Account
		
		Route::get('account', [AdminController::class, 'user_account'])->name('admin.account');
		Route::post('/account/manage_couponcode_process', [AdminController::class, 'manage_user_account_process'])->name('admin.account.manage_user_account_process');
		
		// our staff
		Route::get('staff', [UserController::class, 'our_staff'])->name('admin.staff');
		
		//  projecttype Routes
		Route::get('projecttype', [ProjecttypeController::class, 'index'])->name('admin.projecttype');
		Route::get('/projecttype/add-projecttype',[ProjecttypeController::class,'manage_projecttype'])->name('admin.add-projecttype');
		Route::get('/projecttype/update-projecttype/{id}',[ProjecttypeController::class,'manage_projecttype'])->name('admin.update-projecttype');
		Route::post('/projecttype/manage_projecttype_process',[ProjecttypeController::class,'manage_projecttype_process'])->name('admin.projecttype.manage_projecttype_process');
		Route::post('/projecttype/view_projecttype',[ProjecttypeController::class,'view_projecttype']);
		Route::post('/projecttype/delete',[ProjecttypeController::class,'delete']);
		Route::post('/projecttype/multi_delete',[ProjecttypeController::class,'multi_delete']);
		Route::post('/projecttype/status',[ProjecttypeController::class,'status']);
		Route::post('/projecttype/multi_change_status',[ProjecttypeController::class,'multi_change_status']);
		
		//  expo-shutter-colour Routes
		Route::get('expo-shutter-colour', [ExposhuttercolourController::class, 'index'])->name('admin.expo-shutter-color');
		Route::get('/expo-shutter-colour/add-expo-shutter-colour',[ExposhuttercolourController::class,'manage_expo_shutter_colour'])->name('admin.add-expo-shutter-colour');
		Route::get('/expo-shutter-colour/update-expo-shutter-colour/{id}',[ExposhuttercolourController::class,'manage_expo_shutter_colour'])->name('admin.update-expo-shutter-colour');
		Route::post('/expo-shutter-colour/manage_expo-shutter-colour_process',[ExposhuttercolourController::class,'manage_expo_shutter_colour_process'])->name('admin.expo-shutter-colour.manage_expo_shutter_colour_process');
		Route::post('/expo-shutter-colour/view_expo-shutter-colour',[ExposhuttercolourController::class,'view_expo-shutter-colour']);
		Route::post('/expo-shutter-colour/delete',[ExposhuttercolourController::class,'delete']);
		Route::post('/expo-shutter-colour/multi_delete',[ExposhuttercolourController::class,'multi_delete']);
		Route::post('/expo-shutter-colour/status',[ExposhuttercolourController::class,'status']);
		Route::post('/expo-shutter-colour/multi_change_status',[ExposhuttercolourController::class,'multi_change_status']);
		
		//  products Routes
		Route::get('products', [ProductsController::class, 'index'])->name('admin.products');
		Route::get('/products/add-products',[ProductsController::class,'manage_products'])->name('admin.add-products');
		Route::get('/products/update-products/{id}',[ProductsController::class,'manage_products'])->name('admin.update-products');
		Route::post('/products/manage_products_process',[ProductsController::class,'manage_products_process'])->name('admin.products.manage_products_process');
		Route::post('/products/view_products',[ProductsController::class,'view_products']);
		Route::post('/products/delete',[ProductsController::class,'delete']);
		Route::post('/products/multi_delete',[ProductsController::class,'multi_delete']);
		Route::post('/products/status',[ProductsController::class,'status']);
		Route::post('/products/multi_change_status',[ProductsController::class,'multi_change_status']);
		
		//  Static Routes
		Route::get('static', [StaticController::class, 'index'])->name('admin.static');
		Route::get('/static/add-static',[StaticController::class,'manage_static'])->name('admin.add-static');
		Route::get('/static/update-static/{id}',[StaticController::class,'manage_static'])->name('admin.update-static');
		Route::post('/static/manage_static_process',[StaticController::class,'manage_static_process'])->name('admin.static.manage_static_process');
		Route::post('/static/view_static',[StaticController::class,'view_static']);
		Route::post('/static/delete',[StaticController::class,'delete']);
		Route::post('/static/multi_delete',[StaticController::class,'multi_delete']);
		Route::post('/static/status',[StaticController::class,'status']);
		Route::post('/static/multi_change_status',[StaticController::class,'multi_change_status']);
		
		// CMS Routes
		Route::get('cms', [CmsController::class, 'index'])->name('admin.cms');
		Route::get('/cms/add-cms',[CmsController::class,'cms_edit'])->name('admin.add-cms');
		Route::get('/cms/cms-edit/{id}', [CmsController::class, 'cms_edit'])->name('admin.cms-edit');
		Route::post('/cms/manage_cms_process',[CmsController::class,'manage_cms_process'])->name('admin.cms.manage_cms_process');
		Route::post('/cms/view-cms',[CmsController::class,'admin.view_cms']);
		Route::post('/cms/status',[CmsController::class,'status']);
		Route::post('/cms/multi_change_status',[CmsController::class,'multi_change_status']);
		Route::get('/cms/cms-apply/{id}', [CmsController::class, 'cms_apply'])->name('cms-apply');
		Route::post('/cms/cms-apply-view', [CmsController::class, 'cms_apply_view']);
		
		// Email Management Routes
		Route::get('email-management', [EmailManagementController::class,'index'])->name('admin.email-management');
		Route::get('/email-management/add-email-management',[EmailManagementController::class,'manage_email_management'])->name('admin.add-email-management');
		Route::get('/email-management/email-management-edit/{id}', [EmailManagementController::class, 'manage_email_management'])->name('admin.email-management-edit');
		Route::post('/email-management/manage_email_management_process',[EmailManagementController::class,'manage_email_management_process'])->name('admin.email-management.manage_email_management_process');
		Route::post('/email-management/view_email_management',[EmailManagementController::class,'view_email_management']);
		Route::post('/email-management/delete',[EmailManagementController::class,'delete']);
		Route::post('/email-management/multi_delete',[EmailManagementController::class,'multi_delete']);
		Route::post('/email-management/status',[EmailManagementController::class,'status']);
		Route::post('/email-management/multi_change_status',[EmailManagementController::class,'multi_change_status']);
});

Route::prefix('admin')->group(function () {
	Route::middleware('admin_login')->group(function () {
		Route::get('/login', [AdminController::class, 'login'])->name('admin_login');
		Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
		Route::get('/forget-password', [AdminController::class, 'forget_password'])->name('admin_forget_password');
		Route::post('/forget-password-submit', [AdminController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
		Route::get('/reset-password/{token}/{email}', [AdminController::class, 'reset_password'])->name('admin_reset_password');
		Route::post('/reset-password-submit', [AdminController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
	});
	Route::get('/logout', [AdminController::class, 'logout'])->name('admin_logout');
});





