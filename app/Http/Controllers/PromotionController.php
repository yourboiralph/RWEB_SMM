<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index() {
        $user = auth()->user();
        if ($user->role == 2) {
            return view('admin.promotions');
        } else {
            return redirect()->route('dashboard'); // Fixed redirection
        }
    }
}
