<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {return view('welcome');})->name('index');

Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');                  // get all
Route::get('/projects/{id}', [ProjectsController::class, 'show'])->name('projects.show');               // get single
Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');                 // create
Route::delete('/projects/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');      // delete
Route::put('/projects/{id}', [ProjectsController::class, 'update'])->name('projects.update');           // update

Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');                  // get all
Route::get('/employees/{id}', [EmployeesController::class, 'show'])->name('employees.show');               // get single
Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');                 // create
Route::delete('/employees/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');      // delete
Route::put('/employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');           // update

Auth::routes();

Route::any('/{any}', function(){ 
    print("404 - No such route!"); 
})->where('any', '.*');
