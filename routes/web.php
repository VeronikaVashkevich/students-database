<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStudyItemController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfessionalDevelopmentProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', function() {
        return redirect('/home');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('courses', CourseController::class);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('professionalDevelopmentPrograms', ProfessionalDevelopmentProgramController::class);

    Route::post('/store-study-item', [CourseStudyItemController::class, 'storeStudyItem'])->name('storeStudyItem');
    Route::put('/update-study-item/{item}', [CourseStudyItemController::class, 'updateStudyItem'])->name('updateStudyItem');
    Route::get('/create-study-item', [CourseStudyItemController::class, 'createStudyItem'])->name('createStudyItem');
    Route::get('/edit-study-item/{item}', [CourseStudyItemController::class, 'editStudyItem'])->name('editStudyItem');

    Route::get('/print', [PrintController::class, 'print'])->name('print');
    Route::post('/print-excel', [PrintController::class, 'printExcel'])->name('printExcel');
    Route::post('/print-pdf', [PrintController::class, 'printPdf'])->name('printPdf');
});
