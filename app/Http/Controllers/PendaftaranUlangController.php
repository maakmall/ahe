<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PendaftaranUlangController extends Controller
{
    public function index(): View
    {
        return view('pendaftaran-ulang.index', [
            'title' => 'Pendaftaran Ulang',
            'registrations' => Pendaftaran::with('siswa')
                ->reregister()
                ->orderByDesc('tanggal')
                ->get()
        ]);
    }

    public function store(Request $request) {}
}
