<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\IntervencionController;

use Illuminate\Support\Facades\Mail;
use App\Mail\IntervencionCreadaMail;



//Route::get('/', function () {
    //return view('welcome');
//});
//Route::get('/', [ActivoController::class, 'index'])->name('activos.index')->middleware('auth');

Route::get('activos/{activo}', [ActivoController::class, 'show'])->name('activos.show');
Route::get('intervenciones/{intervencion}', [IntervencionController::class, 'show'])->name('intervenciones.show');
Route::get('categoria/{categoria}', [ActivoController::class, 'categoria'])->name('activos.categoria');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
