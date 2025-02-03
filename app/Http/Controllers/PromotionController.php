<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index() {
        $user = auth()->user();
        if ($user->role == 2) {
            return view('admin.promotions');
        } elseif($user->role == 1) {
            return view('client.promotions');
        }
    }
}
