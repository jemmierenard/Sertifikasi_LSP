<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [BooksController::class,'index'])->name('home');

// Define the route for the return action
Route::post('/borrowing/{id}/return', [BorrowingController::class, 'returnBook'])->name('borrowing.return');

Route::resource('borrowing',BorrowingController::class);

Route::resource('members',MemberController::class);

Route::resource('books', BooksController::class);