<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\EmployerController;

use App\Http\Controllers\MyjobController;



Route::get('', fn() => to_route('jobs.index'));

Route::resource('jobs',JobController::class)->only(['index','show']);


Route::get('login',   [AuthController::class, 'login'])->name('login');
Route::post('login',  [AuthController::class, 'login_store'])->name('login.post');
Route::Delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/signin', [AuthController::class, 'create'])->name('signin');
Route::resource('auth', AuthController::class)->only(['create', 'store']);


Route::middleware('auth')->group(function () {

    Route::resource('job.application', JobApplicationController::class)
        ->only(['create', 'store']);

    Route::resource('my-job-applications', MyJobApplicationController::class)
        ->only(['index', 'destroy']);

    Route::resource('employer', EmployerController::class)
        ->only(['create', 'store']);

   Route::middleware('employer')->resource('my-jobs', MyJobController::class);
        
});