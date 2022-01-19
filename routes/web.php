<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FrontController;
use App\Http\Livewire\Admin\JudgesComponent;
use App\Http\Livewire\Admin\SubmissionsList;
use App\Http\Livewire\Admin\SponsorsComponent;

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

Route::middleware('visitor')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('welcome');
    Route::get('/about', [FrontController::class, 'about'])->name('about');
    Route::get('/preview-submission/{entry}', [FrontController::class, 'previewEntry'])
        ->name('preview.entry')
        ->middleware('signed');


    Route::view('/creative-writing-workshop-101', 'creative-writing')->name('creative-writing');

    // TODO: News
    Route::resource('/news', NewsController::class);

    Route::permanentRedirect('apply', '/#entry-form')->name('apply');
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/judges', JudgesComponent::class)->name('judges.index');
        Route::get('/sponsors', SponsorsComponent::class)->name('sponsors.index');
        Route::get('/submissions', SubmissionsList::class)->name('submissions.index');
    }
);

require __DIR__ . '/auth.php';
