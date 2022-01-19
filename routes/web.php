<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ObrasController;
use App\Http\Controllers\UbicacionesController;

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


// All routes require auth
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return Inertia::render('Dashboard');
    });
    
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Ubicaciones
    Route::group([ 'prefix' => 'ubicaciones'], function(){
        
        Route::get('/estados', [UbicacionesController::class, 'getEstados']);
        Route::get('/municipios/{edo_id}', [UbicacionesController::class, 'getMunicipiosFromEdo']);
        Route::get('/localidades/{mun_id}', [UbicacionesController::class, 'getLocalidadesFromMun']);

        Route::post('/nuevo/estado', [UbicacionesController::class, 'nuevoEstado']);
        Route::post('/nuevo/municipio', [UbicacionesController::class, 'nuevoMunicipio']);
        Route::post('/nuevo/localidad', [UbicacionesController::class, 'nuevaLocalidad']);

        Route::get('/localidad/{localidad_id}', [UbicacionesController::class, 'getClaveLocalidad']);

    });

    // Estados
    
    // Obras
    Route::group([ 'prefix' => 'obras'], function(){
        Route::get('/all', [ObrasController::class, 'getAll']);
        
        Route::get('/new', function(){
            return Inertia::render('Obras/NuevaObra');
        })->name('newObra');
        
        Route::post('/store',[ObrasController::class, 'store']);

        Route::get('/ctributaria/{localidad_id}', [ObrasController::class, 'getCuencaTributaria']);

        Route::get('/categorias', [ObrasController::class, 'getCategoriasObra']);
        Route::get('/tipos', [ObrasController::class, 'getTiposObra']);
        Route::get('/tipos/nuevo/{tipo_obra}', [ObrasController::class, 'nuevoTipoObra']);

        Route::get('/registros', [ObrasController::class, 'getObrasRegistros']);

        Route::get('/count/categories', [ObrasController::class, 'countCategories']);
        Route::get('/count/tipos', [ObrasController::class, 'countTipos']);

        Route::get('/edit', [ObrasController::class, 'editObra']);
        Route::get('/edit/costos/{obra_id}', [ObrasController::class, 'getCostosByObra']);
        Route::get('/edit/comite/{obra_id}', [ObrasController::class, 'getcomiteByObra']);


        Route::get('/getfuentesf', [ObrasController::class, 'getFuentesF']);
        Route::get('/getconceptos', [ObrasController::class, 'getConceptosObra']);
    });

    Route::post('/cuencatributaria/nueva', [ObrasController::class, 'nuevaCuencaTributaria']);


});

require __DIR__.'/auth.php';
