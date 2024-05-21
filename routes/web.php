<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RoleManagementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LandingPageController;

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
Route::get('/', [LandingPageController::class, 'index'])->name('indexView');
Route::get('/apply/now/{id}',[LandingPageController::class, 'show'])->name('applyNow');
Route::post('job/apply', [JobController::class, 'submitApplication'])->name('job.submitApplication');

Route::get('/home', [PagesController::class, 'homeView'])->name('homeView');
Route::get('/notifications', [PagesController::class, 'notificationView'])->name('notificationView');
Route::get('/notifications/markasread', [PagesController::class, 'markAsRead'])->name('markAsRead');

Route::group(['middleware' => ['can:application.create']], function () {
    //Pengajuan Cuti
    Route::get('/apply', [PagesController::class, 'leaveApplicationView'])->name('applyView');
    Route::post('/apply', [LeaveApplicationController::class, 'store'])->name('store');
});

Route::group(['middleware' => ['can:application.authorize']], function () {
    Route::get('/action', [PagesController::class, 'actionView'])->name('actionView');
    Route::post('/action/{application}', [LeaveApplicationController::class, 'update'])->name('update');

    //Tambahkan Karyawan
    Route::get('/employee', [PagesController::class, 'employeeView'])->name('employeeView');
    Route::post('/user',[UserController::class,'store'])->name('createUser');

    //Edit Karyawan
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('editUser');
    Route::put('/user/{user}', [UserController::class, 'updateUser'])->name('updateUser');

    //Delete Karyawan
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('deleteUser');

    //Daftar Karyawan
    Route::get('/users', [PagesController::class, 'listUsers'])->name('users');

    //Daftar Karyawan Pensiun
    Route::get('/retire', [PagesController::class, 'listRetirement'])->name('retireList');

    //Cetak SK Pensiun
    Route::get('generate-pdf/{name}', [PdfController::class, 'generatePdf'])->name('cetakSK');

    // Role Management
    Route::resource('/role',RoleManagementController::class);

    //Update Role Karyawan
    Route::put('/users/{user}/pensiunkan',[UserController::class,'pensiunkan'])->name('pensiunkanUser');

    // Rekrutmen Karyawan
    Route::get('/recruitment', [ApplicantController::class, 'index'])->name('rekrut');
    
    // Lamar Pekerjaan
    Route::get('job/apply', [JobController::class, 'applyForm'])->name('job.apply');

    // List Pelamar
    Route::get('/applierList', [JobController::class, 'applierList'])->name('applierList');

    // Detail Pelamar
    Route::get('/applierDetail', [JobController::class, 'applierDetail'])->name('applierDetail');

    // Delete Pelamar
    Route::delete('/JobApplier/{applier}', [JobController::class, 'destroy'])->name('deleteApplier');

    // List Pelamar Lulus Test
    Route::get('/applierPassList', [JobController::class, 'applierPassList'])->name('applierPassList');

    // Terima Pelamar
    Route::put('/applierPass/{id}/{roleName}', [JobController::class, 'changeStatus'])->name('lolos');
    // Vacancy Management
    Route::resource('/vacancy',VacancyController::class);    

    // Detail Lowongan
    Route::get('vacancy/detail/{id}', [VacancyController::class, 'detail'])->name('detail');
});

