<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', fn () => view('welcome'))->name('/');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/contact', fn () => view('contact'))->name('contact');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::get('/jobs/create', [JobController::class, 'create'] )->name('jobs');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs');
Route::get('/job/{job}', [JobController::class, 'show']);
Route::get('/job/{job}/edit', [JobController::class, 'edit']);
Route::patch('/job/{job}', [JobController::class, 'update']);
Route::delete('/job/{job}', [JobController::class, 'destroy']);
