<?php

use App\Http\Controllers\admin\GroupController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\admin\AdminStudentController;
use App\Http\Controllers\admin\AdminFormationController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::resource('/student', AdminStudentController::class);
    Route::resource('/formation', AdminFormationController::class);
    Route::resource('/group', GroupController::class);
});
//Route Student

//crud
/*Route::get("/student/create", [StudentController::class, "create"])->name('student.create'); //avant les autres routes
Route::post("/student", [StudentController::class, "store"])->name('student.store');
Route::get("/student/{student}/edit", [StudentController::class, "edit"])->name('student.edit');
Route::put("/student/{student}", [StudentController::class, "update"])->name('student.update');
Route::delete("/student/{student}", [StudentController::class, "destroy"])->name('student.destroy');*/

//use
Route::get("/student", [StudentController::class, "index"])->name('student.index');
Route::get("/student/{student}", [StudentController::class, "show"])->name('student.show');


//Route Formation

//crud
/*Route::get("/formation/create", [FormationController::class, "create"])->name('formation.create'); //avant les autres routes
Route::post("/formation", [FormationController::class, "store"])->name('formation.store');
Route::get("/formation/{formation}/edit", [FormationController::class, "edit"])->name('formation.edit');
Route::put("/formation/{formation}", [FormationController::class, "update"])->name('formation.update');
Route::delete("/formation/{formation}", [FormationController::class, "destroy"])->name('formation.destroy');*/

//use
Route::get("/formation", [FormationController::class, "index"])->name('formation.index');
Route::get("/formation/{formation}", [FormationController::class, "show"])->name('formation.show');
