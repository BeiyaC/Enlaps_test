<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;

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



Route::get('/', [HomeController::class, 'index']);

Route::resource('home', HomeController::class);
Route::resource('photos', PhotoController::class);
Route::resource('search',SearchController::class);

Route::get('generateJson',[PhotoController::class, 'generateJson'])->name('photos.generateJson');
Route::get('showData',[PhotoController::class, 'showData'])->name('photos.showData');
Route::post('addInput',[SearchController::class, 'addInput'])->name('search.addInput');
Route::post('showSequenceId', [SearchController::class, 'showSequenceId'])->name('search.showSequenceId');
Route::post('sortData', [SearchController::class, 'sortData'])->name('search.sortData');


