<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Siswa;
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

    public function leave()
    {
        return view('leave', [
            'title' => 'Pengajuan Cuti',
            'siswaList' => Siswa::where('status', 'Aktif')->get()
        ]);
    }

    public function reregister()
    {
        return view('reregister', [
            'title' => 'Pendaftaran Ulang',
            'siswaList' => Siswa::all()
        ]);
    }

    public function getStudent($id)
    {
        $siswa = Siswa::findOrFail($id);

        return response()->json($siswa);
    }

    public function searchStudent(Request $request)
    {
        $search = $request->get('q', '');

        $siswa = Siswa::where(function ($query) use ($search) {
            $query->where('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('nama_panggilan', 'like', "%{$search}%")
                ->orWhere('kelas', 'like', "%{$search}%");
        })->limit(10);

        if ($request->boolean('reregister') == true) {
            $siswa->where('status', 'Non Aktif');
        } else {
            $siswa->where('status', 'Aktif');
        }

        return response()->json($siswa->get(['id', 'nama_lengkap', 'nama_panggilan', 'jenis_kelamin', 'kelas']));
    }
}
