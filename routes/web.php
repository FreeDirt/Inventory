<?php

use App\Http\Controllers\UploadController;

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

// Home Page
Route::get('/', 'PagesController@gethome');
// Search Inventory
Route::get('/search', 'StockController@search');
// items
Route::get('/stock/allitems/', 'StockController@allItems');
// Table Controller List
Route::get('/tblist', 'PagesController@tblist');
// Contact Message
Route::get('/contact', 'PagesController@contact');
// Inventory Controller CRUD
Route::resource('inventory', 'InventoryController');
// Category Controller CRUD
Route::resource('category', 'CategoryController');
// Brand Controller CRUD
Route::resource('brand', 'BrandController');
// DeviceController CRUD
Route::resource('device', 'DeviceController');

// StocksController CRUD
Route::resource('media', 'MediaController');

// StocksController CRUD
Route::resource('stock', 'StockController');
Route::get('stock/ajax/{id}',array('as'=>'stock.ajax','uses'=>'StockController@stockAjax'));
Route::get('stock/items/{items}',array('as'=>'stock.items','uses'=>'StockController@getItems'));
Route::get('stock/allitems/',array('as'=>'stock.allitems','uses'=>'StockController@allItems'));

Route::get('ui', [ UploadController::class, 'upload' ]);
Route::post('upload', [ UploadController::class, 'uploadFile' ])->name('uploadFile');

// Role Controller CRUD
Route::resource('role', 'RoleController');
// Profile Controller CRUD
Route::resource('profile', 'ProfileController');
// Admin Controller CRUD
Route::resource('admin', 'AdminController');
// Employee Controller CRUD
Route::resource('employee', 'EmployeeController');
// Company Controller CRUD
Route::resource('company', 'CompanyController');
// Company Designation CRUD
Route::resource('designation', 'DesignationController');
// Company Department CRUD
Route::resource('department', 'DepartmentController');
// Company Ipaddress CRUD
Route::resource('ipaddress', 'IpaddressController');
// Company Country CRUD
Route::resource('country', 'CountryController');


// Employee Controller CRUD
// Route::get('stock/{post_id}/{like_value}', ['uses' => 'stockController@index', 'as' => 'like']);

// Massagers Controller Submit
Route::post('/contact/submit', 'MessagesController@submit');
// Massagers Controller Output/View
Route::get('/messages', 'MessagesController@getMessages');
// Route Resources Auth
Auth::routes();
// Dashboard Controller Index / Home Page
Route::get('/dashboard', 'DashboardController@index');

// USER UPDATE


// Import / Export Employee
Route::post('employees/import', 'EmployeeController@import');
Route::get('employees/export', 'EmployeeController@export');

// Import / Export Device
Route::post('devices/import', 'DeviceController@import');
Route::get('devices/export', 'DeviceController@export');


// Route::get('/admin/edit', 'UsersController@edit');
// Route::post('/admin/update', 'UsersController@update');
// Route::get('/adminpanel', ['uses' => 'PagesController@adminpanel', 'middleware' => 'roles', 'roles' => ['Admin', 'Author']]);

// Route::get('/inventory', 'PagesController@inventory');

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/user', function () {
//     return view('user');
// });

// Route::get('/tblist', function () {
//     return view('tblist');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

