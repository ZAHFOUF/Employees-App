<?php

use App\Http\Controllers\Books;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Broadcast;
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
    return ['Laravel' => app()->version()];
});



Route::prefix('testing')->group(function () {

    Route::get('/',  [Books::class,"Getdata"])->name("testing")->middleware("track") ;
    Route::get('/ai',  [Books::class,"Aidata"])->name("testingai")->middleware("track") ;
    Route::get('/scap',  [Books::class,"Aireq"])->name("testingai2")->middleware("track") ;



});




Route::post('/testing/add',  [Books::class,"Adddata"]);
Route::post('/testing/update',  [Books::class,"Updata"]);

Route::get("/learn/{any}",function ($any) {

    if ($any === '1') {
        return ['You looking for' => $any] ;
    }else{
        return redirect()->route("testingai2");
    }



})->where('any','[0-9]+');

// prefix

Route::prefix('admin')->group(function () {
    Route::get('/home', function () {
         return ['message' => 'users'];
    });
});




/*  Posts Routes */

Route::get("/posts/search/{title}",[PostsController::class,'search'])->middleware("auth");

Route::get("/query",[PostsController::class,"query"]);


Route::resource("posts",PostsController::class)->middleware('auth');
Route::get('/myposts', [PostsController::class, 'mine'])->name('posts.mine')->middleware('auth');

Route::post('/myposts', [PostsController::class, 'ireadnot'])->name('posts.ireadnot')->middleware('auth');



Route::get('/refresh-database', function () {
    Artisan::call('migrate:fresh --seed');
    return response('Database refreshed and seeded successfully');
})->middleware('auth');


require __DIR__.'/auth.php';

 Auth::routes();
 Broadcast::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


