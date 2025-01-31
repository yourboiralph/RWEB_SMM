<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index($id)
    {
        $list_of_projects = Project::where('client_id', $id)->with('user')->get();
        return view('client.project-development', compact('list_of_projects'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('client.project-development.show', compact('project'));
    }

    public function approve(Request $request, $id)
    {
        $request->validate([
            'signature_client' => 'required'
        ]);

        $project = Project::findOrFail($id);
        $project->update([
            'signature_client' => $request->signature_client,
        ]);

        return redirect()->route('client.project-development.show')->with('success', 'Project updated successfully.');
    }
    public function decline($id)
    {
        
        $project = Project::findOrFail($id);
        $project->update([
            'signature_admin' => null,
            'signature_top_manager' => null
        ]);

        return redirect()->route('client.project-development')->with('success', 'Project updated successfully.');
    }
}
