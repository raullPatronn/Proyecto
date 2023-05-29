<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registroAsignacionController;
use App\Http\Livewire\inicio;
use App\Http\Livewire\chat;
use App\Http\Livewire\ConsejosEmocionalesCreate;
use App\Http\Livewire\Ayuda;
use App\Http\Livewire\BrindarAyuda;
use App\Http\Livewire\MisConsejos;
use App\Http\Livewire\AsignacionRoles;
use App\Http\Livewire\RolSolicitud;
use App\Http\Livewire\CambiarRol;
use App\Http\Livewire\Personalidades;

Route::get('/chat', Chat::class)->name('chat.index');
Route::post('/chat/send', [Chat::class, 'sendMessage'])->name('chat.send');
//Route::get('/chatadmin', VistaChat::class);

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
Route::get("/rol-ayuda",CambiarRol::class);
Route::get("/Person",Personalidades::class);
Route::get("/rol-solicitud",RolSolicitud::class);
Route::get("/consejos",ConsejosEmocionalesCreate::class);
Route::get("/ayuda",Ayuda::class);
Route::get("/brindar",BrindarAyuda::class);
Route::get("/mis-consejos",MisConsejos::class);
Route::get("/roles",AsignacionRoles::class);


Route::get('/', function () {
    return view('welcome');
});
Route::get('/saludo', function () {
    return view('saludo');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', inicio::class)->name('dashboard');

});
