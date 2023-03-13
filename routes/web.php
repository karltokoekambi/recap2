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

Route::get('/PAC', function () {
    return view('features.PAC.index');
});
Route::get('/AT', [ATController::class, 'indexAT']);

Route::get('/DISC', function () {
    return view('features.Discipline.Discipline');
});
Route::get('/PRO', [EntretiensController::class, 'indexEntretiens']);

Route::get('/ETR', [EtrangerController::class, 'indexEtranger']);

Route::get('/JS', function () {
    return view('features.JourneeSolid.JourneeSolid');
});
Route::get('/MUT', [MutuelleController::class, 'indexMutuelle']);

Route::get('/TAN', [TANController::class, 'indexTAN']);

Route::get('/TN', [TravailNuitController::class, 'indexTN']);

Route::get('/VM', [VMController::class, 'indexVM']);

Route::get('/PE', function () {
    return view('features.PrimeEval.PrimeEval');
});
