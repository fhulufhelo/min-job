<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;
use App\Keyword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       

        $currentUserJobApplied = Auth::user()->jobApplied;
        $jobIds = [];

        if (count($currentUserJobApplied)) {
            foreach ($currentUserJobApplied as $job) {
                $jobIds[] = $job->pivot->job_id;
            }
        }

        $jobs;

        if ($request->has('search')) {
            $jobs = Job::latest()
            ->where('title','LIKE', $request->search.'%')
            ->get();
        } else {
            $jobs = Job::latest()->get();
        }
        

        $jobs = Job::latest()->get();

 

       return view('jobs.index', compact('jobs', 'jobIds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $keywords = Keyword::all();

        return view('jobs.create', compact('keywords', 'categories'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            'title' =>  $request->title,
            'description' =>  ($request->description) ? $request->description : '',
            'exp' =>  ($request->exp) ? (int) $request->exp : ''
        ];

        $job = Auth::user()->jobs()->create($input);

        $job->categories()->attach($request->categories);
        $job->keywords()->attach($request->keywords);
        
        return redirect('/employer');
    }

    public function apply(Request $request, Job $job)
    {

        $job->usersApplied()->sync([Auth::id()]);

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {

        return view('jobs.show', compact('job'));
    }

    public function job(Job $job)
    {
        $currentUserJobApplied = Auth::user()->jobApplied;
        $jobIds = [];

        if (count($currentUserJobApplied)) {
            foreach ($currentUserJobApplied as $job) {
                $jobIds[] = $job->pivot->job_id;
            }
        }

        $currentUserId = Auth::id();
        return view('jobs.job', compact('job', 'currentUserId', 'jobIds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $categories = Category::all();
        $keywords = Keyword::all();

        return view('jobs.edit', compact('job', 'keywords', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $input = [
            'title' =>  $request->title,
            'description' =>  ($request->description) ? $request->description : '',
            'exp' =>  ($request->exp) ? (int) $request->exp : ''
        ];

        $job->update($input);

        $job->categories()->attach($request->categories);
        $job->keywords()->attach($request->keywords);

        return redirect('/employer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->back();
    }
}
