<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

Route::get('/', function () {return view('welcome');})->name('index');

Route::get('/project', function () {return view('project');})->name('regular.project');

Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');                  // get all
Route::get('/employees/{id}', [EmployeesController::class, 'show'])->name('employees.show');               // get single
Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');                 // create
Route::delete('/employees/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');      // delete
Route::put('/employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');           // update

Route::any('/{any}', function(){ 
    print("404 - No such route!"); 
})->where('any', '.*');