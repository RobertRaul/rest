<?php

use App\Http\Controllers\MesasReportesController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('menus','templates.menu.menu');
Route::view('mesas','templates.mesa.mesa');
Route::view('clientes','templates.cliente.cliente');
Route::view('camareros','templates.camarero.camarero');
Route::view('solicitud','templates.solicitud.solicitud');
Route::view('cobros','templates.cobros.cobros');



Route::get('pdfmesas', [MesasReportesController::class,'createPDF']);
