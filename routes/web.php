<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MarkController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'schoolClasses'], function () {
    Route::get('', [SchoolClassController::class, 'index'])->name('schoolClass.index');
    Route::get('create', [SchoolClassController::class, 'create'])->name('schoolClass.create');
    Route::post('store', [SchoolClassController::class, 'store'])->name('schoolClass.store');
    Route::get('edit/{schoolClass}', [SchoolClassController::class, 'edit'])->name('schoolClass.edit');
    Route::post('update/{schoolClass}', [SchoolClassController::class, 'update'])->name('schoolClass.update');
    Route::post('delete/{schoolClass}', [SchoolClassController::class, 'destroy'])->name('schoolClass.destroy');
    Route::get('show/{schoolClass}', [SchoolClassController::class, 'show'])->name('schoolClass.show');
    Route::post('add/{schoolClass}', [SchoolClassController::class, 'add'])->name('schoolClass.add');
    Route::post('remove/{schoolClass}', [SchoolClassController::class, 'remove'])->name('schoolClass.remove');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'students'], function () {
    Route::get('', [StudentController::class, 'index'])->name('student.index');
    Route::get('create', [StudentController::class, 'create'])->name('student.create');
    Route::post('store', [StudentController::class, 'store'])->name('student.store');
    Route::get('edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('update/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::post('delete/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('show/{student}', [StudentController::class, 'show'])->name('student.show');
    Route::post('add/{student}', [StudentController::class, 'add'])->name('student.add');
    Route::post('remove/{student}', [StudentController::class, 'remove'])->name('student.remove');
    Route::get('mark/{student}', [StudentController::class, 'mark'])->name('student.mark');
    Route::post('markadd/{student}', [StudentController::class, 'markadd'])->name('student.markadd');
    Route::post('markremove/{student}', [StudentController::class, 'markremove'])->name('student.markremove');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'subjects'], function () {
    Route::get('', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('store', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('edit/{subject}', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::post('update/{subject}', [SubjectController::class, 'update'])->name('subject.update');
    Route::post('delete/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');
    Route::get('show/{subject}', [SubjectController::class, 'show'])->name('subject.show');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'teachers'], function () {
    Route::get('', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('edit/{teacher}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('update/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::post('delete/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::get('show/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'marks'], function () {
    Route::get('', [MarkController::class, 'index'])->name('mark.index');
    Route::get('create', [MarkController::class, 'create'])->name('mark.create');
    Route::post('store', [MarkController::class, 'store'])->name('mark.store');
    Route::get('edit/{mark}', [MarkController::class, 'edit'])->name('mark.edit');
    Route::post('update/{mark}', [MarkController::class, 'update'])->name('mark.update');
    Route::post('delete/{mark}', [MarkController::class, 'destroy'])->name('mark.destroy');
    Route::get('show/{mark}', [MarkController::class, 'show'])->name('mark.show');
});
