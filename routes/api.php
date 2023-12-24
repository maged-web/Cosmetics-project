<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */

 Route::middleware(['check_block_status'])->group(function()
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});




Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'showAllCustomers'])->name('index');

Route::post('/admin/blockuser/{id}', [App\Http\Controllers\UserController::class, 'blockUser'])->name('user.block');

Route::post('/admin/unblockuser/{id}', [App\Http\Controllers\UserController::class, 'unBlockUser'])->name('user.unblock');



/* Route::get('/createRequest', [App\Http\Controllers\RequestController::class, 'createRequest'])->name('request.create');
 */


Route::post('/sendRequest', [App\Http\Controllers\RequestController::class, 'sendRequest'])->name('request.send');

Route::get('admin/showAllNotification', [App\Http\Controllers\RequestController::class, 'showAllNotification'])->name('notifications.show');

Route::get('admin/showNotification/{id}', [App\Http\Controllers\RequestController::class, 'showNotification'])->name('notification.show');

Route::post('admin/markAsRead', [App\Http\Controllers\RequestController::class, 'markAsRead'])->name('request.markAsRead');



Route::get('/messages/center', [App\Http\Controllers\MessageController::class, 'messagesCenter'])->name('messages');

Route::post('/messages/center/send', [App\Http\Controllers\MessageController::class, 'sendMessageByuser'])->name('messages.send');

Route::get('/admin/messages/center', [App\Http\Controllers\MessageController::class, 'adminMessagesCenter'])->name('messages.admin');

Route::get('/admin/messages/center/{userId}', [App\Http\Controllers\MessageController::class, 'showConversation'])->name('messages.conversation');

Route::post('/admin/messages/center/{userId}', [App\Http\Controllers\MessageController::class, 'sendReply'])->name('messages.reply');

Route::delete('/messages/center/delete/{msgID}', [App\Http\Controllers\MessageController::class, 'deleteMessage'])->name('messages.admin.delete');

Route::delete('/messages/center/delete/{msgID}', [App\Http\Controllers\MessageController::class, 'deleteMessage'])->name('messages.delete');

/* Route::get('/messages/center/update/{msgID}', [App\Http\Controllers\MessageController::class, 'editMessage'])->name('messages.update');
 */

Route::post('/messages/center/update/send/{msgID}', [App\Http\Controllers\MessageController::class, 'editMessageSend'])->name('messages.update.send');


Route::post('admin/messages/center/sendPhoto/{id}', [App\Http\Controllers\MessageController::class, 'sendPhotoByAdmin'])->name('admin.messages.center.send.Photo');

Route::post('/messages/center/sendPhoto/', [App\Http\Controllers\MessageController::class, 'sendPhotoByUser'])->name('messages.center.send.Photo');

Route::post('admin/messages/center/sendVoice/{id}', [App\Http\Controllers\MessageController::class, 'sendVoiceByAdmin'])->name('admin.messages.center.send.voice');

Route::post('/messages/center/sendVoice/', [App\Http\Controllers\MessageController::class, 'sendVoiceByUser'])->name('messages.center.send.voice');
