<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManualController extends Controller
{
    public function index() {
        $user = auth()->user();
        if ($user->role == 2) {
            return view('admin.manual');
        } else {
            return redirect()->route('dashboard'); // Fixed redirection
        }
        
    }
}
