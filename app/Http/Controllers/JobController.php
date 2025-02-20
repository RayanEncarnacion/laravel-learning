<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jobs.index', [ 'jobs' => Job::latest()->with('employer')->simplePaginate(5) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("jobs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "title" => ["required", "min:5", "max:50"],
            "salary" => ["required", "min:4", "max:25"]
        ]);
    
        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        Mail::to('rayanencbalbuena@gmail.com')->send(
            new JobPosted($job)
        );
    
        return redirect("/jobs");
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
       return  view('jobs.show', [ 'job' => $job ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
       return  view('jobs.edit', [ 'job' => $job ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        request()->validate([
            "title" => ["required", "min:5", "max:50"],
            "salary" => ["required", "min:4", "max:25"]
        ]);
    
        $job->update([ 
            'title' => request('title'), 
            'salary' => request('salary') 
        ]);
    
        return redirect('/jobs/' . $job->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
