<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/signup',[AuthController::class, 'signup']);

Route::post('/verify-otp',[AuthController::class, 'verifyOtp']);

Route::post('/update-user-profile-details',[UserController::class, 'updateUserDetails']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    //secured route

    
});
