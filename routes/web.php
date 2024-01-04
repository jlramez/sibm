<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth/login');
});
Auth::routes(["register" => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('generate-pdf/{id}', [App\Http\Controllers\PDFController::class, 'generatePDF'])->name('pdf.reporte');

//Route Hooks - Do not delete//
	Route::view('claves', 'livewire.claves.index')->middleware('auth');
	Route::view('fuentes', 'livewire.fuentes.index')->middleware('auth');
	Route::view('clave', 'livewire.clave.index')->middleware('auth');
	Route::view('cuentas', 'livewire.cuentas.index')->middleware('auth');
	Route::view('inventarios', 'livewire.inventarios.index')->middleware('auth');
	Route::view('bancos', 'livewire.bancos.index')->middleware('auth');
	Route::view('empleados', 'livewire.empleados.index')->middleware('auth');