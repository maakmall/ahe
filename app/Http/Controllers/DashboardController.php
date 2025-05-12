<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $student = Siswa::select('status')->get();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'quote' => Inspiring::quotes()->random(),
            'student' => $student->count(),
            'activeStudent' => $student->where('status', 'Aktif')->count(),
            'inactiveStudent' => $student->where('status', 'Non Aktif')->count(),
        ]);
    }

    public function profile(Request $request): View
    {
        return view('dashboard.profile', [
            'title' => 'Profil',
            'user' => $request->user(),
        ]);
    }

    public function saveProfile(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:50',
                'password' => 'nullable|string|confirmed',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'name.string' => 'Nama harus berupa string',
                'name.max' => 'Nama tidak boleh lebih dari 100 karakter',
                'email.email' => 'Format email tidak valid',
                'email.max' => 'Email tidak boleh lebih dari 50 karakter',
                'email.required' => 'Email tidak boleh kosong',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
            ]
        );

        if ($validated['password']) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $request->user()->update($validated);

        return redirect()
            ->route('profile')
            ->with('success', 'Profile berhasil diperbarui');
    }
}
