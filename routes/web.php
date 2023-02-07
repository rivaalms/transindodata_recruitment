<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

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

Route::get('/login', function() {
    return view('login');
})->middleware('guest')->name('login');

Route::get('/register', function() {
    return view('register');
})->middleware('guest');

Route::post('/login', [UserController::class, 'auth']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/', function () {
    return view('index');
});

Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth');
Route::post('/tickets', [TicketController::class, 'checkout']);
Route::get('/payment', [CartController::class, 'payment']);
Route::post('/payment', [CartController::class, 'purchase']);
Route::get('/mytickets', [UserController::class, 'mytickets']);

Route::get('/admin', function() {
    return redirect('dashboard');
});
Route::get('/admin/dashboard', [TicketController::class, 'tickets'])->name('dashboard');
Route::get('/admin/checkins', [TicketController::class, 'checkins']);
Route::post('/admin/checkins', [TicketController::class, 'inputbooking']);
Route::get('/admin/ticket/{ticket}/edit', [TicketController::class, 'edit']);
Route::post('/admin/ticket/{ticket}/edit', [TicketController::class, 'update']);
Route::post('/admin/ticket/{ticket}/delete', [TicketController::class, 'delete']);
