<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        $users = User::all(); // Fetch all users
        $clients = User::where('role', 1)->get(); // Fetch only clients with role = 3
        $auth = auth()->user();

        return view('admin.project', compact('users', 'clients', 'auth')); // Pass data to the view
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
        $project = Project::create([
            'project_name' => $request->project_name,
            'issued_by' => auth()->user()->id,
            'client_id' => $request->client_id,
            'description' => $request->description,
            'target_date' => $request->target_date,
            'status' => "new",
        ]);

        return redirect()->route('admin.project');

    }
}
