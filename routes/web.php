<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StaffsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/student', StudentsController::class)->middleware('auth');
Route::controller(StudentsController::class)->group(function () {
    Route::get('/students', 'index')->name('students.index')->middleware('auth');
    Route::get('/students/register', 'create')->name('students.register')->middleware('auth');
    Route::Post('/students/register', 'store')->name('students.register')->middleware('auth');
    Route::delete('/students/{id}', 'destroy')->name('student.delete')->middleware('auth');
})->middleware('auth');
Route::resource('/teacher', TeachersController::class)->middleware('auth');
Route::controller(TeachersController::class)->group(function () {
    Route::get('/teachers', 'index')->name('teachers.index')->middleware('auth');
    Route::get('/teachers/register', 'create')->name('teachers.register')->middleware('auth');
    Route::post('/teachers/register', 'store')->name('teachers.register')->middleware('auth');
    Route::delete('/teachers/{id}', 'destroy')->name('teachers.delete')->middleware('auth');
    Route::get('/teachers/{$id}', 'show')->name('teachers.show');
})->middleware('auth');

Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments', 'index')->name('department.index')->middleware('auth');
    Route::get('/department/register', 'create')->name('department.register')->middleware('auth');
    Route::post('/department', 'store')->name('department.create');
});
Route::controller(SemesterController::class)->group(function () {
    Route::get('/semester', 'index')->name('semester.index')->middleware('auth');
    Route::get('/semester/register', 'create')->name('semester.register')->middleware('auth');
    Route::post('/semester', 'store')->name('semester.create');
})->middleware('auth');
Route::controller(ExpensesController::class)->group(function () {
    Route::get('/expenses', 'index')->name('expenses.index')->middleware('auth');
    Route::get('/expenses/register', 'create')->name('expenses.register')->middleware('auth');
})->middleware('auth');
Route::resource('/expenses', ExpensesController::class)->middleware('auth');
Auth::routes();
Route::post('/getData', [StudentsController::class, 'getData'])->name('getData');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/income', IncomeController::class)->middleware('auth');
Route::resource('/department', DepartmentController::class)->middleware('auth');
Route::resource('/staff', StaffsController::class)->middleware('auth');
Route::resource('/semester', SemesterController::class)->middleware('auth');
Route::resource('/meeting', MeetingsController::class)->middleware('auth');
Route::resource('/asset', AssetsController::class)->middleware('auth');
Route::resource('/report', SearchController::class)->middleware('auth');
Route::get('/teReport', [SearchController::class, 'teReport'])->name('teReport')->middleware('auth');
Route::POST('/stReport', [SearchController::class, 'stReport'])->name('stReport')->middleware('auth');
Route::post('/incReport', [SearchController::class,'incReport'])->name('incReport')->middleware('auth');
Route::post('/incReport', [SearchController::class,'incReport'])->name('incReport')->middleware('auth');
Route::post('/expReport', [SearchController::class,'expReport'])->name('expReport')->middleware('auth');
Route::post('/meetReport',[SearchController::class,'meetReport'])->name('meetReport')->middleware('auth');
Route::resource('/profile',profileController::class)->middleware('auth');