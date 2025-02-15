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
    $paginated_jobs = Job::latest()->with('employer')->simplePaginate(5);
    return view('jobs.index', [ 'jobs' => $paginated_jobs ]);
})->name('jobs');

Route::post('/jobs', function () {
    request()->validate([
        "title" => ["required", "min:5", "max:50"],
        "salary" => ["required", "min:4", "max:25"]
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect("/jobs");
})->name('jobs');

Route::get('/jobs/create', function () {
    return view("jobs.create");
})->name('jobs');

Route::get('/job/{id}', function ($id) {
    return view('jobs.show', [ 'job' => Job::find($id) ]);
})->name('job');