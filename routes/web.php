<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('pages.dashboard');
});


Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/live', [AdminController::class, 'live'])->name('live');

});    

Route::get('/index', function () {
    return view('pages.index');
});