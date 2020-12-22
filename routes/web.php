<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\MedicController;
use App\Http\Controllers\CeoController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Models\User;

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
    return view('home');
})->name('home');

Route::get('/asktoverify', function () {
    return view('doctor.asktoverify');
})->name('asktoverify');

Route::get('/index',[UserController::class,'index'])->name('admin.index');

Route::get('/hospitals',[UserController::class,'hospitals'])->name('hospitals');

Route::group(['prefix'=>'patient'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/info/{patient}', [PatientController::class, 'index'])->name('patient.index');   //OK

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create', [PatientController::class, 'create'])->name('patient.create');   //OK

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store', [PatientController::class, 'store'])->name('patient.store');   //OK

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/edit/{patient}', [PatientController::class, 'edit'])->name('patient.edit');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{patient}', [PatientController::class, 'update'])->name('patient.update');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/destroy/{patient}', [PatientController::class, 'destroy'])->name('patient.destroy');
});


Route::group(['prefix'=>'medic'], function () {
    
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/', [MedicController::class, 'index'])->name('medic.index');   //OK
    
    Route::middleware(['auth:sanctum', 'verified'])->
    post('/verify', [MedicController::class, 'verify'])->name('medic.verifymedic');
    
    //Route::middleware(['auth:sanctum', 'verified'])->
    //get('/edit', [MedicController::class, 'edit'])->name('medic.edit');
    
    //Route::middleware(['auth:sanctum', 'verified'])->
    //post('/update', [MedicController::class, 'update'])->name('medic.update');
    
    //Route::middleware(['auth:sanctum', 'verified'])->
    //get('/destroy', [MedicController::class, 'destroy'])->name('medic.destroy');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix'=>'ceo'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/', [CeoController::class, 'index'])->name('ceo.index');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create', [CeoController::class, 'create'])->name('ceo.create');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/inactivedoctors', [CeoController::class, 'inactivedoctors'])->name('ceo.inactivedoctors');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store', [CeoController::class, 'store'])->name('ceo.store');
});


Route::group(['prefix'=>'health'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/info/{patient}', [HealthController::class, 'index'])->name('health.index');   

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create/{patient}', [HealthController::class, 'create'])->name('health.create');   //OK

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store', [HealthController::class, 'store'])->name('health.store');   

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/edit/{health}', [HealthController::class, 'edit'])->name('health.edit');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{health}', [HealthController::class, 'update'])->name('health.update');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/destroy/{health}', [HealthController::class, 'destroy'])->name('health.destroy');
});