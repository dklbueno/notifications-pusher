<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PushNotificationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    $user = '321321321';
    $from_app = 'CRM';
    $message = 'Mensagem teste CRM';
    $link = 'https://www.google.com';
    event(new App\Events\PusherBroadcast($user, $from_app, $message, $link));
    return "Event has been sent!";
});

Route::get('notification', [PushNotificationController::class, 'index']);
Route::post('notification', [PushNotificationController::class, 'sendNotification'])->name('notification');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
