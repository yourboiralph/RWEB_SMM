<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::all();
        $auth = $auth = auth()->user();
        return view('admin.joborder', ['jobs' => $jobs, 'auth' => $auth]);
    }

    public function create()
    {
        $users = User::all(); // Fetch all users
        $worked_by = User::whereNotIn('role', [1, 2])->get();
        $auth = auth()->user();

        return view('admin.joborder-create', compact('users', 'worked_by', 'auth')); // Pass data to the view
    }

    
    public function store(Request $request)
    {

        $request->validate([
            'project_id' => 'required',
            'job_name' => 'required|string',
            'worked_by' => 'required',
            'description' => 'nullable|string',
            'target_date' => 'required|date',
        ]);
        // Create a new project
        $job = Job::create([
            'project_id' => $request->project_id,
            'worked_by' => $request->worked_by,
            'issued_by' => auth()->user()->id,
            'job_name' => $request->job_name,
            'description' => $request->description,
            'target_date' => $request->target_date,
            'status' => "new",
        ]);

        return redirect()->route('admin.project.create');

    }
}
