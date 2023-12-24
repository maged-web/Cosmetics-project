<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


Route::middleware(['check_block_status'])->group(function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});




Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('index');
Route::post('/admin/blockuser/{id}', [App\Http\Controllers\UserController::class, 'blockUser'])->name('user.block');
Route::post('/admin/unblockuser/{id}', [App\Http\Controllers\UserController::class, 'unBlockUser'])->name('user.unblock');

Route::get('/createRequest', [App\Http\Controllers\RequestController::class, 'createRequest'])->name('request.create');

Route::post('/sendRequest', [App\Http\Controllers\RequestController::class, 'sendRequest'])->name('request.send');

Route::get('/showRequest/{id}', [App\Http\Controllers\RequestController::class, 'showRequest'])->name('request.show');

Route::get('/markAsRead', [App\Http\Controllers\RequestController::class, 'markAsRead'])->name('request.markAsRead');


Route::get('/messages/center', [App\Http\Controllers\MessageController::class, 'messagesCenter'])->name('messages');


Route::post('/messages/center/send', [App\Http\Controllers\MessageController::class, 'sendMessage'])->name('messages.send');

Route::get('/admin/messages/center', [App\Http\Controllers\MessageController::class, 'messagesCenterAdmin'])->name('messages.admin');

Route::get('/admin/messages/center/{userId}', [App\Http\Controllers\MessageController::class, 'showConversation'])->name('messages.conversation');

Route::post('/admin/messages/center/reply/{userId}', [App\Http\Controllers\MessageController::class, 'sendReply'])->name('messages.reply');
Route::delete('/admin/messages/center/reply/delete/{msgID}', [App\Http\Controllers\MessageController::class, 'deletaAdminMessage'])->name('messages.admin.delete');
Route::delete('/messages/center/send/delete/{msgID}', [App\Http\Controllers\MessageController::class, 'deletaAdminMessage'])->name('messages.delete');
Route::get('/messages/center/edit/{msgID}', [App\Http\Controllers\MessageController::class, 'editMessage'])->name('messages.edit');
Route::post('/messages/center/edit/send/{msgID}', [App\Http\Controllers\MessageController::class, 'editMessageSend'])->name('messages.edit.send');
