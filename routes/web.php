<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Template\Email\Create;
use App\Http\Controllers\Api\NotifyController;
use App\Http\Controllers\Template\Profile\MyprofileController;
use App\Http\Controllers\Form\CreateForm;
use App\Http\Controllers\Form\MyForm;
use App\Http\Controllers\Form\Messages;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web"     group. Now create something great!
|
*/

Route::get('/', function () {
    return view('public.home');
})->name('inicio');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/new-api', [Create::class, 'index'])->name('create-api');
    Route::post('/new-api', [Create::class, 'api_smtp'])->name('send_data_smtp');
    Route::get('/api-email', [Create::class, 'my_api'])->name('view_data_email');
    Route::post('/api-email', [Create::class, 'add_email'])->name('send_email_data');
    Route::get('api/notify', [NotifyController::class, 'index']);
    Route::get('api/notify/clear', [NotifyController::class, 'clear_notify']);
    Route::get('profile', [MyprofileController::class, 'index'])->name('mi-profile');
    Route::post('profile/update/user', [MyprofileController::class, 'update_user'])->name('update_user');
    Route::get('profile/delete/avatar', [MyprofileController::class, 'delete_image_profile'])->name('delete_profile');
    Route::post('profile/update/notify', [MyprofileController::class, 'update_notify_email'])->name('update_notify');
    Route::post('profile/update/password', [MyprofileController::class, 'update_change_password'])->name('update_password');
    Route::get('form/create', [CreateForm::class, 'index'])->name('create_form');
    Route::get('form/myform', [MyForm::class, 'index'])->name('my_form');
    Route::get('form/myform/{id}', [MyForm::class, 'individual'])->name('form_indivudual');
    Route::post('form/myform/{id}/updated', [MyForm::class, 'individual_update'])->name('update_form');
    Route::post('form/myform/delete/{id}', [MyForm::class, 'delete_individual'])->name('form_indivudual_delete');
    Route::post('form/create/insert', [CreateForm::class, 'send_data'])->name('create_form_post');
    Route::get('form/messages', [Messages::class, 'index'])->name('view_messages_post');
    Route::get('form/messages/{id}', [Messages::class, 'individual'])->name('view_individual_post');

});

