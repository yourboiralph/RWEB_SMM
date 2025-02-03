<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RevisionController extends Controller
{
    public function index() {
        $projects = Project::all();  // Corrected variable naming for clarity
        $jobOrders = Job::all(); // Corrected plural naming for clarity
        $user = auth()->user();

        if ($user->role == 2) {
            return view('admin.revisions', compact('projects', 'jobOrders'));
        } else {
            return redirect()->route('dashboard'); // Fixed redirection
        }

        return abort(403, 'Unauthorized action.'); // Prevents execution without a proper return
    }
}
