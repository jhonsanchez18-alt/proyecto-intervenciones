<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ActivoController;
use App\Http\Controllers\Admin\IntervencionController;
use App\Http\Controllers\Admin\EstadoController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\Admin\RepuestoController;
use App\Http\Controllers\Admin\ResponsableController;
use App\Http\Controllers\Admin\SeccionController;
use App\Http\Controllers\Admin\TecnicoController;
use App\Http\Controllers\Admin\TipoController;
use App\Http\Controllers\Admin\UbicacionController;
use App\Http\Controllers\Admin\IntenCotroller;
use App\Http\Controllers\admin\ItenControllerController;
use App\Http\Controllers\admin\ItensController;
use App\Http\Controllers\Admin\UserController;


Route::get('/', [HomeController::class,'index'])->name('admin.home')->middleware('auth');

Route::resource('user', UserController::class)->names('admin.users')->middleware('auth');


Route::resource('/admin/categorias', CategoriaController::class)->names('admin.categorias')->middleware('auth');    
Route::resource('/admin/activos', ActivoController::class)->names('admin.activos')->middleware('auth');
Route::resource('/admin/intervenciones', IntervencionController::class)->names('admin.intervenciones')->middleware('auth');
//Ruta anidada
Route::resource('admin/activos.intervenciones',IntervencionController::class)->names('admin.activos.intervenciones')->middleware('auth');
Route::resource('/admin/estados', EstadoController::class)->names('admin.estados')->middleware('auth');
Route::resource('/admin/marcas', MarcaController::class)->names('admin.marcas')->middleware('auth');
Route::resource('/admin/repuestos', RepuestoController::class)->names('admin.repuestos')->middleware('auth');
Route::resource('/admin/responsables', ResponsableController::class)->names('admin.responsables')->middleware('auth');
Route::resource('/admin/secciones', SeccionController::class)->names('admin.secciones')->middleware('auth');
Route::resource('/admin/ubicaciones', UbicacionController::class)->names('admin.ubicaciones')->middleware('auth');
Route::resource('/admin/tecnicos', TecnicoController::class)->names('admin.tecnicos')->middleware('auth');
Route::resource('/admin/tipos', TipoController::class)->names('admin.tipos')->middleware('auth');
Route::resource('/admin/itens', ItensController::class)->names('admin.itens')->middleware('auth');
