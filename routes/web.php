<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view("/", 'welcome');
Route::view("/about", 'about');
Route::view("/contact", 'contact');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index')->name('jobs');
    Route::get('/jobs/create', 'create')->name('jobs');
    Route::post('/jobs', 'store')->name('jobs');
    Route::get('/job/{job}', 'show');
    Route::get('/job/{job}/edit', 'edit');
    Route::patch('/job/{job}', 'update');
    Route::delete('/job/{job}', 'destroy');
});
