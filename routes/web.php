<?php
	
	use App\Http\Controllers\Auth\LoginController;
	use App\Services\PostcodeFilter;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Route;


	//admin routes
		//AUth
		Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
		Route::post('/admin/login', [LoginController::class, 'authenticate']);
		Route::post('/admin/logout', function(){
			Auth::logout();
			return redirect()->back();
		})->name('logout');
		//Admin dashboard routes
		Route::get('/admin/dashboard', [\App\Http\Controllers\admin\DashboardController::class, 'index'])
			->name('admin.dashboard')
			->middleware('admin');
		
		Route::get('/admin/orders', [\App\Http\Controllers\admin\OrdersController::class, 'index'])
			->name('admin.orders')
			->middleware('admin');
		
		Route::get('/admin/orders/{order_id}/finish', [\App\Http\Controllers\admin\OrdersController::class, 'finishOrder'])
			->name('admin.orders.finish')
			->middleware('admin');
		
		Route::get('/admin/orders/{order_id}/cancel', [\App\Http\Controllers\admin\OrdersController::class, 'cancelOrder'])
			->name('admin.orders.cancel')
			->middleware('admin');
		
		Route::post('/admin/orders/{order_id}/delete', [\App\Http\Controllers\admin\OrdersController::class, 'deleteOrder'])
			->name('admin.orders.delete')
			->middleware('admin');
	
		Route::post('/admin/orders/{order_id}/notify', [\App\Http\Controllers\admin\OrdersController::class, 'sendNotification'])
			->name('admin.orders.notify')
			->middleware('admin');
		
		Route::get('/admin/orders/{order_id}/kitchenPrint', [\App\Http\Controllers\admin\PrintController::class, 'printForKitchen'])
			->name('admin.orders.kitchen')
			->middleware('admin');
		
		Route::get('/admin/orders/{order_id}/customerPrint', [\App\Http\Controllers\admin\PrintController::class, 'printForCustomer'])
			->name('admin.orders.customer')
			->middleware('admin');
		
		Route::get('/admin/products', [\App\Http\Controllers\admin\ProductsController::class, 'index'])
			->name('admin.products')
			->middleware('admin');
		
		Route::get('/admin/customers', [\App\Http\Controllers\admin\CustomersController::class, 'index'])
			->name('admin.customers')
			->middleware('admin');
		
		Route::get('/admin/orders-history', [\App\Http\Controllers\admin\OrdersController::class, 'ordersHistory'])
			->name('admin.history')
			->middleware('admin');
		
		Route::get('/admin/settings', [\App\Http\Controllers\admin\SettingsController::class, 'index'])
			->name('admin.settings')
			->middleware('admin');
		
		Route::get('/admin/settings/close', [\App\Http\Controllers\admin\SettingsController::class, 'closeStore'])
			->name('admin.settings.close')
			->middleware('admin');
		
		Route::get('/admin/settings/open', [\App\Http\Controllers\admin\SettingsController::class, 'openStore'])
			->name('admin.settings.open')
			->middleware('admin');
	
	//end of admin routes
	
	Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
	Route::get('/faq', function(){
		return view('layouts.faq');
	})->name('faq');
	
	Route::get('/contact', [\App\Http\Controllers\FeedbackController::class, 'index'])->name('contact');
	
	Route::get('/filter-postcode/{postcode?}', function($postcode, PostcodeFilter $postcodeFilter){
		return json_encode($postcodeFilter->inRange($postcode));
	});
	
	Route::post('/contact/store', [\App\Http\Controllers\FeedbackController::class, 'store'])->name('contact.store');

	Route::post('/orders/create', [\App\Http\Controllers\OrderController::class, 'collectInfo']);
	Route::post('/orders/confirm', [\App\Http\Controllers\OrderController::class, 'confirmOrder']);
	
	//Preview email
	Route::get('/ordermail', function(){
		$order = \App\Models\Order::find(2);
		
		return new \App\Mail\NewOrder($order);
	});
