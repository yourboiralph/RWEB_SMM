<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Project;
use Illuminate\Http\Request;

class RevisionController extends Controller
{
    public function index() {
        $project = Project::all();
        $jobOrder = Job::all();
        return view('admin.revision', compact('project', 'jobOrder'));
    }
}
