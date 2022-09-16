<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ObrasController;
use App\Http\Controllers\UbicacionesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportFilesController;
use App\Http\Controllers\BeneficiadosDirectosController;
use App\Http\Controllers\FormatosDocsController;

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

    // Route Admin Dashboard
    Route::group([ 'prefix' => 'admin'], function(){

        Route::get('/', function (){
            return Inertia::render('AdminDashboard');
        })->name('admin');

        Route::get('/users', [UserController::class, 'getUsers']);

    });

    // Root route, starting page
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
        Route::post('/update', [ObrasController::class, 'updateObra']);
        
        // Archivos PDF
        Route::get('/pdf/{obra_id?}', [ObrasController::class, 'makePdf'])->name('makePdf');
        Route::get('/csv/{obra_id?}', [ExportFilesController::class, 'exportZipFiles'])->name('makeCSVZip');
        Route::get('/pdf/inicio/{obra_id}/{paraje?}', [ObrasController::class, 'makePdfInicio'])->name('makePdf_inicio');
        Route::get('/pdf/fin/{obra_id?}/{paraje?}', [ObrasController::class, 'makePdfFin'])->name('makePdf_termino');
        Route::get('/pdf/convenio/{obra_id?}/{payload?}', [ObrasController::class, 'makePdfConvenio'])->name('makePdf_convenio');

        // Beneficiados Directos
        Route::get('/beneficiadosdirectos/{obra_id}', [BeneficiadosDirectosController::class, 'getBeneficiadosDirectosForObra']);
        Route::get('/beneficiadosdirectos/add', [BeneficiadosDirectosController::class, 'addBeneficiadoDirectoForObra']);

        // Logs de obras
        Route::post('/logs/new', [ObrasController::class, 'newLog']);
        Route::get('/logs/get/{obra_id}', [ObrasController::class, 'getLogs']);
        Route::delete('/logs/drop/{log_id}', [ObrasController::class, 'dropLog']);

    });
    // Formatos
    Route::get('/formatos', [FormatosDocsController::class, 'getAllFormats']);
    Route::post('/formatos/new', [FormatosDocsController::class, 'storeFormat']);

    Route::post('/cuencatributaria/nueva', [ObrasController::class, 'nuevaCuencaTributaria']);


});

require __DIR__.'/auth.php';
