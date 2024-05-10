<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


// authentification routes
Route::get('/login', [AuthentificationController::class, 'login'])->name('login');
Route::post('/login', [AuthentificationController::class, 'loginLogic'])->name('loginLogic');
Route::post('/logOut', [AuthentificationController::class, 'logout'])->name('logout');
Route::get('/register', [AuthentificationController::class, 'register'])->name('register');
Route::post('/register', [AuthentificationController::class, 'registerLogic'])->name('registerLogic');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/taches', [AdminController::class, 'index'])->name('admin.taches');
    Route::post('/admin/taches', [TacheController::class, 'store'])->name('tache.store');
    Route::get('/admin/ListTache', [TacheController::class, 'index'])->name('tache.listTaches');
    Route::delete('/admin/deleteTache/{tache}', [TacheController::class, 'delete'])->name('taches.delete');
    Route::get('/admin/tacheEdit/{id}', [TacheController::class, 'edit'])->name('tache.edit');
    Route::put('/admin/tacheEdit/{tache}', [TacheController::class, 'update'])->name('tache.update');
    Route::get('/admin/ajoutEmploye', [AdminController::class, 'ajoutEmploye'])->name('admin.ajoutEmploye');
    Route::post('/admin/ajoutEmploye', [AdminController::class, 'storeEmploye'])->name('admin.storeEmploye');
    Route::get('/admin/listEmployes', [AdminController::class, 'listEmploye'])->name('admin.listEmploye');
    Route::delete('/admin/deleteEmploye/{employe}', [AdminController::class, 'deleteEmploye'])->name('taches.deleteEmploye');
    // Route::get('/admin/employEdit/{id}' , [AdminController::class , 'editEmploy'])->name('admin.editEmploye');
    // Route::get('/admin/employEdit/{employe}' , [AdminController::class , 'updateEmploy'])->name('admin.updateEmploye');
    Route::post('/admin/changeFromEmployeToAdmin/{employe}', [AdminController::class, 'change'])->name('admin.change');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/employ/profile', [EmployeController::class, 'index'])->name('employe.profile');
    Route::get('/employ/mesTaches', [EmployeController::class, 'mesTaches'])->name('employe.employeTaches');
    Route::post('/employ/makeTacheDone/{tache}', [EmployeController::class, 'makeTacheDone'])->name('employe.makeTacheDone');
    Route::put('/employe/modifierImage/{employe}', [EmployeController::class, 'modifierImage'])->name('employe.changeProfile');
});

// admin routes


// employe routes
