<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|confirmed',
        ]);

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