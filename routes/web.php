<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\URLController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/superadmin/dashboard', [DashboardController::class, 'index'])->name('superadmin.dashboard');
    Route::get('/superadmin/companies', [CompanyController::class, 'list'])->name('superadmin.companies');
    Route::get('superadmin/companies/create', [CompanyController::class, 'create'])->name('superadmin.companies.create');
    Route::post('superadmin/companies/add', [CompanyController::class, 'add'])->name('superadmin.companies.add');
    Route::get('/superadmin/users', [UserController::class, 'list'])->name('superadmin.users');
    Route::get('superadmin/user/create', [UserController::class, 'create'])->name('superadmin.user.create');
    Route::post('superadmin/user/add', [UserController::class, 'add'])->name('superadmin.user.add');
    Route::get('superadmin/generated-urls', [URLController::class, 'list'])->name('superadmin.generated-urls');

    /* Member Routes */
    Route::get('/member/dashboard', [DashboardController::class, 'index'])->name('member.dashboard');
    Route::get('/member/companies', [CompanyController::class, 'list'])->name('member.companies');
    Route::get('member/generated-urls', [URLController::class, 'list'])->name('member.generated-urls');
    Route::get('member/generate-url/{id}', [URLController::class, 'generate_url'])->name('member.generate-url');
    Route::post('member/add-generated-url', [URLController::class, 'add_generated_url'])->name('member.add-generated-url');

    /* Admin Routes */
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/companies', [CompanyController::class, 'list'])->name('admin.companies');

    Route::get('/admin/users', [UserController::class, 'list'])->name('admin.users');
    Route::get('admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('admin/user/add', [UserController::class, 'add'])->name('admin.user.add');

    Route::get('admin/generated-urls', [URLController::class, 'list'])->name('admin.generated-urls');
    Route::get('admin/generate-url/{id}', [URLController::class, 'generate_url'])->name('admin.generate-url');
    Route::post('admin/add-generated-url', [URLController::class, 'add_generated_url'])->name('admin.add-generated-url');
});


require __DIR__.'/auth.php';
