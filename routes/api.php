<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\RegisterController;
use App\Models\Frontend\RegisterModel;

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


// Route::post('/Register', function(Request $request) {
//     // If the Content-Type and Accept headers are set to 'application/json',
//     // this will return a JSON structure. This will be cleaned up later.
//     return RegisterModel::create($request->all);
// });

Route::post('/register', 'Frontend\RegisterController@register');
// Route::post('register', 'Auth\RegisterController@register');

// Route::get('/Register', [RegisterController::class,'index']);


// Route::get('/Register/User', [RegisterController::class,'store']);


// Route::post('/Register/User', 'Frontend\RegisterController@store');
