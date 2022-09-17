<?php

use App\Http\Controllers\ImageResizeController;
use App\Http\Controllers\ModelTest;
use App\Http\Controllers\MovieSearchController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Mail\ArzSendMail;
use App\Models\ModelA;
use App\Models\ModelB;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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
//  return view('welcome');
// });
Route::get('/te',function(){

        // dd(ModelB::find(1)->modelA);
});
Route::get('/', function () {
        return view('userCreate');
});
Route::post('create', ModelTest::class);
Route::get('test', MovieSearchController::class);
