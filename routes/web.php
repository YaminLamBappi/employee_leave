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



Route::get('add_employee', [AdminController::class, 'create'])
    ->name('add_employee');

Route::post('add_employee', [AdminController::class, 'store']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
