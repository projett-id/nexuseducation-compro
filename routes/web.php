<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// use Spatie\Permission\Middleware\RoleMiddleware;
// use Spatie\Permission\Middleware\PermissionMiddleware;


use App\Http\Controllers\Backoffice\RoleController;
use App\Http\Controllers\Backoffice\PermissionController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Backoffice\NewsController;
use App\Http\Controllers\Backoffice\EventController;

use App\Http\Controllers\Backoffice\CountryController;
use App\Http\Controllers\Backoffice\CategoryController;
use App\Http\Controllers\Backoffice\TagController;
use App\Http\Controllers\Backoffice\VisaController;
use App\Http\Controllers\Backoffice\PartnerSchoolController;
use App\Http\Controllers\Backoffice\ProgramTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/event', [EventController::class, 'indexFE'])->name('fe.event');
Route::get('/event/{slug}', [EventController::class, 'detailFE'])->name('fe.event.detail');
Route::get('/news', [NewsController::class, 'indexFE'])->name('fe.news');
Route::get('/news/{slug}', [NewsController::class, 'detailFE'])->name('fe.news.detail');
    
Route::get('/country/{name}', [CountryController::class, 'detailFE'])
    ->name('fe.country.detail')
    ->where('name', '[A-Za-z0-9\-]+');

Route::get('/school/{name}', [PartnerSchoolController::class, 'detailFE'])
    ->name('fe.school.detail')
    ->where('name', '[A-Za-z0-9\-]+');

Route::match(['get', 'post'], '/start-your-journey',[HomeController::class, 'start_your_journey'])->name('start-your-journey-url');
Route::match(['get', 'post'], '/partner-with-us', [HomeController::class, 'partner_with_us'])->name('partner-us-url');

Route::get('/dashboard', function () {
    return view('admin.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('backoffice')
    ->middleware(['auth', 'role:superadmin|admin'])
    ->group(function () {
        Route::match(['get','post'],'about',[HomeController::class,'aboutForm'])->name('about.form');
        Route::resource('roles', RoleController::class);
        Route::resource('visa', VisaController::class);
        Route::resource('program-types', ProgramTypeController::class);
        // Route::resource('partner-school', PartnerSchoolController::class);
        Route::prefix('partner-school')->name('partner-school.')->group(function () {
            Route::get('{partner_school}/detail/{detail?}', [PartnerSchoolController::class, 'detail'])
                ->name('detail');
            Route::post('{partner_school}/detail/{detail?}', [PartnerSchoolController::class, 'storeDetail'])
                ->name('detail.store');
            Route::delete('{partner_school}/detail/{detail}', [PartnerSchoolController::class, 'deleteDetail'])
                ->name('detail.destroy');
        });

        Route::resource('partner-school', PartnerSchoolController::class);


        Route::resource('country', CountryController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users', UserController::class);
        Route::resource('news', NewsController::class);
        Route::resource('event', EventController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);
        Route::get('data-journey', [HomeController::class,'listJourney'])->name('data-journey');
        Route::get('data-partner', [HomeController::class,'listPartner'])->name('data-partner');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
