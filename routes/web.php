<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\TicketsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\AlumnoController;
use App\Http\Controllers\Users\RepresentativeController;
use App\Http\Controllers\Users\TeacherController;
use Illuminate\Support\Facades\Route;

// RUTAS DE ACCESO SIN AUTENTICACIÓN
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/set_language/{lang}', [Controller::class, 'set_language'])->name('set_language');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// RUTAS DE ACCESO CON AUTENTICACIÓN
Route::middleware('auth')->group(function () {
    // CRUD PERFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // CRUD ROLES
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/update/{role}', [RoleController::class, 'update'])->name('roles.update');
    // CRUD PERMISOS
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    // CRUD USERS
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    // CRUD USERS TEACHERS
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
    Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/teachers/update/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/destroy/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
    // CRUD USERS REPRESENTATIVES
    Route::get('/representatives', [RepresentativeController::class, 'index'])->name('representatives');
    Route::post('/representatives/store', [RepresentativeController::class, 'store'])->name('representatives.store');
    Route::get('/representatives/{representative}/edit', [RepresentativeController::class, 'edit'])->name('representatives.edit');
    Route::put('/representatives/update/{representative}', [RepresentativeController::class, 'update'])->name('representatives.update');
    Route::delete('/representatives/destroy/{representative}', [RepresentativeController::class, 'destroy'])->name('representatives.destroy');
    // USUARIOS ALUMNOS
    Route::get('/representatives/alumno', [AlumnoController::class, 'index'])->name('representatives.alumno');
    Route::post('/representatives/alumno/store', [AlumnoController::class, 'store'])->name('representatives.alumno.store');
    Route::get('/representatives/alumno/{alumno}/edit', [AlumnoController::class, 'edit'])->name('representatives.alumno.edit');
    Route::put('/representatives/alumno/update/{alumno}', [AlumnoController::class, 'update'])->name('representatives.alumno.update');
    Route::delete('/representatives/alumno/destroy/{alumno}', [AlumnoController::class, 'destroy'])->name('representatives.alumno.destroy');
    //SETTINGS
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/settings/companies', [SettingController::class, 'company'])->name('settings.company');
    Route::get('/settings/banks', [SettingController::class, 'banks'])->name('settings.banks');
    Route::post('/settings-companies', [SettingController::class, 'store_companies'])->name('settings.company.store');
    // CRUD TICKETS
    Route::get('/tickets/{id}', [TicketsController::class, 'index'])->name('tickets');
    Route::post('/tickets/store', [TicketsController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{ticket}/edit', [TicketsController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/update/{ticket}', [TicketsController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/destroy/{ticket}', [TicketsController::class, 'destroy'])->name('tickets.destroy');
    // COMENTARIOS
    Route::post('/tickets/comment', [CommentController::class, 'store'])->name('tickets.comment');
    Route::get('/tickets/{ticket}/img', [CommentController::class, 'img'])->name('tickets.img');
    Route::delete('/tickets/{images}/destroy_img', [CommentController::class, 'destroy_img'])->name('tickets.destroy_img');
    // COMBOS
    Route::controller(ComboController::class)->prefix('combo')->group(function () {
        Route::match(['get', 'post'], '/{country}/state', 'state');
        Route::match(['get', 'post'], '/{state}/city', 'city');
        Route::match(['get', 'post'], '/{idUser}/user', 'user');
    });
});

require __DIR__ . '/auth.php';