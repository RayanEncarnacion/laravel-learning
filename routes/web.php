<?php

use App\Http\Controllers\JobController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/translateJob', function () {
    $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Done';
});

Route::view("/", 'welcome');
Route::view("/about", 'about');
Route::view("/contact", 'contact');

Route::resource('jobs', JobController::class);