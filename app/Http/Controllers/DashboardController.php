<?php

namespace App\Http\Controllers;

use App\Models\{User};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = User::count();
        return view('dashboard.dashboard', [
            'user' => $user,
        ]);
    }
}
