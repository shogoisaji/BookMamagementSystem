<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'auth.login');

Route::get('/detail',  [\App\Http\Controllers\BookController::class, 'search'])
    ->name('auth.login');


Route::get('/search',  [\App\Http\Controllers\SearchController::class, 'search'])
    ->name('posts.search');

Route::get('/book.list',  [\App\Http\Controllers\StockBookController::class, 'list'])
    ->name('book.list');

Route::get('/book/{id}', [\App\Http\Controllers\StockBookController::class, 'detail'])->name('detail');

Route::get('/books.searchForm', [\App\Http\Controllers\BookController::class, 'searchForm'])->name('searchForm');

Route::post('/register-book', [\App\Http\Controllers\StockBookController::class, 'store'])->name('registrationBook');

Route::post('/books.searchForm', [\App\Http\Controllers\BookController::class, 'searchResult'])->name('searchResult');

Route::post('/books/{id}/rental', [\App\Http\Controllers\RentalBookController::class, 'rental'])->name('rental');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth.register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

// Route::get('/password/request', 'PasswordController@request')->name('password.request');

Route::get('/account', [\App\Http\Controllers\UserController::class, 'account'])->name('account');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
