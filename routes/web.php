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

//      admin & guest & user
Route::get('/', 'ViewController@root');
Route::get('/home', 'ViewController@home');
//      user & admin
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
//      guest
Route::post('/login', 'UserController@login');
Route::get('/login', 'ViewController@login');
Route::post('/register', 'UserController@register');
Route::get('/register', 'ViewController@register');



// ADMIN
Route::group(['middleware' => 'admin'], function() {
    //      user
    Route::post('/insertmember', 'UserController@insertmember');
    Route::get('/insertmember', 'ViewController@insertmember');
    Route::get('/managemember', 'UserController@index_manage');
    Route::post('/updatemember/{id}', 'UserController@updatemember');
    Route::get('/updatemember/{id}', 'UserController@index_updatemember');
    Route::get('/deletemember/{id}', 'UserController@delete');
    //      phone
    Route::get('/managephone', 'PhoneController@index_manage');
    Route::post('/insertphone', 'PhoneController@insert');
    Route::get('/insertphone', 'PhoneController@index_insert');
    Route::post('/updatephone/{id}', 'PhoneController@update');
    Route::get('/updatephone/{id}', 'PhoneController@index_update');
    Route::get('/deletephone/{id}', 'PhoneController@delete');
    Route::get('/managephone/search', 'PhoneController@search');
    //      brand
    Route::post('/insertbrand', 'BrandController@insert');
    Route::get('/insertbrand', 'ViewController@insertbrand');
    Route::post('/updatebrand/{id}', 'BrandController@update');
    Route::get('/updatebrand/{id}', 'BrandController@index_update');
    Route::get('/deletebrand/{id}', 'BrandController@delete');
    Route::get('/managebrand', 'BrandController@index_manage');
    //      transaction
    Route::get('/transactionlist', 'TransactionController@index_list');
    Route::get('/deletefromtransaction/{id}', 'TransactionController@delete');
    Route::get('/transactiondetail/{id}', 'TransactionController@index_detail');
});



// USER
Route::group(['middleware' => 'user'], function() {
    //      user
    Route::post('/updateprofile', 'UserController@update');
    Route::get('/updateprofile', 'ViewController@updateprofile');
    //      phone
    Route::get('/phonelist', 'PhoneController@index_phonelist');
    Route::get('/phonelist/search', 'PhoneController@search');
    //      cart
    Route::post('/addtocart/{id}', 'CartController@addtocart');
    Route::get('/addtocart/{id}', 'CartController@index_addtocart');
    Route::post('/insertcomment/{id}', 'CartController@insertcomment');
    Route::get('/cart', 'CartController@index_cart');
    Route::get('/completepayment', 'CartController@completepayment');
    Route::get('/deletefromcart/{id}', 'CartController@delete');
    //      transaction
    Route::get('/transactionhistory', 'TransactionController@index_history');
    Route::get('/transactiondetail/{id}', 'TransactionController@index_detail');
});
