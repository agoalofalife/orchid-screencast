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

Route::get('/', function () {
    $notification = new \App\Notifications\NewsForOperator('Новый оператор в штат', 'Мы наняли нового оператора!');
//    \App\Models\User::find(4)->notify($notification);
//    $users = \Orchid\Platform\Models\Role::find(3)->getUsers();
//    \Illuminate\Support\Facades\Notification::send($users, $notification);
    return view('welcome');
});
