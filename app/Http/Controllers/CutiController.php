<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class CutiController extends Controller
{
    public function index(): View
    {
        return view('cuti.index', [
            'title' => 'Cuti',
            'leaves' => Cuti::all(),
        ]);
    }

    public function show(Cuti $cuti): View
    {
        return view('cuti.show', [
            'title' => 'Detail Pengajuan Cuti',
            'leave' => $cuti
        ]);
    }

    public function create(): View
    {
        return view('cuti.create', [
            'title' => 'Ajukan Cuti',
            'students' => Siswa::all()
        ]);
    }

    public function edit(Cuti $cuti): View
    {
        return view('cuti.edit', [
            'title' => 'Ajukan Cuti',
            'students' => Siswa::all(),
            'leave' => $cuti
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'id_siswa' => 'required|exists:siswa,id',
                'mulai_tanggal' => 'required|date',
                'sampai_tanggal' => 'required|date|after:mulai_tanggal',
                'alasan' => 'required|max:100',
            ],
            [
                'id_siswa.required' => 'Siswa belum dipilih',
                'id_siswa.exists' => 'Siswa tidak valid',
                'mulai_tanggal.required' => 'Mulai tanggal harus diisi',
                'mulai_tanggal.date' => 'Mulai tanggal tidak valid',
                'sampai_tanggal.required' => 'Sampai tanggal harus diisi',
                'sampai_tanggal.date' => 'Sampai tanggal tidak valid',
                'sampai_tanggal.after' => 'Sampai tanggal harus setelah tanggal mulai',
                'alasan.required' => 'Alasan harus diisi',
                'alasan.max' => 'Alasan maksimal 100 karakter',
            ]
        );

        Cuti::create($validated);

        return redirect()->route('leave')->with('success', 'Cuti berhasil diajukan');
    }

    public function update(Request $request, Cuti $cuti): RedirectResponse
    {
        $validated = $request->validate(
            [
                'id_siswa' => 'required|exists:siswa,id',
                'mulai_tanggal' => 'required|date',
                'sampai_tanggal' => 'required|date|after:mulai_tanggal',
                'alasan' => 'required|max:100',
            ],
            [
                'id_siswa.required' => 'Siswa belum dipilih',
                'id_siswa.exists' => 'Siswa tidak valid',
                'mulai_tanggal.required' => 'Mulai tanggal harus diisi',
                'mulai_tanggal.date' => 'Mulai tanggal tidak valid',
                'sampai_tanggal.required' => 'Sampai tanggal harus diisi',
                'sampai_tanggal.date' => 'Sampai tanggal tidak valid',
                'sampai_tanggal.after' => 'Sampai tanggal harus setelah tanggal mulai',
                'alasan.required' => 'Alasan harus diisi',
                'alasan.max' => 'Alasan maksimal 100 karakter',
            ]
        );

        $cuti->update($validated);

        return redirect()->route('leave')->with('success', 'Cuti berhasil diperbarui');
    }

    public function approve(Cuti $cuti): RedirectResponse
    {
        $cuti->update(['status' => 'Disetujui']);
        return back()->with('success', 'Cuti berhasil disetujui');
    }

    public function reject(Cuti $cuti): RedirectResponse
    {
        $cuti->update(['status' => 'Ditolak']);
        return back()->with('success', 'Cuti berhasil ditolak');
    }

    public function sendEmail(): RedirectResponse
    {
        // Logic to send email
        return back()->with('success', 'Email berhasil dikirim');
    }

    public function letter(Cuti $cuti)
    {
        $pdf = Pdf::loadView('cuti.letter', [
            'leave' => $cuti
        ]);

        return $pdf->stream("Surat Cuti {$cuti->siswa->nama_panggilan}.pdf");
    }

    public function destroy(Cuti $cuti): RedirectResponse
    {
        $cuti->delete();

        return back()->with('success', 'Cuti berhasil dihapus');
    }
}
