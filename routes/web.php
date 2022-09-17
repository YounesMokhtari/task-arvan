<?php

use App\Http\Controllers\ImageResizeController;
use App\Http\Controllers\MovieSearchController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Mail\ArzSendMail;
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

Route::get('/', function (ImageResizeController $arzProcess) {
        echo 'proceesing';
   return  $arzProcess->processArz();
//    return  $arzProcess->getArz();
});
Route::get('test',MovieSearchController::class);
