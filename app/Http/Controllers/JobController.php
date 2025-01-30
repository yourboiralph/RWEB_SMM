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
            'project_name' => 'required|string|max:255',
            'client_id' => 'required',
            'description' => 'nullable|string',
            'target_date' => 'required|date',
        ]);
        // Create a new project
        $job = Job::create([
            'project_name' => $request->project_name,
            'issued_by' => auth()->user()->id,
            'client_id' => $request->client_id,
            'description' => $request->description,
            'target_date' => $request->target_date,
            'status' => "new",
        ]);

        return redirect()->route('admin.project.create');

    }
}
