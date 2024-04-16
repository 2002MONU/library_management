<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
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
//     return view('welcome');
// });
Route::get('/',[AdminController::class,'adminlogin'])->name('adminlogin');

Route::post('/adlogin',[AdminController::class,'loginadmin']);



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/dashboard', function () {
            return view('admin.auth.dashboard');
        });
        Route::get('/logout',[AdminController::class,'logout']);
        Route::get('/authordetails',[AuthorController::class,'authordetails']);
        Route::get('/addbook',[AuthorController::class,'addbook']); // add book form
        Route::get('/addauthor',[AuthorController::class,'addauthor']); // add Author form
        Route::get('/delete/{id}',[AuthorController::class,'delete']);
        Route::get('/update/{id}',[AuthorController::class,'update']);// admin Delete to author
         // admin Delete to author
    });
});
Route::post('/authorupdate/{id}',[AuthorController::class,'updateauthor']);// update books and author
Route::post('/addb', [AuthorController::class,'bookadd']); // add Book
Route::post('/author', [AuthorController::class,'authoradd']);//add Author 
Route::get('/authdata', [AuthorController::class,'authdata']);

//Route::get('search',[AuthorController::class,'liveSearch']);
//Route::get('/authorname',[AuthorController::class,'authorname']);