<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\expoController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\editionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
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

Route::get('/', [indexController::class, 'index']);


Route::get('/exposants', [expoController::class, 'index']);


Route::get('/exposants/demande', [expoController::class, 'ask']);
Route::post('/exposants/demande', [expoController::class, 'store']);

Route::get('/about', [aboutController::class, 'index']);


Route::get('/editions_precedents', [editionsController::class, 'index']);


Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);

Route::get('/buy', [ShopController::class, 'buy']);
Route::post('/buy', [ShopController::class, 'pay']);


Route::post('/send_tikets', [ShopController::class, 'send_tikets']);


Route::get('/createSymLink', function(){
    Artisan::call('storage:link', []);
    return 'success';
});


Route::get('foo', function(){
    $targetFolder = '/home/celinec/www/mdg/storage/app/public';
    $linkFolder = '/home/celinec/www/mdg/public/storage';
    symlink($targetFolder, $linkFolder);
    return 'success';
});