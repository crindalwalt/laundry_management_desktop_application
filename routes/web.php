<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
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
    return redirect()->route("dashboard");
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(["auth","verified"])->prefix("/dashboard")->group(function (){
    Route::get("/", function (){ return view("dashboard");})->name("dashboard");
    Route::get("/jobs", [JobController::class,'index'])->name("jobs.all");
    Route::get("/job/add", [JobController::class,'create'])->name("jobs.add");
    Route::get("/job/{customer}/add", [JobController::class,'store'])->name("job.step2");
    Route::post("/customer/add", [CustomerController::class,'store'])->name("customer.add");
    Route::post("/job/save", [JobController::class,'save'])->name("job.save");



    Route::get("/jobs/{id}/show", [JobController::class,'detail'])->name("job.detail");
    Route::get("/customers",[CustomerController::class,"index"])->name("customer.all");
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/template.php';
