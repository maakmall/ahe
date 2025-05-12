<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Status Pendaftaran Bimbel</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 700px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #0d6efd;
            color: white;
            padding: 15px 25px;
            border-radius: 8px 8px 0 0;
        }
        .header h2 {
            margin: 0;
        }
        h4 {
            margin-top: 30px;
            color: #0d6efd;
        }
        ul {
            padding-left: 20px;
        }
        .footer {
            margin-top: 40px;
            font-size: 0.9em;
            color: #777;
            text-align: center;
        }
        .btn {
            display: inline-block;
            background-color: #0d6efd;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .status-box {
            padding: 10px 15px;
            background-color: #e7f1ff;
            border-left: 5px solid #0d6efd;
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>Notifikasi Status Pendaftaran {{ $pendaftaran->daftar_ulang ? 'Ulang' : '' }}</h2>
        </div>

        <p>Yth. {{ $pendaftaran->siswa->nama_orang_tua }},</p>

        <p>Dengan hormat,</p>

        <p>
            Kami informasikan bahwa pendaftaran atas nama <strong>{{ $pendaftaran->siswa->nama_lengkap }}</strong>
            telah <span style="text-transform: lowercase;"><strong>{{ $pendaftaran->status }}</strong></span>.
        </p>

        <div class="status-box">
            Status Pendaftaran: {{ $pendaftaran->status }}
        </div>

        <h4>📋 Data Siswa</h4>
        <ul>
            <li>Nama Lengkap: {{ $pendaftaran->siswa->nama_lengkap }}</li>
            <li>Nama Panggilan: {{ $pendaftaran->siswa->nama_panggilan }}</li>
            <li>Jenis Kelamin: {{ $pendaftaran->siswa->jenis_kelamin }}</li>
            <li>Tempat & Tanggal Lahir: {{ $pendaftaran->siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->siswa->tanggal_lahir)->translatedFormat('d M Y') }}</li>
            <li>Kelas: {{ $pendaftaran->siswa->kelas }}</li>
            <li>Asal Sekolah: {{ $pendaftaran->siswa->sekolah }}</li>
            <li>Alamat: {{ $pendaftaran->siswa->alamat }}</li>
            <li>No. WhatsApp: {{ $pendaftaran->siswa->no_wa }}</li>
            <li>Email: {{ $pendaftaran->siswa->email }}</li>
        </ul>

        <h4>📝 Informasi Pendaftaran</h4>
        <ul>
            <li>Tanggal: {{ $pendaftaran->tanggal->translatedFormat('d M Y H:i') }}</li>
            <li>Metode Pembayaran: {{ $pendaftaran->metode_pembayaran }}</li>
            <li>Info Dari: {{ $pendaftaran->info ?? 'Tidak diisi' }}</li>
            @if($pendaftaran->daftar_ulang)
                <li>Keterangan: Daftar Ulang</li>
            @endif
        </ul>

        <h4>🕒 Jadwal Bimbingan</h4>
        @if ($pendaftaran->jadwal->count())
            <ul>
                @foreach ($pendaftaran->jadwal as $jadwal)
                    <li>{{ $jadwal->hari }} - {{ $jadwal->jam }}</li>
                @endforeach
            </ul>
        @elseif(isset($schedules) && $schedules->jadwal->isNotEmpty())
            <ul>
                @foreach ($schedules->jadwal as $jadwal)
                    <li>{{ $jadwal->hari }} - {{ $jadwal->jam }}</li>
                @endforeach
            </ul>
        @else
            <p><em>Belum ada jadwal yang dipilih.</em></p>
        @endif

        <p>Terima kasih atas kepercayaan Bapak/Ibu kepada layanan bimbingan belajar kami. Jika Bapak/Ibu memiliki pertanyaan lebih lanjut, silakan hubungi admin kami melalui WhatsApp.</p>

        {{-- <a href="https://wa.me/628xxxxxx" class="btn">Hubungi Admin</a> --}}

        <div class="footer">
            <p>© {{ now()->year }} Bimbingan Belajar Ahe. Semua Hak Dilindungi.</p>
        </div>
    </div>
</body>
</html>
