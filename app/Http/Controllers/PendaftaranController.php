<?php

namespace App\Http\Controllers;

use App\Mail\PendaftaranStatusMail;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Models\PendaftaranJadwal;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PendaftaranController extends Controller
{
    public function index(): View
    {
        return view('pendaftaran.index', [
            'title' => 'Pendaftaran',
            'registrations' => Pendaftaran::with('siswa')->initial()->orderByDesc('tanggal')->get()
        ]);
    }

    public function show(Pendaftaran $pendaftaran): View
    {
        return view('pendaftaran.show', [
            'title' => 'Detail Pendaftaran',
            'registration' => $pendaftaran
        ]);
    }

    public function create(): View
    {
        return view('pendaftaran.create', [
            'title' => 'Tambah Pendaftaran',
            'hours' => Jadwal::select('jam')->distinct('jam')->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'nama_lengkap' => ['required', 'string', 'max:100'],
                'nama_panggilan' => ['required', 'string', 'max:20'],
                'jenis_kelamin' => ['required', 'in:Laki-Laki,Perempuan'],
                'tempat_lahir' => ['required', 'string', 'max:50'],
                'tanggal_lahir' => ['required', 'date'],
                'nama_orang_tua' => ['required', 'string', 'max:100'],
                'kelas' => ['required', 'string', 'max:15'],
                'sekolah' => ['required', 'string', 'max:50'],
                'no_wa' => ['required', 'string', 'max:15'],
                'email' => ['required', 'email', 'max:50'],
                'alamat' => ['required', 'string'],
                'info' => ['nullable', 'in:Teman,Media Sosial,Brosur,Lainnya'],
                'metode_pembayaran' => ['required', 'in:Dana,Transfer,QRIS'],
                'bukti_pembayaran' => ['nullable', 'image', 'max:2048'],
                'hari' => ['required', 'in:Senin Rabu Jumat,Selasa Kamis Sabtu'],
                'jam' => ['required', 'array'],
                'jam.*' => ['required', 'string'],
            ],
            [
                'nama_lengkap.required' => 'Nama lengkap wajib diisi',
                'nama_panggilan.required' => 'Nama panggilan wajib diisi',
                'jenis_kelamin.required' => 'Pilih jenis kelamin dulu ya',
                'tempat_lahir.required' => 'Tempat lahir wajib diisi',
                'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
                'nama_orang_tua.required' => 'Nama orang tua wajib diisi',
                'kelas.required' => 'Isi kelas lo sekarang',
                'sekolah.required' => 'Nama sekolah wajib diisi',
                'no_wa.required' => 'Nomor WA wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'alamat.required' => 'Alamat rumah harus diisi',
                'metode_pembayaran.required' => 'Pilih metode pembayarannya dulu',
                'hari.required' => 'Hari bimbel harus dipilih',
                'jam.required' => 'Pilih jam bimbel minimal satu',
                'jam.*.required' => 'Jam bimbel tidak boleh kosong',
                'bukti_pembayaran.image' => 'Bukti pembayaran harus JPG atau PNG',
                'bukti_pembayaran.max' => 'Ukuran bukti pembayaran maksimal 2MB ya.',
            ]
        );

        DB::beginTransaction();
        try {
            // 1. Insert siswa
            $siswa = Siswa::create([
                'nama_lengkap'     => $request->nama_lengkap,
                'nama_panggilan'   => $request->nama_panggilan,
                'jenis_kelamin'    => $request->jenis_kelamin,
                'tempat_lahir'     => $request->tempat_lahir,
                'tanggal_lahir'    => $request->tanggal_lahir,
                'kelas'            => $request->kelas,
                'sekolah'          => $request->sekolah,
                'nama_orang_tua'   => $request->nama_orang_tua,
                'alamat'           => $request->alamat,
                'no_wa'            => $request->no_wa,
                'email'            => $request->email,
            ]);

            // 2. Buat ID unik buat pendaftaran
            $prefix = 'PN';
            $today = Carbon::now()->format('dmY');

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

            // 3. Handle upload file
            $buktiPembayaranPath = null;
            if ($request->hasFile('bukti_pembayaran')) {
                $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti-pembayaran', 'public');
            }

            // 4. Insert pendaftaran
            $pendaftaran = Pendaftaran::create([
                'id'                => $pendaftaranId,
                'id_siswa'          => $siswa->id,
                'metode_pembayaran' => $request->metode_pembayaran,
                'bukti_pembayaran'  => $buktiPembayaranPath,
                'tanggal'           => Carbon::now(),
                'info'              => $request->info,
            ]);

            // 4. Cek & Insert jadwal yg dipilih
            $jadwals = Jadwal::where('hari', $request->hari)
                ->whereIn('jam', $request->jam)
                ->get();

            foreach ($jadwals as $jadwal) {
                PendaftaranJadwal::create([
                    'id_pendaftaran' => $pendaftaran->id,
                    'id_jadwal' => $jadwal->id,
                ]);
            }

            DB::commit();

            return redirect()
                ->route('registration')
                ->with('success', 'Pendaftaran berhasil ditambah');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function edit(Pendaftaran $pendaftaran): View
    {
        $jadwals = $pendaftaran->jadwal;
        $selectedHari = $jadwals->first()?->hari;
        $selectedJam = $jadwals->pluck('jam')->toArray();

        return view('pendaftaran.edit', [
            'title' => 'Edit Pendaftaran',
            'registration' => $pendaftaran,
            'hours' => Jadwal::select('jam')->distinct('jam')->get(),
            'selectedHari' => $selectedHari,
            'selectedJam' => $selectedJam,
        ]);
    }

    public function update(Request $request, Pendaftaran $pendaftaran): RedirectResponse
    {
        $request->validate(
            [
                'nama_lengkap' => ['required', 'string', 'max:100'],
                'nama_panggilan' => ['required', 'string', 'max:20'],
                'jenis_kelamin' => ['required', 'in:Laki-Laki,Perempuan'],
                'tempat_lahir' => ['required', 'string', 'max:50'],
                'tanggal_lahir' => ['required', 'date'],
                'nama_orang_tua' => ['required', 'string', 'max:100'],
                'kelas' => ['required', 'string', 'max:15'],
                'sekolah' => ['required', 'string', 'max:50'],
                'no_wa' => ['required', 'string', 'max:15'],
                'email' => ['required', 'email', 'max:50'],
                'alamat' => ['required', 'string'],
                'info' => ['nullable', 'in:Teman,Media Sosial,Brosur,Lainnya'],
                'metode_pembayaran' => ['required', 'in:Dana,Transfer,QRIS'],
                'bukti_pembayaran' => ['nullable', 'image', 'max:2048'],
                'hari' => ['required', 'in:Senin Rabu Jumat,Selasa Kamis Sabtu'],
                'jam' => ['required', 'array'],
                'jam.*' => ['required', 'string'],
            ],
            [
                'nama_lengkap.required' => 'Nama lengkap wajib diisi',
                'nama_panggilan.required' => 'Nama panggilan wajib diisi',
                'jenis_kelamin.required' => 'Pilih jenis kelamin dulu ya',
                'tempat_lahir.required' => 'Tempat lahir wajib diisi',
                'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
                'nama_orang_tua.required' => 'Nama orang tua wajib diisi',
                'kelas.required' => 'Isi kelas lo sekarang',
                'sekolah.required' => 'Nama sekolah wajib diisi',
                'no_wa.required' => 'Nomor WA wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'alamat.required' => 'Alamat rumah harus diisi',
                'metode_pembayaran.required' => 'Pilih metode pembayarannya dulu',
                'hari.required' => 'Hari bimbel harus dipilih',
                'jam.required' => 'Pilih jam bimbel minimal satu',
                'jam.*.required' => 'Jam bimbel tidak boleh kosong',
                'bukti_pembayaran.image' => 'Bukti pembayaran harus JPG atau PNG',
                'bukti_pembayaran.max' => 'Ukuran bukti pembayaran maksimal 2MB ya.',
            ]
        );

        DB::beginTransaction();
        try {
            // 1. Update data siswa
            $pendaftaran->siswa->update([
                'nama_lengkap'     => $request->nama_lengkap,
                'nama_panggilan'   => $request->nama_panggilan,
                'jenis_kelamin'    => $request->jenis_kelamin,
                'tempat_lahir'     => $request->tempat_lahir,
                'tanggal_lahir'    => $request->tanggal_lahir,
                'kelas'            => $request->kelas,
                'sekolah'          => $request->sekolah,
                'nama_orang_tua'   => $request->nama_orang_tua,
                'alamat'           => $request->alamat,
                'no_wa'            => $request->no_wa,
                'email'            => $request->email,
            ]);

            // 2. Handle file bukti pembayaran (optional)
            $buktiPembayaranPath = $pendaftaran->bukti_pembayaran;
            if ($request->hasFile('bukti_pembayaran')) {
                // hapus yang lama
                if ($buktiPembayaranPath && Storage::disk('public')->exists($buktiPembayaranPath)) {
                    Storage::disk('public')->delete($buktiPembayaranPath);
                }
                // simpan baru
                $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti-pembayaran', 'public');
            }

            // 3. Update data pendaftaran
            $pendaftaran->update([
                'metode_pembayaran' => $request->metode_pembayaran,
                'bukti_pembayaran'  => $buktiPembayaranPath,
                'info'              => $request->info,
            ]);

            // 4. Update relasi jadwal
            $jadwals = Jadwal::where('hari', $request->hari)
                ->whereIn('jam', $request->jam)
                ->get();

            // Delete semua dulu, baru insert ulang (biar aman)
            PendaftaranJadwal::where('id_pendaftaran', $pendaftaran->id)->delete();

            foreach ($jadwals as $jadwal) {
                PendaftaranJadwal::create([
                    'id_pendaftaran' => $pendaftaran->id,
                    'id_jadwal' => $jadwal->id,
                ]);
            }

            DB::commit();

            return redirect()
                ->route('registration')
                ->with('success', 'Pendaftaran berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Pendaftaran gagal diperbarui');
        }
    }


    public function approve(Pendaftaran $pendaftaran): RedirectResponse
    {
        $pendaftaran->update(['status' => 'Diterima']);
        $pendaftaran->siswa->update(['status' => 'Aktif']);
        return back()->with('success', 'Pendaftaran diterima');
    }

    public function reject(Pendaftaran $pendaftaran): RedirectResponse
    {
        $pendaftaran->update(['status' => 'Ditolak']);
        return back()->with('success', 'Pendaftaran ditolak');
    }

    public function sendEmail(Pendaftaran $pendaftaran): RedirectResponse
    {
        Mail::to($pendaftaran->siswa->email)->send(new PendaftaranStatusMail($pendaftaran));

        return back()->with('success', 'Email berhasil dikirim');
    }

    public function destroy(Pendaftaran $pendaftaran): RedirectResponse
    {
        DB::beginTransaction();
        try {
            // Hapus bukti pembayaran
            if ($pendaftaran->bukti_pembayaran && Storage::disk('public')->exists($pendaftaran->bukti_pembayaran)) {
                Storage::disk('public')->delete($pendaftaran->bukti_pembayaran);
            }

            // Hapus pendaftaran, siswa, dan jadwal
            $pendaftaran->siswa()->delete();

            DB::commit();
            return redirect()
                ->route('registration')
                ->with('success', 'Pendaftaran berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Pendaftaran gagal dihapus');
        }
    }
}
