<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\featuresControllers\ATController;
use App\Http\Controllers\featuresControllers\DisciplineController;
use App\Http\Controllers\featuresControllers\EntretiensController;
use App\Http\Controllers\featuresControllers\EtrangerController;
use App\Http\Controllers\featuresControllers\JourneeSolidController;
use App\Http\Controllers\featuresControllers\MutuelleController;
use App\Http\Controllers\featuresControllers\PACController;
use App\Http\Controllers\featuresControllers\PrimeEvalController;
use App\Http\Controllers\featuresControllers\TANController;
use App\Http\Controllers\featuresControllers\TravailNuitController;
use App\Http\Controllers\featuresControllers\VMController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

/////DOC UI

Route::get('/test', function () {
    return view('dashboard.index');
});
Route::get('/ui-elements', function () {
    return view('dashboard.ui-elements');
});
Route::get('/tables', function () {
    return view('dashboard.tables');
});
Route::get('/forms', function () {
    return view('dashboard.forms');
});

////////////

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//////////////
Route::prefix('/PAC')->name('pac.')->group( function(){
    Route::get('/', [PACController::class, 'index'])->name('index');
    Route::get('/create', [PACController::class, 'create'])->name('create');
    Route::post('/save', [PACController::class, 'save'])->name('save');

    Route::get('/abscreate', [PACController::class, 'abscreate'])->name('abscreate');
    Route::post('/abssave', [PACController::class, 'abssave'])->name('abssave');

    Route::get('/contractcreate', [PACController::class, 'contractcreate'])->name('contractcreate');
    Route::post('/contractsave', [PACController::class, 'contractsave'])->name('contractsave');
});

Route::prefix('/AT')->name('at.')->group( function(){
    Route::get('/', [ATController::class, 'index'])->name('index');
});

Route::prefix('/disc')->name('disc.')->group( function(){
    Route::get('/', [DisciplineController::class, 'index'])->name('index');
    Route::get('/create', [DisciplineController::class, 'create'])->name('create');
    Route::post('/save', [DisciplineController::class, 'save'])->name('save');
});

Route::prefix('/pro')->name('pro.')->group( function(){
    Route::get('/', [EntretiensController::class, 'index'])->name('index');
});

Route::prefix('/etr')->name('etr.')->group( function(){
    Route::get('/', [EtrangerController::class, 'index'])->name('index');
});

Route::prefix('/js')->name('js.')->group( function(){
    Route::get('/', function () {
        return view('features.JourneeSolid.JourneeSolid');
    })->name('index');
});

Route::prefix('/mut')->name('mut.')->group( function(){
    Route::get('/', [MutuelleController::class, 'index'])->name('index');
});

Route::prefix('/tan')->name('tan.')->group( function(){
    Route::get('/', [TANController::class, 'index'])->name('index');
});

Route::prefix('/tn')->name('tn.')->group( function(){
    Route::get('/', [TravailNuitController::class, 'index'])->name('index');
});

Route::prefix('/vm')->name('vm.')->group( function(){
    Route::get('/', [VMController::class, 'index'])->name('index');
});

Route::prefix('/pe')->name('pe.')->group( function(){
    Route::get('/', function () {
        return view('features.PrimeEval.PrimeEval');
    })->name('index');
});
