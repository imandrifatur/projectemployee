<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
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

// routes/web.php



Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');



Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
Route::post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');
Route::get('/leaves/{leave}', [LeaveController::class, 'show'])->name('leaves.show');
Route::get('/leaves/{leave}/edit', [LeaveController::class, 'edit'])->name('leaves.edit');
Route::patch('/leaves/{leave}', [LeaveController::class, 'update'])->name('leaves.update');
Route::delete('/leaves/{leave}', [LeaveController::class, 'destroy'])->name('leaves.destroy');
