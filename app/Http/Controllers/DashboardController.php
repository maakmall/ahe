<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }
}
