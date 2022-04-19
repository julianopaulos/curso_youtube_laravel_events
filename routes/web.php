<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show'])->where('id', '[0-9]+');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->where('id', '[0-9]+')->middleware('auth');
Route::get('/events/create', [EventController::class, 'create'])->where('id', '[0-9]+')->middleware('auth');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->where('id', '[0-9]+')->middleware('auth');
Route::post('/events', [EventController::class, 'store'])->where('id', '[0-9]+')->middleware('auth');
Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->where('id', '[0-9]+')->middleware('auth');
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->where('id', '[0-9]+')->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->where('id', '[0-9]+')->middleware('auth');

#Route::get('/products/{id}', [ProductController::class, 'getProduct'])->where('id', '[0-9]+');

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

#deletada rota criada pelo jetstream
/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/