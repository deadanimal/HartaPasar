<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(Request $request) {}

    public function view_all_users(Request $request) {
        $user = User::all();
    }
}
