<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\inicio;
use App\Http\Livewire\chat;
use App\Http\Livewire\ConsejosEmocionalesCreate;
use App\Http\Livewire\Ayuda;
use App\Http\Livewire\BrindarAyuda;


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
Route::get("/consejos",ConsejosEmocionalesCreate::class);
Route::get("/ayuda",Ayuda::class);
Route::get("/brindar",BrindarAyuda::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/chat',chat::class);
    Route::get('/dashboard', inicio::class)->name('dashboard');
});
