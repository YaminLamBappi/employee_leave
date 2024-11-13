<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

Route::get('/', [AdminController::class, 'index'])
    ->name('auth.login');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');



Route::get('/admin', [AdminController::class, 'admin_panel'])->name('admin');
Route::get('/employee', [EmployeeController::class, 'employee_panel'])->name('employee');

Route::get('/apply_leave', [EmployeeController::class, 'leave_apply_create'])->name('apply_leave');
Route::post('apply_leave', [EmployeeController::class, 'apply_leave_store'])
    ->name('apply_leave');

Route::get('/leave_history', [EmployeeController::class, 'leave_history'])->name('leave_history');


Route::get('/manage_leave', [AdminController::class, 'manage_leave'])->name('manage_leave');


Route::get('approve/{id}', [AdminController::class, 'approve'])->name('approve_leave');
Route::get('reject/{id}', [AdminController::class, 'reject'])->name('reject_leave');


Route::get('/admin_leave_history', [AdminController::class, 'admin_leave_history'])->name('admin_leave_history');

Route::get('/total_employee', [AdminController::class, 'total_employee'])->name('total_employee');
Route::get('/employee/search', [AdminController::class, 'search'])->name('employee.search');


Route::get('/employee/update/{id}', [AdminController::class, 'employee_update'])->name('employee_update');
Route::put('/employee/update/{id}', [AdminController::class, 'update_employee'])->name('employee_update');


Route::get('/employee/delete/{id}', [AdminController::class, 'employee_delete'])->name('employee_delete');


Route::get('add_employee', [AdminController::class, 'create'])
    ->name('add_employee');

Route::post('add_employee', [AdminController::class, 'store']);



Route::get('profile_update', [ProfileController::class, 'update_profile'])
    ->name('profile_update');
Route::put('profile_update', [ProfileController::class, 'profile_update'])
    ->name('profile_update');


Route::get('password_update', [ProfileController::class, 'password_update'])
    ->name('password_update');
Route::put('password_update', [ProfileController::class, 'update_pasword'])
    ->name('password_update');



Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.edit');

require __DIR__ . '/auth.php';
