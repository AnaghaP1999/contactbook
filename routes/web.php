<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('add-contact', [HomeController::class, 'addContact'])->name('add-contact');
Route::post('save-contact', [HomeController::class, 'saveContact'])->name('save-contact');
Route::get('view-contact/{id}', [HomeController::class, 'viewContact'])->name('view-contact');
Route::get('edit-contact/{id}', [HomeController::class, 'editContact'])->name('edit-contact');
Route::get('delete-contact/{id}', [HomeController::class, 'deleteContact'])->name('delete-contact');