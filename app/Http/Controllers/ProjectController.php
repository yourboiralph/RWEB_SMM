<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    // public function index()
    // {
    //     $projects = Project::all(); // Fetch all users
    //     $auth = auth()->user();

    //     return view('admin.project', compact('projects', 'auth')); // Pass data to the view
    // }
    public function index(Request $request)
    {    
        $projects = Project::all(); // Fetch all users
        $auth = auth()->user();
        if ($request->ajax()) {
            $data = Project::select(['id', 'project_name', 'description', 'target_date', 'status']);
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('admin.project.edit', $row->id) . '" class="text-blue-500">Approval form</a>
                            <button onclick="confirmDelete(\'' . route('admin.project.destroy', $row->id) . '\')" class="text-red-500 ml-2">Download</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.project', compact('projects', 'auth')); // Pass data to the view
    }
    public function create()
    {
        $users = User::all(); // Fetch all users
        $clients = User::where('role', 1)->get(); // Fetch only clients with role = 3
        $auth = auth()->user();

        return view('admin.project.create', compact('users', 'clients', 'auth')); // Pass data to the view
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

        return redirect()->route('admin.project')->with('success', 'Project created successfully');
    }

    public function show($id)
    {
        $project = Project::with('client')->findOrFail($id); // Eager load the client relationship
        $auth = auth()->user();

        return view('admin.project.view', compact('project', 'auth'));
    }

    public function edit($id)
    {
        $project = Project::with('client')->findOrFail($id); // Eager load the client relationship
        $users = User::all();
        $clients = User::where('role', 1)->get();
        $auth = auth()->user();

        return view('admin.project.edit', compact('project', 'users', 'clients', 'auth'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'sometimes|string|max:255',
            'client_id' => 'sometimes',
            'description' => 'nullable|string',
            'target_date' => 'sometimes|date',
            'status' => 'sometimes|string',
        ]);

        $project = Project::findOrFail($id);
        $project->update([
            'project_name' => $request->project_name,
            'client_id' => $request->client_id,
            'description' => $request->description,
            'target_date' => $request->target_date,
            
        ]);

        return redirect()->route('admin.project')->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.project')->with('success', 'Project deleted successfully');
    }
}
