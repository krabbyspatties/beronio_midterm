<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $employee = Employee::all();
    return view('dashboard', compact('employee'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/employee/store', [EmployeeController::class, 'store']) -> name('employee.store');
Route::delete('/employee/{employee}', [EmployeeController:: class, 'destroy']) -> name('employee.destroy');
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit']) -> name('employee.edit');
Route::put('/employee/{employee}', [EmployeeController::class, 'update']) -> name('employee.update');


require __DIR__.'/auth.php';
