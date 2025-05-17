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

    public function schedule()
    {
        // Ambil semua jadwal beserta siswa-siswanya
        $jadwal_senin_rabu_jumat = Jadwal::with([
            'pendaftaranJadwal.pendaftaran.siswa' => function ($query) {
                $query->where('status', 'Aktif');
            }
        ])
            ->where('hari', 'Senin Rabu Jumat')
            ->orderBy('jam')
            ->get()
            ->groupBy('jam');

        $jadwal_selasa_kamis_sabtu = Jadwal::with([
            'pendaftaranJadwal.pendaftaran.siswa' => function ($query) {
                $query->where('status', 'Aktif');
            }
        ])
            ->where('hari', 'Selasa Kamis Sabtu')
            ->orderBy('jam')
            ->get()
            ->groupBy('jam');

        return view('schedule', [
            'title' => 'Jadwal',
            'srj' => $jadwal_senin_rabu_jumat,
            'sks' => $jadwal_selasa_kamis_sabtu,
        ]);
    }
}
