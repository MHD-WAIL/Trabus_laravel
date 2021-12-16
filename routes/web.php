<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlueCardController;
use App\Http\Controllers\ElectronicCardController;
use App\Http\Controllers\IstanbulCardController;

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
    return view('dashboard');
});

Route::resource('cards', CardController::class);

Route::resource('blue', BlueCardController::class);
Route::get('blue', [BlueCardController::class, 'index']);
//Route::get('blue', [BlueCardController::class, 'calc']);
Route::post('blue', [BlueCardController::class, 'store']);
//Route::get('blue', function () {
//    return view('./cards/blue');
//});

Route::resource('istanbul', IstanbulCardController::class);
Route::get('istanbul', [IstanbulCardController::class, 'index']);
//Route::get('istanbul', function () {
//    return view('./cards/istanbul');
//});

Route::resource('electronic', ElectronicCardController::class);
Route::get('electronic', [ElectronicCardController::class, 'index']);
//Route::get('electronic', function () {
//    return view('./cards/electronic');
//});

//Route::get('cards-all', [CardController::class, 'all']);

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::post('ist-withdraw', [IstanbulCardController::class, 'cut_ist_amount']);
Route::post('blue-withdraw', [BlueCardController::class, 'cut_amount']);
Route::post('el-withdraw', [ElectronicCardController::class, 'cut_el_amount']);
