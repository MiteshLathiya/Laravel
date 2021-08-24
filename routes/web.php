<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//frontend
Route::get('/', 'Frontend\IndexController@show')->name('home');

Route::get('/Register', 'Frontend\RegisterController@index');
Route::post('/Register/User', 'Frontend\RegisterController@store');
Route::get('/User', 'Frontend\LoginController@index')->name('User');
Route::post('/UserLogin', 'Frontend\LoginController@userlogin');
Route::get('/UserLogout', 'Frontend\LoginController@logout');

Route::get('/UserProfile', 'Frontend\UserController@index')->name('userprofile');
Route::get('/UserProfile', 'Frontend\OrderController@show');
Route::post('/EditUser', 'Frontend\UserController@update');
Route::get('/OrderPDF', 'Frontend\OrderController@download')->name('OrderPDF');

Route::get('/ViewCart/{id}', 'Admin\BookController@showproduct')->name('viewcart');
Route::post('/AddToCart', 'Frontend\CartController@store');
Route::get('/CartView', 'Frontend\CartController@show')->name('cartview');

Route::get('/EditCartView/{id}', 'Frontend\CartController@edit')->name('editcartview');
Route::post('/UpdateCart', 'Frontend\CartController@update');
Route::get('/DeleteCart/{id}', 'Frontend\CartController@destroy')->name('deletecart');

Route::get('/PlaceOrder', 'Frontend\CartController@showdata');
Route::post('/OrderInsert', 'Frontend\OrderController@store');

Route::get('/OrderView', 'Frontend\EmailController@show')->name('orderview');
Route::get('/Email', 'Frontend\EmailController@sendemail')->name('sendemail');
// Route::post('/Email', 'Frontend\EmailController@sendEmail')

//admin side

Route::get('/Admin', 'Admin\LoginController@index');
Route::post('/Login', 'Admin\LoginController@adminlogin');
Route::get('/Logout', 'Admin\LoginController@logout');

Route::get('/Dashboard', 'Admin\DashboardController@index');

Route::get('/Dashboard/Addbookpage', 'Admin\BookController@index');
Route::post('/Dashboard/Addbook', 'Admin\BookController@store');

Route::get('/Dashboard/Viewbook', 'Admin\BookController@show')->name('dashboard.viewbook');
Route::get('/Dashboard/Editbookpage/{id}', 'Admin\BookController@edit')->name('dashboard.editbook');
Route::post('/Dashboard/Editbook', 'Admin\BookController@update');
Route::get('/Dashboard/Deletebook/{id}', 'Admin\BookController@destroy')->name('dashboard.deletebook');

Route::get('/Dashboard/Profile', 'Admin\AdminProfileController@show');
Route::post('/Dashboard/ChangePassword', 'Admin\AdminProfileController@update');

Route::get('/Dashboard/Viewuser', 'Admin\UserController@show')->name('dashboard.viewuser');
Route::get('/Dashboard/Edituser/{id}', 'Admin\UserController@edit')->name('dashboard.edituser');
Route::post('/Dashboard/Edituserdata', 'Admin\UserController@update');
Route::get('/Dashboard/Deleteuser/{id}', 'Admin\UserController@destroy')->name('dashboard.deleteuser');
Route::get('/Dashboard/Orderhistory', 'Frontend\OrderController@showallorder');
Route::get('/Dashboard/EditOrder', 'Frontend\OrderController@showallorder')->name('dashboard.editorder');



// Route::get('/Dashboard/Viewbook','Admin\ViewBookController@show');
// Route::resource('/Dashboard/Viewbook','Admin\ViewBookController');




// Route::get('/Dashboard','Admin\AdminController@index')->name('Dashboard');
// Route::get('/','Admin\LoginController@adminlogin');
