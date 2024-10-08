<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ControlsController;
use App\Http\Controllers\Admin\folders\FileController;
use App\Http\Controllers\Admin\folders\FolderController;
use App\Http\Controllers\Admin\GradesController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Admin\MattersController;
use App\Http\Controllers\Admin\ModalityController;
use App\Http\Controllers\Admin\TicketsController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Direction\CityController;
use App\Http\Controllers\Direction\CountryController;
use App\Http\Controllers\Direction\RegionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Reports\ReportStudentController;
use App\Http\Controllers\Schedules\StudentsController;
use App\Http\Controllers\Schedules\TeacherController as SchedulesTeacherController;
use App\Http\Controllers\Schedules\TimeController;
use App\Http\Controllers\Users\AlumnoController;
use App\Http\Controllers\Users\RepresentativeController;
use App\Http\Controllers\Users\TeacherController;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Route;


// RUTAS DE ACCESO SIN AUTENTICACIÓN
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/project', [HomeController::class, 'project'])->name('project');
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
    //CONTROLS
    Route::get('/controls', [ControlsController::class, 'index'])->name('controls');
    Route::get('/controls/matters', [ControlsController::class, 'matters'])->name('controls.matters');
    Route::get('/controls/grades', [ControlsController::class, 'grades'])->name('controls.grades');
    Route::get('/controls/groups', [ControlsController::class, 'groups'])->name('controls.groups');
    Route::get('/controls/modalities', [ControlsController::class, 'modalities'])->name('controls.modalities');
    // CRUD GRADES
    Route::post('/grades/store', [GradesController::class, 'store'])->name('grades.store');
    Route::get('/grades/{grade}/edit', [GradesController::class, 'edit'])->name('grades.edit');
    Route::put('/grades/update/{grade}', [GradesController::class, 'update'])->name('grades.update');
    Route::delete('/grades/destroy/{grade}', [GradesController::class, 'destroy'])->name('grades.destroy');
    // CRUD GROUPS
    Route::post('/groups/store', [GroupsController::class, 'store'])->name('groups.store');
    Route::get('/groups/{group}/edit', [GroupsController::class, 'edit'])->name('groups.edit');
    Route::put('/groups/update/{group}', [GroupsController::class, 'update'])->name('groups.update');
    Route::delete('/groups/destroy/{group}', [GroupsController::class, 'destroy'])->name('groups.destroy');
    // CRUD MATTERS
    Route::post('/matters/store', [MattersController::class, 'store'])->name('matters.store');
    Route::get('/matters/{matter}/edit', [MattersController::class, 'edit'])->name('matters.edit');
    Route::put('/matters/update/{matter}', [MattersController::class, 'update'])->name('matters.update');
    Route::delete('/matters/destroy/{matter}', [MattersController::class, 'destroy'])->name('matters.destroy');
    // CRUD MODALITY
    Route::post('/modalities/store', [ModalityController::class, 'store'])->name('modalities.store');
    Route::get('/modalities/{modality}/edit', [ModalityController::class, 'edit'])->name('modalities.edit');
    Route::put('/modalities/update/{modality}', [ModalityController::class, 'update'])->name('modalities.update');
    Route::delete('/modalities/destroy/{modality}', [ModalityController::class, 'destroy'])->name('modalities.destroy');
    // CRUD TIMES
    Route::get('/times', [TimeController::class, 'index'])->name('times');
    Route::post('/times/store', [TimeController::class, 'store'])->name('times.store');
    Route::get('/times/{time}/edit', [TimeController::class, 'edit'])->name('times.edit');
    Route::put('/times/update/{time}', [TimeController::class, 'update'])->name('times.update');
    Route::delete('/times/destroy/{time}', [TimeController::class, 'destroy'])->name('times.destroy');
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
        Route::match(['get', 'post'], '/{grade}/group', 'group');
        Route::match(['get', 'post'], '/{grade}/matter', 'matter');
    });
    // CRUD BANKS
    Route::get('/banks', [BankController::class, 'index'])->name('banks');
    Route::post('/banks/store', [BankController::class, 'store'])->name('banks.store');
    Route::get('/banks/{bank}/edit', [BankController::class, 'edit'])->name('banks.edit');
    Route::put('/banks/update/{bank}', [BankController::class, 'update'])->name('banks.update');
    Route::delete('/banks/destroy/{bank}', [BankController::class, 'destroy'])->name('banks.destroy');
    // SHEDULES - TEACHER
    Route::get('/shedules-teacher', [SchedulesTeacherController::class, 'index'])->name('shedules.teacher');
    Route::get('/shedules-mostrar/{id}', [SchedulesTeacherController::class, 'mostrar'])->name('shedules.mostrar');
    Route::get('/shedules-classroom', [SchedulesTeacherController::class, 'classroom'])->name('shedules.classroom');
    Route::get('/shedules/{id}/edit', [SchedulesTeacherController::class, 'edit'])->name('shedules.edit');
    Route::put('/shedules/update/{event}', [SchedulesTeacherController::class, 'update'])->name('shedules.update');
    Route::get('/shedules/destroy/{event}', [SchedulesTeacherController::class, 'destroy'])->name('shedules.destroy');
    // SHEDULES - STUDENTS
    Route::get('/shedules-students', [StudentsController::class, 'index'])->name('shedules.students');
    Route::get('/shedules-mostrar-student/{id}', [StudentsController::class, 'mostrar'])->name('shedules.mostrar.student');

    // CRUD COUNTRIES
    Route::get('/countries', [CountryController::class, 'index'])->name('countries');

    // CRUD REGIONES
    Route::get('/regiones', [RegionController::class, 'index'])->name('regiones');
    Route::post('/regiones/store', [RegionController::class, 'store'])->name('regiones.store');
    Route::get('/regiones/{region}/edit', [RegionController::class, 'edit'])->name('regiones.edit');
    Route::put('/regiones/update/{region}', [RegionController::class, 'update'])->name('regiones.update');
    Route::delete('/regiones/destroy/{region}', [RegionController::class, 'destroy'])->name('regiones.destroy');
    // CRUD CIUDADES
    Route::get('/cities', [CityController::class, 'index'])->name('cities');
    Route::post('/cities/store', [CityController::class, 'store'])->name('cities.store');
    Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
    Route::put('/cities/update/{city}', [CityController::class, 'update'])->name('cities.update');
    Route::delete('/cities/destroy/{city}', [CityController::class, 'destroy'])->name('cities.destroy');
    //SHEDULES EXTRAS
    Route::get('/teacher-time/{id}', [SchedulesTeacherController::class, 'teacher_time']);
    Route::get('/consulta/{id}', [SchedulesTeacherController::class, 'consulta']);
    Route::get('/consulta2/{id}/{teacher}', [SchedulesTeacherController::class, 'consulta2']);
    Route::get('/title/{id}', [SchedulesTeacherController::class, 'title']);
    Route::post('/shedules-class', [SchedulesTeacherController::class, 'shedules_class'])->name('shedules.class');

    // CRUD FOLDERS
    Route::get('/folders', [FolderController::class, 'index'])->name('folders');
    Route::post('/folders/store', [FolderController::class, 'store'])->name('folders.store');
    Route::post('/folders/sub_folder', [FolderController::class, 'sub_folder'])->name('folders.store.subfolder');
    Route::get('/folders/show/{id}', [FolderController::class, 'show'])->name('folders.show');
    Route::get('/folders/{folder}/edit', [FolderController::class, 'edit'])->name('folders.edit');
    Route::put('/folders/update/{folder}', [FolderController::class, 'update'])->name('folders.update');
    Route::delete('/folders/destroy/{folder}', [FolderController::class, 'destroy'])->name('folders.destroy');

    // CRUD FILE
    Route::post('/folders/file', [FileController::class, 'upload'])->name('files.upload');
    Route::delete('/files/destroy/{file}', [FileController::class, 'destroy'])->name('files.destroy');

    // CRUD RATINGS
    Route::get('/ratings', [RatingController::class, 'index'])->name('ratings');
    Route::get('/ratings/data/get/{data}', [RatingController::class, 'getData']);
    Route::post('/ratings/store', [RatingController::class, 'store'])->name('ratings.store');

    // CRUD Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/update/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::post('payments/change', [PaymentController::class, 'change'])->name('payments.change');
    Route::delete('/payments/destroy/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
    // Reminder
    Route::get('/reminder/{id}', [DashboardController::class, 'reminder']);
    Route::post('/dashboard/change', [DashboardController::class, 'change']);
    Route::get('/dashboard/anuncio_mostrar/{id}/mostrar', [DashboardController::class, 'mostrar']);

    // CRUD ANUNCIOS
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements');
    Route::post('/announcements/store', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
    Route::get('/announcements/{announcement}/show', [AnnouncementController::class, 'show'])->name('announcements.show');
    Route::put('/announcements/update/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
    Route::delete('/announcements/destroy/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
    // REPORTES
    Route::match(['get', 'post'], '/reports/students', [ReportStudentController::class, 'index'])->name('report.student');
    Route::get('/generar-pdf-student/{id}', [ReportStudentController::class, 'generatePdf'])->name('pdf.student');

    // Definir rutas para solicitudes de ausencia
    Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves');
    Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leaves.create.view');
    Route::post('/leave/store', [LeaveController::class, 'createLeave'])->name('leaves.create');
    Route::put('/leave/{leave}/approve', [LeaveController::class, 'approveLeave'])->name('leaves.approve');
    Route::put('/leave/{leave}/reject', [LeaveController::class, 'rejectLeave'])->name('leaves.reject');
});

require __DIR__ . '/auth.php';