<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\IndexView;
use App\Http\Livewire\PersonaView;
use App\Http\Livewire\SolicitudEquipoView;
use App\Http\Livewire\SolicitudView;
use App\Http\Livewire\EquipoView;
use App\Http\Livewire\AsignacionEquipoView;
use App\Http\Livewire\SolicitudAlmacenView;
use App\Http\Livewire\AlmacenAdmin;
use App\Http\Livewire\PersonaAdmin;

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
    return redirect('login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

/* Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', IndexView::class)->name('dashboard');
    Route::get('/Persona', PersonaView::class)->name('Persona');
    Route::get('/PedidoEquipo', SolicitudEquipoView::class)->name('PedidoEquipo');
    Route::get('/Soporte', SolicitudView::class)->name('Soporte');
    Route::get('/Equipo', EquipoView::class)->name('Equipo');
    Route::get('/AsignacionEquipo', AsignacionEquipoView::class)->name('AsignacionEquipo');
    Route::get('/SolicitudAlmacen', SolicitudAlmacenView::class)->name('SolicitudAlmacen');
    Route::get('/Almacen', AlmacenAdmin::class)->name('Almacen');
    Route::get('/Administracion', PersonaAdmin::class)->name('Administracion');
});
 */
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/Administracion', PersonaAdmin::class)->name('Administracion')->middleware(['general']);

Route::middleware('almacen')->group(function () {
    
    Route::get('/Almacen', AlmacenAdmin::class)->name('Almacen');
});

Route::middleware('soporte')->group(function () {
    Route::get('/index', IndexView::class)->name('index');
    Route::get('/Persona', PersonaView::class)->name('Persona');
    Route::get('/PedidoEquipo', SolicitudEquipoView::class)->name('PedidoEquipo');
    Route::get('/Soporte', SolicitudView::class)->name('Soporte');
    Route::get('/Equipo', EquipoView::class)->name('Equipo');
    Route::get('/AsignacionEquipo', AsignacionEquipoView::class)->name('AsignacionEquipo');
    Route::get('/SolicitudAlmacen', SolicitudAlmacenView::class)->name('SolicitudAlmacen');
});

