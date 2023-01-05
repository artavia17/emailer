<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\Api\EmailMailable;
use App\Http\Controllers\Api\EmailConfigController;
use App\Http\Controllers\Api\Form;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('email/{token}/{info}', [EmailConfigController::class, 'index']);
Route::get('email/{token}/{nuevo_correo}/{info}', [EmailConfigController::class, 'email']);
Route::get('form/{token}', [Form::class, 'index']);
