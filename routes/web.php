<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MedicalFilesController;
use App\Http\Controllers\PrescriptionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});



Route::get('/dashboard', function () {
    return view('temp');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Define Role Resource Routes
Route::resource('roles', RoleController::class);

//Define prescriptions Routes
Route::get('/prescriptions/trash', [PrescriptionsController::class ,'trash'])->name('prescriptions.trash');
Route::post('prescriptions/restore/{id}', [PrescriptionsController::class , 'restore'])->name('prescriptions.restore');
Route::delete('/prescriptions/hard-delete/{id}', [PrescriptionsController::class , 'hardDelete'])->name('prescriptions.hardDelete');
Route::resource('prescriptions', PrescriptionsController::class);

//Define MedicalFiles Routes
Route::resource('/medicalFiles', MedicalFilesController::class);

// doctors routes
Route::get('/doctors', function () {
    return view('doctors.index');
})->name('doctors.index');

Route::get('/doctors-edit', function () {
    return view('doctors.edit');
})->name('doctors.edit');

// patients routes
Route::get('/patients', function () {
    return view('patients.index');
})->name('patients.index');

// departments routes
Route::resource('/departments', DepartmentController::class);
Route::get('trash', [DepartmentController::class, 'trash'])->name('departments.trash');
Route::put('/departments/restore/{id}', [DepartmentController::class, 'restore'])->name('departments.restore');
Route::delete('/departments/hard-delete/{id}', [DepartmentController::class, 'hardDelete'])->name('departments.hardDelete'); // الحذف النهائي
Route::patch('/departments/{id}/toggle-status', [DepartmentController::class, 'toggleStatus'])->name('departments.toggleStatus');
// end

// appointments routes
Route::get('/appointments', function () {
    return view('appointments.index');
})->name('appointments.index');

Route::get('update_user',[UserController::class,'update_user'])->name('update_user');
Route::post('employees/{id}/restore',[EmployeeController::class,'restore'])->name('employees.restore');
Route::get('employees/trash', [EmployeeController::class, 'trash'])->name('employees.trash');
Route::delete('employees/hardDelete/{id}', [EmployeeController::class, 'hardDelete'])->name('employees.hardDelete'); // الحذف النهائي
// employees.hardDelete

Route::resource('employees', EmployeeController::class);
Route::resource('users', UserController::class);
