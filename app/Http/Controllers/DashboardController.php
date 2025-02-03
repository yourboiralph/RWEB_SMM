<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $projects = Project::all();
        $user = auth()->user();
        if ($user->role == 2) {
            return view('admin.dashboard', compact('projects', 'user'));
        } elseif ($user->role == 1) {
            return view('client.dashboard', compact('projects', 'user'));
        }
    }
}
