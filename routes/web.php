<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FrontController;
use App\Http\Livewire\Front\CreateUserAccountComponent;
use App\Http\Livewire\Admin\{
    Dashboard,
    EmailComponent,
    GalleryManager,
    UsersComponent,
    JudgesComponent,
    SubmissionsList,
    SponsorsComponent,
    ShortListComponent
};

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
    Route::controller(FrontController::class)
        ->group(function () {
            Route::get('/', 'index')->name('welcome');
            Route::get('/about', 'about')->name('about');
            Route::get('/our-gallery', 'gallery')->name('gallery');
            Route::get('/preview-submission/{entry}', 'previewEntry')
                ->name('preview.entry')
                ->middleware('signed');
        });

    Route::get('/create-your-account/{tempUser}', CreateUserAccountComponent::class)
        ->name('create.account')->middleware('signed');

    Route::view('/creative-writing-workshop-101', 'creative-writing')->name('creative-writing');

    // TODO: News
    Route::resource('/news', NewsController::class);

    Route::permanentRedirect('apply', '/#entry-form')->name('apply');
    Route::view('/terms', 'terms')->name('terms');
    Route::view('/events', 'events')->name('events');
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/manage-gallery', GalleryManager::class)->name('gallery.index');
        Route::get('/judges', JudgesComponent::class)->name('judges.index');
        Route::get('/sponsors', SponsorsComponent::class)->name('sponsors.index');
        Route::get('/submissions', SubmissionsList::class)->name('submissions.index');
        Route::get('/users', UsersComponent::class)->name('users.index');
        Route::get('/send-mail', EmailComponent::class)->name('mail.compose');
    }
);

require __DIR__ . '/auth.php';
