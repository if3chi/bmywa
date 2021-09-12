<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FrontController;
use App\Http\Livewire\Admin\JudgeComponent;
use App\Http\Livewire\Admin\SubmissionsList;
use App\Http\Livewire\Admin\SponsorComponent;

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

Route::get('migrate_db', function () {
    Artisan::call('migrate:fresh --seed');
    return 'Done';
});

Route::get('/', [FrontController::class, 'index'])->name('welcome');
Route::view('/about', 'about')->name('about');

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/judges', JudgeComponent::class)->name('judges.index');
        Route::get('/sponsors', SponsorComponent::class)->name('sponsors.index');
        Route::get('/submissions', SubmissionsList::class)->name('submissions.index');
    }
);

require __DIR__ . '/auth.php';

Route::get('setup_fresh', function () {
    Artisan::call('migrate:fresh --seed');
    Artisan::call('storage:link');
    return 'Done';
});
