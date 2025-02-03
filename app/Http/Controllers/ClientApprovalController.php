<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ClientApprovalController extends Controller
{
    public function index()
    {
        // Paginate the projects to show 7 items per page and filter by status
        $list_of_projects = Project::where('client_id', auth()->user()->id)
                                    ->paginate(7);

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
            'status' => 'approved by client',
            'signature_client' => $request->signature_client,
        ]);

        return redirect()->route('client.projectdev')->with('Approved', 'Project Approved Successfully.');
    }
    public function decline($id)
    {
        
        $project = Project::findOrFail($id);
        $project->update([
            'status' => 'declined by client',
            'signature_admin' => null,
            'signature_top_manager' => null
        ]);

        return redirect()->route('client.project-development')->with('Declined', 'Project Declined Successfully.');
    }
}
