<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MachineryController;
use App\Http\Controllers\MachineNameController;
use App\Http\Controllers\MachinModelController;
use App\Http\Controllers\ManufactureController; 
use App\Http\Controllers\MachineCategoryController;
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
 
Route::resource('machinery', MachineryController::class);

Route::get('machinename/items',[MachineNameController::class,'getItems'])->name('getItems');

    Route::prefix('settings')->group(function () {
        Route::resource('locations', LocationController::class);
        Route::resource('categories', MachineCategoryController::class);
        Route::resource('models', MachinModelController::class);
        Route::resource('manufactures', ManufactureController::class);
        Route::resource('machinename', MachineNameController::class);
    });

 Route::prefix('mainatin')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', userController::class);
   });


Route::get('/home/profile',[HomeController::class,'profile'])->name('profile');
Route::post('/change-password', [ChangePasswordController::class,'store'])->name('change.password');

}); 

