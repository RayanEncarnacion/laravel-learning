<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/jobs', function () {
    return view('jobs', [ 'jobs' => Job::all() ]);
})->name('jobs');

Route::get('/job/{id}', function ($id) {
    return view('job', [ 'job' => Job::findById($id) ]);
})->name('job');