<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BimbelController;
use App\Models\Bimbel;
use Illuminate\Support\Facades\Storage;

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

    $bimbels = Bimbel::all();
    return view('index', compact('bimbels'));
})->name('index');

Route::get('/bimbel', [BimbelController::class, 'create'])->name('create');
Route::post('/bimbel', [BimbelController::class, 'store'])->name('store');
Route::get('/download_tugas/{bimbel}', function (Bimbel $bimbel) {
    return Storage::download($bimbel->tugas);
})->name('download_tugas');
Route::get('/bimbel/{bimbel}', [BimbelController::class, 'edit'])->name('edit');
Route::delete('/bimbel/{bimbel}', [BimbelController::class, 'destroy'])->name('destroy');
Route::put('/bimbel/{bimbel}', [BimbelController::class, 'update'])->name('update');
