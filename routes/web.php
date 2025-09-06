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

Route::get('/dashboard', function () {
    return view('admin.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:superadmin|admin'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('visa', VisaController::class);
    Route::resource('program-types', ProgramTypeController::class);
    Route::resource('partner-school', PartnerSchoolController::class);
    Route::resource('country', CountryController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('news', NewsController::class);
    Route::resource('event', EventController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
