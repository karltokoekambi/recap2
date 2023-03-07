<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/AT', function () {
    return view('features.AT.AT');
});
Route::get('/DISC', function () {
    return view('features.Discipline.Discipline');
});
Route::get('/PRO', function () {
    return view('features.Entretiens.Entretiens');
});
Route::get('/ETR', function () {
    return view('features.Etranger.Etranger');
});
Route::get('/JS', function () {
    return view('features.JourneeSolid.JourneeSolid');
});
Route::get('/MUT', function () {
    return view('features.Mutuelle.Mutuelle');
});
Route::get('/TAN', function () {
    return view('features.TAN.TAN');
});
Route::get('/TN', function () {
    return view('features.TravailNuit.travailNuit');
});
Route::get('/VM', function () {
    return view('features.VM.VisiteMedic');
});
Route::get('/PE', function () {
    return view('features.PrimeEval.PrimeEval');
});
