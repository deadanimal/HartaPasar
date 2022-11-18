<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class WebController extends Controller
{
    public function home(Request $request) {
        return view('home');
    }

    public function dashboard(Request $request) {
        return view('dashboard');
    }  
    
    public function view_trader(Request $request) {
        $name = $request->route('name');
        $trader = User::where('public_name', $name)->first();
        return view('trader', compact('trader'));
    }
}
