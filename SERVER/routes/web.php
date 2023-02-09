<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\client;

use App\Http\Controllers\Api\V1\empapi;







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


Route::get('/user',[UserController::class,"index"]);




Route::get('/',[client::class,"index"]);




Route::get("/info",[client::class,"info"]);


Route::get("/count",[empapi::class,"count"]);
Route::get("/download",[empapi::class,"download"]);
Route::get("/file",[empapi::class,"render"]);






