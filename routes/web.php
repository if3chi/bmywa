<?php

use App\Http\Controllers\FrontController;
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

Route::get('/', [FrontController::class, 'index'])->name('welcome');
Route::view('/about', 'about')->name('about');

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/judges', function(){
            return view('admin.judges');
        })->name('judges.index');
    }
);

require __DIR__.'/auth.php';
