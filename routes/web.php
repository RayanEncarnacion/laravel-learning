<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', fn () => view('welcome'))->name('/');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/contact', fn () => view('contact'))->name('contact');

Route::get('/jobs', fn () => view('jobs.index', [ 'jobs' => Job::latest()->with('employer')->simplePaginate(5) ]))->name('jobs');

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

Route::get('/jobs/create', fn () => view("jobs.create"))->name('jobs');
Route::get('/job/{id}', fn ($id) => view('jobs.show', [ 'job' => Job::find($id) ]))->name('job');
Route::get('/job/{id}/edit', fn ($id) => view('jobs.edit', [ 'job' => Job::find($id) ]));

Route::patch('/job/{id}', function ($id) { 
    request()->validate([
        "title" => ["required", "min:5", "max:50"],
        "salary" => ["required", "min:4", "max:25"]
    ]);

    Job::findOrFail($id)
            ->update([ 
                'title' => request('title'), 
                'salary' => request('salary') 
            ]);

    return redirect('/job/' . $id);
})->name('job');

Route::delete('/job/{id}', function ($id) { 
    Job::findOrFail($id)->delete();
    return redirect('/jobs');
})->name('job');