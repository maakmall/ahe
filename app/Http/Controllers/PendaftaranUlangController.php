<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
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

    public function show(Pendaftaran $pendaftaran): View
    {
        $schedules = Pendaftaran::with('jadwal')
            ->initial()
            ->where('id_siswa', $pendaftaran->id_siswa)
            ->first();

        return view('pendaftaran.show', [
            'title' => 'Detail Pendaftaran Ulang',
            'registration' => $pendaftaran,
            'schedules' => $schedules
        ]);
    }

    public function create(): View
    {
        return view('pendaftaran-ulang.create', [
            'title' => 'Pendaftaran Ulang',
            'students' => Siswa::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'id_siswa' => 'required|exists:siswa,id',
                'metode_pembayaran' => ['required', 'in:Dana,Transfer,QRIS'],
                'bukti_pembayaran' => ['required_if:from_front,1', 'image', 'max:2048'],
                'surat_cuti' => ['required_if:from_front,1', 'file', 'max:2048'],
            ],
            [
                'id_siswa.required' => 'Siswa belum dipilih',
                'id_siswa.exists' => 'Siswa tidak valid',
                'metode_pembayaran.required' => 'Pilih metode pembayarannya dulu',
                'metode_pembayaran.in' => 'Metode pembayaran tidak valid',
                'bukti_pembayaran.required_if' => 'Bukti pembayaran harus diisi',
                'bukti_pembayaran.image' => 'Bukti pembayaran harus JPG atau PNG',
                'bukti_pembayaran.max' => 'Ukuran bukti pembayaran maksimal 2MB',
                'surat_cuti.required_if' => 'Surat cuti harus diisi',
                'surat_cuti.file' => 'Surat cuti harus berupa format file',
                'surat_cuti.max' => 'Ukuran surat cuti maksimal 2MB',
            ]
        );

        $now = Carbon::now();

        $isStudentLeave = Cuti::where('id_siswa', $validated['id_siswa'])
            ->where('status', '!=', 'Pending')
            ->whereDate('mulai_tanggal', '<=', $now)
            ->whereDate('sampai_tanggal', '>=', $now)
            ->exists();

        if (!$isStudentLeave) {
            return back()
                ->withInput()
                ->with('error', 'Siswa tidak sedang cuti');
        }

        $buktiPembayaranPath = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti-pembayaran');
        }

        $suratCutiPath = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $suratCutiPath = $request->file('surat_cuti')->store('surat-cuti');
        }

        $prefix = 'DU';
        $today = $now->format('dmY');

        $last = Pendaftaran::where('id', 'like', "{$prefix}{$today}%")
            ->orderBy('id', 'desc')
            ->first();

        $lastNumber = 0;
        if ($last) {
            // Ambil 3 digit terakhir dari ID sebelumnya
            $lastNumber = intval(substr($last->id, -3));
        }

        $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $pendaftaranId = $prefix . $today . $nextNumber;

        $validated['id'] = $pendaftaranId;
        $validated['daftar_ulang'] = true;
        $validated['bukti_pembayaran'] = $buktiPembayaranPath;
        $validated['surat_cuti'] = $suratCutiPath;

        Pendaftaran::create($validated);

        $route = $request->from_front ? 'home.reregister': 'reregistration';

        return redirect()
            ->route($route)
            ->with('success', 'Pendaftaran ulang berhasil');
    }

    public function edit(Pendaftaran $pendaftaran): View
    {
        return view('pendaftaran-ulang.edit', [
            'title' => 'Edit Pendaftaran Ulang',
            'students' => Siswa::all(),
            'registration' => $pendaftaran
        ]);
    }

    public function update(Request $request, Pendaftaran $pendaftaran): RedirectResponse
    {
        $validated = $request->validate(
            [
                'id_siswa' => 'required|exists:siswa,id',
                'metode_pembayaran' => ['required', 'in:Dana,Transfer,QRIS'],
                'bukti_pembayaran' => ['nullable', 'image', 'max:2048'],
                'surat_cuti' => ['nullable', 'file', 'max:2048'],
            ],
            [
                'id_siswa.required' => 'Siswa belum dipilih',
                'id_siswa.exists' => 'Siswa tidak valid',
                'metode_pembayaran.required' => 'Pilih metode pembayarannya dulu',
                'metode_pembayaran.in' => 'Metode pembayaran tidak valid',
                'bukti_pembayaran.image' => 'Bukti pembayaran harus JPG atau PNG',
                'bukti_pembayaran.max' => 'Ukuran bukti pembayaran maksimal 2MB',
                'surat_cuti.file' => 'Surat cuti harus berupa format file',
                'surat_cuti.max' => 'Ukuran surat cuti maksimal 2MB',
            ]
        );

        // Handle file bukti pembayaran (optional)
        $buktiPembayaranPath = $pendaftaran->bukti_pembayaran;
        if ($request->hasFile('bukti_pembayaran')) {
            // hapus yang lama
            if ($buktiPembayaranPath && Storage::disk()->exists($buktiPembayaranPath)) {
                Storage::disk()->delete($buktiPembayaranPath);
            }
            // simpan baru
            $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti-pembayaran');
        }

        // Handle file surat cuti (optional)
        $suratCutiPath = $pendaftaran->surat_cuti;
        if ($request->hasFile('surat_cuti')) {
            // hapus yang lama
            if ($suratCutiPath && Storage::disk()->exists($suratCutiPath)) {
                Storage::disk()->delete($suratCutiPath);
            }
            // simpan baru
            $suratCutiPath = $request->file('surat_cuti')->store('surat-cuti');
        }

        $validated['bukti_pembayaran'] = $buktiPembayaranPath;
        $validated['surat_cuti'] = $suratCutiPath;

        $pendaftaran->update($validated);

        return redirect()
            ->route('reregistration')
            ->with('success', 'Pendaftaran ulang berhasil diperbarui');
    }

    public function destroy(Pendaftaran $pendaftaran): RedirectResponse
    {
        if ($pendaftaran->bukti_pembayaran && Storage::disk()->exists($pendaftaran->bukti_pembayaran)) {
            Storage::disk()->delete($pendaftaran->bukti_pembayaran);
        }

        if ($pendaftaran->surat_cuti && Storage::disk()->exists($pendaftaran->surat_cuti)) {
            Storage::disk()->delete($pendaftaran->surat_cuti);
        }

        $pendaftaran->delete();

        return redirect()
            ->route('reregistration')
            ->with('success', 'Pendaftaran ulang berhasil dihapus');
    }
}
