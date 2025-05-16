<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', ['title' => 'Selamat Datang']);
    }

    public function register()
    {
        return view('register', [
            'title' => 'Pendaftaran',
            'hours' => Jadwal::select('jam')->distinct('jam')->get()
        ]);
    }
}
