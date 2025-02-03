<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllProjects()
    {
        $projects = Project::all();
        return view('admin.project', compact('projects'));
    }

    public function showAllJobOrder()
    {
        $jobOrder = Job::all();
        return view('admin.joborder', compact('jobOrder'));
    }

    public function showProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.show', compact('project'));
    }

    public function showJobOrder($id)
    {
        $jobOrder = Job::findOrFail($id);
        return view('admin.joborder.show', compact('jobOrder'));
    }

    public function approveProject(Request $request, $id)
    {
        $request->validate([
            'signature_admin' => 'required',
        ]);

        $project = Project::findOrFail($id);
        $project->update([
            'signature_admin' => $request->signature_admin,
            'approved_by_admin' => auth()->user()->id,
            'status' => 'approved by admin'
        ]);

        return redirect()->route('admin.project')->with('success', 'Project Approved!');
    }

    public function approveJobOrder(Request $request, $id)
    {
        $request->validate([
            'signature_admin' => 'required',
        ]);

        $jobOrder = Job::findOrFail($id);
        $jobOrder->update([
            'signature_admin' => $request->signature_admin,
            'approved_by_admin' => auth()->user()->id,
            'status' => 'approved by admin'
        ]);

        return redirect()->route('admin.joborder.show')->with('success', 'Job Order Approved!');
    }
}
