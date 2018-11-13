<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('types', 'TypeController');
Route::resource('products', 'ProductController');
Route::resource('providers', 'ProviderController');
Route::resource('buys', 'BuyController');
Route::resource('drivers', 'DriverController');
Route::resource('sales', 'SaleController');
Route::resource('kardexes', 'KardexController');

Route::get('kardex/{product_id}', 'KardexController@product')->name('kardex');
Route::get('registroCompra/{buy}', 'KardexController@registro_compra')->name('registroCompra');
Route::get('registroVenta/{sale}', 'KardexController@registroVenta')->name('registroVenta');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Routes

Route::middleware(['auth'])->group(function(){
	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');

	//Products


	Route::get('products', 'ProductController@index')->name('products.index')
		->middleware('permission:products.index');

	Route::post('products/store', 'ProductController@store')->name('products.store')
		->middleware('permission:products.create');

	Route::get('products/create', 'ProductController@create')->name('products.create')
		->middleware('permission:products.create');

	Route::put('products/{product}', 'ProductController@update')->name('products.update')
		->middleware('permission:products.edit');

	Route::get('products/{product}', 'ProductController@show')->name('products.show')
		->middleware('permission:products.show');

	Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy')
		->middleware('permission:products.destroy');

	Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit')
		->middleware('permission:products.edit');

	//Users

	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');

	//Drivers

	Route::get('drivers', 'DriverController@index')->name('drivers.index')
		->middleware('permission:drivers.index');

	Route::post('drivers/store', 'DriverController@store')->name('drivers.store')
		->middleware('permission:drivers.create');
		
	Route::get('drivers/create', 'DriverController@create')->name('drivers.create')
		->middleware('permission:drivers.create');

	Route::put('drivers/{driver}', 'DriverController@update')->name('drivers.update')
		->middleware('permission:drivers.edit');

	Route::get('drivers/{driver}', 'DriverController@show')->name('drivers.show')
		->middleware('permission:drivers.show');

	Route::delete('drivers/{driver}', 'DriverController@destroy')->name('drivers.destroy')
		->middleware('permission:drivers.destroy');

	Route::get('drivers/{driver}/edit', 'DriverController@edit')->name('drivers.edit')
		->middleware('permission:drivers.edit');

	//Drivers

	Route::get('vehicles', 'VehicleController@index')->name('vehicles.index')
		->middleware('permission:vehicles.index');

	Route::post('vehicles/store', 'VehicleController@store')->name('vehicles.store')
		->middleware('permission:vehicles.create');
		
	Route::get('vehicles/create', 'VehicleController@create')->name('vehicles.create')
		->middleware('permission:vehicles.create');

	Route::put('vehicles/{vehicle}', 'VehicleController@update')->name('vehicles.update')
		->middleware('permission:vehicles.edit');

	Route::get('vehicles/{vehicle}', 'VehicleController@show')->name('vehicles.show')
		->middleware('permission:vehicles.show');

	Route::delete('vehicles/{vehicle}', 'VehicleController@destroy')->name('vehicles.destroy')
		->middleware('permission:vehicles.destroy');

	Route::get('vehicles/{vehicle}/edit', 'VehicleController@edit')->name('vehicles.edit')
		->middleware('permission:vehicles.edit');

	//Sales

	Route::get('sales', 'SaleController@index')->name('sales.index')
		->middleware('permission:sales.index');

	Route::post('sales/store', 'SaleController@store')->name('sales.store')
		->middleware('permission:sales.create');
		
	Route::get('sales/create', 'SaleController@create')->name('sales.create')
		->middleware('permission:sales.create');

	Route::put('sales/{sale}', 'SaleController@update')->name('sales.update')
		->middleware('permission:sales.edit');

	Route::get('sales/{sale}', 'SaleController@show')->name('sales.show')
		->middleware('permission:sales.show');

	Route::delete('sales/{sale}', 'SaleController@destroy')->name('sales.destroy')
		->middleware('permission:sales.destroy');

	Route::get('sales/{sale}/edit', 'SaleController@edit')->name('sales.edit')
		->middleware('permission:sales.edit');

	//Buys

	Route::get('buys', 'BuyController@index')->name('buys.index')
		->middleware('permission:buys.index');

	Route::post('buys/store', 'BuyController@store')->name('buys.store')
		->middleware('permission:buys.create');
		
	Route::get('buys/create', 'BuyController@create')->name('buys.create')
		->middleware('permission:buys.create');

	Route::put('buys/{buy}', 'BuyController@update')->name('buys.update')
		->middleware('permission:buys.edit');

	Route::get('buys/{buy}', 'BuyController@show')->name('buys.show')
		->middleware('permission:buys.show');

	Route::delete('buys/{buy}', 'BuyController@destroy')->name('buys.destroy')
		->middleware('permission:buys.destroy');

	Route::get('buys/{buy}/edit', 'BuyController@edit')->name('buys.edit')
		->middleware('permission:buys.edit');

	//Providers

	Route::get('providers', 'ProviderController@index')->name('providers.index')
		->middleware('permission:providers.index');

	Route::post('providers/store', 'ProviderController@store')->name('providers.store')
		->middleware('permission:providers.create');
		
	Route::get('providers/create', 'ProviderController@create')->name('providers.create')
		->middleware('permission:providers.create');

	Route::put('providers/{provider}', 'ProviderController@update')->name('providers.update')
		->middleware('permission:providers.edit');

	Route::get('providers/{provider}', 'ProviderController@show')->name('providers.show')
		->middleware('permission:providers.show');

	Route::delete('providers/{provider}', 'ProviderController@destroy')->name('providers.destroy')
		->middleware('permission:providers.destroy');

	Route::get('providers/{provider}/edit', 'ProviderController@edit')->name('providers.edit')
		->middleware('permission:providers.edit');

	//types

	Route::get('types', 'TypeController@index')->name('types.index')
		->middleware('permission:types.index');

	Route::post('types/store', 'TypeController@store')->name('types.store')
		->middleware('permission:types.create');
		
	Route::get('types/create', 'TypeController@create')->name('types.create')
		->middleware('permission:types.create');

	Route::put('types/{type}', 'TypeController@update')->name('types.update')
		->middleware('permission:types.edit');

	Route::get('types/{type}', 'TypeController@show')->name('types.show')
		->middleware('permission:types.show');

	Route::delete('types/{type}', 'TypeController@destroy')->name('types.destroy')
		->middleware('permission:types.destroy');

	Route::get('types/{type}/edit', 'TypeController@edit')->name('types.edit')
		->middleware('permission:types.edit');

	//Measures

	Route::get('measures', 'MeasureController@index')->name('measures.index')
		->middleware('permission:measures.index');

	Route::post('measures/store', 'MeasureController@store')->name('measures.store')
		->middleware('permission:measures.create');
		
	Route::get('measures/create', 'MeasureController@create')->name('measures.create')
		->middleware('permission:measures.create');

	Route::put('measures/{measure}', 'MeasureController@update')->name('measures.update')
		->middleware('permission:measures.edit');

	Route::get('measures/{measure}', 'MeasureController@show')->name('measures.show')
		->middleware('permission:measures.show');

	Route::delete('measures/{measure}', 'MeasureController@destroy')->name('measures.destroy')
		->middleware('permission:measures.destroy');

	Route::get('measures/{measure}/edit', 'MeasureController@edit')->name('measures.edit')
		->middleware('permission:measures.edit');

	//Kardex

	Route::get('kardexes', 'KardexController@index')->name('kardexes.index')
		->middleware('permission:kardexes.index');

	Route::post('kardexes/store', 'KardexController@store')->name('kardexes.store')
		->middleware('permission:kardexes.create');
		
	Route::get('kardexes/create', 'KardexController@create')->name('kardexes.create')
		->middleware('permission:kardexes.create');

	Route::put('kardexes/{type}', 'KardexController@update')->name('kardexes.update')
		->middleware('permission:kardexes.edit');

	Route::get('kardexes/{type}', 'KardexController@show')->name('kardexes.show')
		->middleware('permission:kardexes.show');

	Route::delete('kardexes/{type}', 'KardexController@destroy')->name('kardexes.destroy')
		->middleware('permission:kardexes.destroy');

	Route::get('kardexes/{type}/edit', 'KardexController@edit')->name('kardexes.edit')
		->middleware('permission:kardexes.edit');

	//Reportes
	Route::get('reports', 'ReportController@index')->name('reports')
		->middleware('permission:reports.index');

	Route::get('export', 'ReportController@report_venta')->name('export')
		->middleware('permission:reports.export');

	Route::get('venta/{sale}','ReportController@venta')->name('venta')
		->middleware('permission:reports.venta');

	Route::get('buy', 'ReportController@report_compra')->name('buyreport')
		->middleware('permission:reports.buyreport');

	Route::get('buypdf/{buy}', 'ReportController@buy')->name('buypdf')
		->middleware('permission:reports.buypdf');

	Route::get('Kardexs', 'ReportController@report')->name('kardexs')
		->middleware('permission:reports.kardexes');

	Route::get('detallekardex/{kardex}','ReportController@kardex')->name('detallekardex')
		->middleware('permission:reports.kardex');

	Route::get('drivers_pdf', 'ReportController@drivers')->name('drivers_pdf')
		->middleware('permission:reports.drivers');

	Route::get('detalledriver/{driver}','ReportController@driver')->name('detalledriver')
		->middleware('permission:reports.driver');

	Route::get('exportsdriver/{driver}','ReportController@exportsdriver')->name('exportsdriver')
		->middleware('permission:reports.exportsdriver');

	Route::get('products_pdf', 'ReportController@products')->name('products_pdf')
		->middleware('permission:reports.products');
	
	Route::get('product_pdf/{product}', 'ReportController@product')->name('product_pdf')
		->middleware('permission:reports.product');

	Route::get('providers_pdf', 'ReportController@providers')->name('providers_pdf')
		->middleware('permission:reports.providers');

	Route::get('users_pdf', 'ReportController@users')->name('users_pdf')
		->middleware('permission:reports.users');

	Route::get('detalleprovider/{provider}','ReportController@provider')->name('detalleprovider')
		->middleware('permission:reports.provider');

	Route::get('buysprovider/{provider}','ReportController@buysprovider')->name('buysprovider')
		->middleware('permission:reports.buysprovider');

	//Charts	

	Route::get('charts','GraphicController@index')->name('charts')
		->middleware('permission:graphics.index');

	Route::get('stoksgraphics','GraphicController@stoksgraphics')->name('stoksgraphics')
		->middleware('permission:graphics.stoksgraphics');

	Route::get('buysgraphics','GraphicController@buysgraphics')->name('buysgraphics')
		->middleware('permission:graphics.buysgraphics');

	Route::get('salesgraphics','GraphicController@salesgraphics')->name('salesgraphics')
		->middleware('permission:graphics.salesgraphics');
});
