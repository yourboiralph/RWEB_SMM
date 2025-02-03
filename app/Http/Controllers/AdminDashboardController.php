<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('admin.dashboard', compact('projects'));
    }
    
}
