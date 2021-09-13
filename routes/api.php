<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Frontend\RegisterModel;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('register', function(Request $request) {
//     return RegisterModel::create($request->all);
// });

// Route::post('/register', 'Frontend\RegisterController@register');
// Route::post('register', function(Request $request) {
//     // If the Content-Type and Accept headers are set to 'application/json',
//     // this will return a JSON structure. This will be cleaned up later.
//     return 'hii';
// });

// Route::post('/register', 'Frontend\RegisterController@register');
// Route::post('register', 'Auth\RegisterController@register');

Route::get('RegisterView', 'Frontend\CartController@index');
Route::post('Insert', 'Frontend\CartController@register');
Route::post('Login', 'Frontend\LoginController@apiLogin');

Route::get('/EditUser{id}', 'Frontend\UserController@apiUser');
Route::post('/EditUser{id}', 'Frontend\UserController@apiUserUpdate');


Route::get('/Viewbook', 'Admin\BookController@apiBookView');

Route::get('/ViewProduct{id}', 'Admin\BookController@apiProduct');

Route::post('/AddToCart', 'Frontend\CartController@apiStore');

Route::get('/CartView{id}', 'Frontend\CartController@apiShow');

Route::post('/UpdateCart', 'Frontend\CartController@apiEdit');

Route::get('/DeleteCart{id}', 'Frontend\CartController@apiDelete');

// Route::get('/Register/User', [RegisterController::class,'store']);


// Route::post('/Register/User', 'Frontend\RegisterController@store');
