<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\GigListController;
use App\http\Controllers\UserManagmentController;

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

//Home Managment Systeam
Route::get('/',[HomeController::class,'home']);

Route::get('/viewGigs/{id}',[HomeController::class,'ViewGigs']);
Route::get('/search',[HomeController::class,'search']);

Route::get('/create',[GigListController::class,'CrateGigs'])->middleware('loginCheck');
Route::post('/store',[GigListController::class,'Store'])->middleware('loginCheck');


//user login & register
Route::get('/register',[UserManagmentController::class,'index']);
Route::post('/registration',[UserManagmentController::class,'registration']);
Route::get('/login',[UserManagmentController::class,'login']);
Route::post('/userAuth',[UserManagmentController::class,'userAuth']);

Route::get('/logOUt',[UserManagmentController::class,'logOUt']);


Route::get('/manage',[HomeController::class,'Manage'])->middleware('loginCheck');
Route::post('/delete/{id}',[HomeController::class,'DeleteGig'])->middleware('loginCheck');
Route::get('/ViewGig/{id}',[HomeController::class,'EditGigView'])->middleware('loginCheck');
Route::post('/update/{id}',[HomeController::class,'Update'])->middleware('loginCheck');
