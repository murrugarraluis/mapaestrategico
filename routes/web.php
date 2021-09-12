<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/procesos', function () {
    return view('mantainers.process');
})->name('process');
Route::middleware(['auth:sanctum', 'verified'])->get('/indicadores/{id}', function ($id) {
    return view('mantainers.indicator',['id'=>$id]);
})->name('indicator');
Route::middleware(['auth:sanctum', 'verified'])->get('/mapa-estrategico/{id}', function ($id) {
    return view('mantainers.strategic-map',['id'=>$id]);
})->name('strategic-map');
