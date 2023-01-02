<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\Auth\ChangePasswordController;

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

Auth::routes(['register'=>false]);

Route::middleware(['auth','PreventBackHistory'])->group(function () { 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::get('/points/all', [App\Http\Controllers\PointController::class, 'all'])->name('points.all');
Route::get('/points/old', [App\Http\Controllers\PointController::class, 'old'])->name('points.old');
Route::resource('points', PointController::class);


Route::get('/users/suspend/{id}',[userController::class,'suspend'])->name('users.suspend'); 
Route::get('/users/suspendusers/',[userController::class,'suspendusers'])->name('users.suspendusers'); 
Route::get('/users/activate/{id}',[userController::class,'activate'])->name('users.activate'); 
Route::get('/users/resetpass/{id}',[userController::class,'resetpass'])->name('users.resetpass'); 

Route::resource('users', userController::class);


 Route::prefix('mainatin')->group(function () {
    Route::resource('roles', RoleController::class);
    
   });


Route::get('/home/profile',[HomeController::class,'profile'])->name('profile');
Route::post('/change-password', [ChangePasswordController::class,'store'])->name('change.password');

}); 

