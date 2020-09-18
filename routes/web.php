<?php


// FOR Any Unauthenticated Users
Auth::routes();
// Route::get('/',['uses' =>'\App\Http\Controllers\Auth\LoginController@login', 'as' => 'index']); 
// Route::get('/', '\App\Http\Controllers\Auth\LoginController@login');
Route::get('/', '\App\Http\Controllers\Auth\LoginController@login');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('markAsRead', function()
{
    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');

//FOR Any Unauthenticated Users

// *********************

Route::get('404',['as'=>'404', 'uses'=>'ErrorHandlerController@errorCode404']);

Route::group(['middleware' => 'prevent-back-history'],function(){

Route::group(['middleware'=> 'auth'], function() { 
// ***********************

// Authenticated Administrators

Route::group(['middleware' => 'admin' ], function(){
Route::get('/', '\App\Http\Controllers\Auth\LoginController@login');

            // Main Dashboard
    Route::get('/dashboard',['uses' =>'DashboardController@index', 'as' => 'dashboard']); 
    Route::post('/user/store',['uses'=> 'UsersController@store','as' => 'user.store']);
    Route::get('user/admin/{id}',['uses' => 'UsersController@admin','as' => 'user.admin']);
    Route::get('user/not-admin/{id}',['uses' => 'UsersController@not_admin','as' => 'user.not.admin']);
    Route::get('/users',['uses'=>'UsersController@index', 'as' =>'users']);
    Route::get('/user/create',['uses' => 'UsersController@create','as' => 'user.create']);
    Route::get('delete-user/{id}','UsersController@destroy')->middleware('admin');

        //Category Routes 
    Route::get('/create_category',['uses' => 'CategoryController@create', 'as' => 'category.create'])->middleware('admin');
    Route::get('/category_list',['uses' => 'CategoryController@index', 'as' => 'category.index'])->middleware('admin');
    Route::post('/store_category',['uses' => 'CategoryController@store', 'as' => 'category.store'])->middleware('admin');
    Route::get('/delete_category/{id}',['uses' => 'CategoryController@destroy', 'as' => 'category.destroy'])->middleware('admin');
    Route::get('/edit_category/{id}',['uses' => 'CategoryController@edit', 'as' => 'category.edit'])->middleware('admin');
    Route::post('/category_update/{id}',['uses' =>'CategoryController@update','as' => 'category.update'])->middleware('admin');  
    Route::get('/category_delete/{id}',['uses' =>'CategoryController@delete','as' => 'category.delete'])->middleware('admin');  
    Route::get('/category_restore/{id}',['uses' =>'CategoryController@restore','as' => 'category.restore'])->middleware('admin');  
    Route::get('/category_destroy/{id}',['uses' =>'CategoryController@destroy','as' => 'category.destroy'])->middleware('admin');  
    Route::get('/trashed_categories',['uses' =>'CategoryController@showTrash','as' => 'category.showTrash'])->middleware('admin');  


        //Assets Routes
    Route::get('/create_asset',['uses' => 'AssetsController@create', 'as' => 'asset.create'])->middleware('admin');
    Route::get('/all_assets',['uses' => 'AssetsController@index', 'as' => 'asset.index'])->middleware('admin');
    Route::get('/asset_list/{id}', ['uses'=> 'AssetsController@showList', 'as' =>'asset.list'])->middleware('admin');
    Route::post('/store_asset',['uses' => 'AssetsController@store', 'as' => 'asset.store'])->middleware('admin');
    Route::get('/delete_asset',['uses' => 'AssetsController@delete', 'as' => 'asset.delete'])->middleware('admin');
    Route::get('/edit_asset/{id}',['uses' => 'AssetsController@edit', 'as' => 'asset.edit'])->middleware('admin');
    Route::post('/update_asset/{id}',['uses' => 'AssetsController@update', 'as' => 'asset.update'])->middleware('admin');
    Route::get('/create_category_asset/{id}', ['uses'=> 'AssetsController@categoryAsset', 'as' =>'asset.categorycreate'])->middleware('admin');
    Route::post('/store_category_asset/{id}', ['uses'=> 'AssetsController@categoryStore', 'as' =>'asset.categorystore'])->middleware('admin');
    Route::get('/delete_asset/{id}',['uses' => 'AssetsController@delete', 'as' => 'asset.delete'])->middleware('admin');
    Route::get('/restore_asset/{id}',['uses' => 'AssetsController@restore', 'as' => 'asset.restore'])->middleware('admin');
    Route::get('/destory_asset/{id}',['uses' => 'AssetsController@destroy', 'as' => 'asset.destroy'])->middleware('admin');
    Route::get('/trashed_assets',['uses' => 'AssetsController@showTrash', 'as' => 'asset.showTrash'])->middleware('admin');


        //Request Routes
    Route::get('/all_requests',['uses' => 'RequestController@index', 'as' => 'order.index'])->middleware('admin');
    Route::get('/approve_request/{id}',['uses' => 'RequestController@accept', 'as' => 'order.accept'])->middleware('admin');
    Route::get('/reject_request/{id}',['uses' => 'RequestController@reject', 'as' => 'order.reject'])->middleware('admin');

    Route::get('/requests-chart', 'ChartsController@getOrdersMonthlyData')->name('chartOrdersShow');
    Route::get('/System_Log',['uses' => 'LogsController@index', 'as' => 'log.index'])->middleware('admin');


});
// Authenticated Administrators

//  ********************


// **************************

// Common for User and Admin
Route::get('/home', 'DashboardController@mydashboard')->name('admin_home'); 
Route::get('delete-image/{id}','BookController@deleteImage');
Route::get('delete-profile/{id}','ProfilesController@destroy');
Route::get('delete-file/{id}','BookController@deleteFile');
Route::get('user/profile',['uses' => 'ProfilesController@index','as' => 'user.profile']);
Route::post('/user/profile/update',['uses' => 'ProfilesController@update','as' => 'user.profile.update']);


Route::get('/new_request',['uses' => 'RequestController@create', 'as' => 'order.create']);
Route::post('/store_request',['uses' => 'RequestController@store', 'as' => 'order.store']);
Route::get('/edit_request/{id}',['uses' => 'RequestController@edit', 'as' => 'order.edit']);
Route::post('/update_request/{id}',['uses' => 'RequestController@update', 'as' => 'order.update']);
Route::get('/my_requests',['uses' => 'RequestController@showMine', 'as' => 'order.myRequests']);


// Commen for User and Admin

    

});




});//Prevent
