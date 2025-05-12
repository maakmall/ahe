<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Status Pengajuan Cuti</title>
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
            background-color: #198754;
            color: white;
            padding: 15px 25px;
            border-radius: 8px 8px 0 0;
        }
        .header h2 {
            margin: 0;
        }
        h4 {
            margin-top: 30px;
            color: #198754;
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
            background-color: #198754;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .status-box {
            padding: 10px 15px;
            background-color: #e6f4ea;
            border-left: 5px solid #198754;
            margin-top: 15px;
            font-weight: bold;
        }
        .status-rejected {
            background-color: #fde2e2;
            border-left: 5px solid #dc3545;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>Notifikasi Status Pengajuan Cuti</h2>
        </div>

        <p>Yth. {{ $cuti->siswa->nama_orang_tua }},</p>

        <p>Dengan hormat,</p>

        <p>
            Kami informasikan bahwa pengajuan cuti atas nama <strong>{{ $cuti->siswa->nama_lengkap }}</strong>
            telah <strong>{{ $cuti->status }}</strong>.
        </p>

        <div class="status-box {{ $cuti->status === 'Ditolak' ? 'status-rejected' : '' }}">
            Status Cuti: {{ $cuti->status }}
        </div>

        <h4>📅 Detail Pengajuan Cuti</h4>
        <ul>
            <li>Nama Siswa: {{ $cuti->siswa->nama_lengkap }}</li>
            <li>Periode Cuti: {{ \Carbon\Carbon::parse($cuti->mulai_tanggal)->translatedFormat('d M Y') }} s/d {{ \Carbon\Carbon::parse($cuti->sampai_tanggal)->translatedFormat('d M Y') }}</li>
            <li>Alasan: {{ $cuti->alasan }}</li>
            <li>Tanggal Pengajuan: {{ \Carbon\Carbon::parse($cuti->tanggal_dibuat)->translatedFormat('d M Y H:i') }}</li>
        </ul>

        @if($cuti->status === 'Disetujui')
            <p>Silakan klik tombol di bawah untuk mengunduh surat cuti resmi:</p>
            <a href="{{ route('leave.letter', $cuti) }}" class="btn" target="_blank">📄 Unduh Surat Cuti</a>
        @endif

        @if($cuti->status === 'Ditolak')
            <p>Mohon maaf, pengajuan cuti tidak dapat disetujui. Silakan hubungi admin untuk informasi lebih lanjut.</p>
        @endif

        <p>Terima kasih atas perhatian Bapak/Ibu.</p>

        <div class="footer">
            <p>© {{ now()->year }} Bimbingan Belajar. Semua Hak Dilindungi.</p>
        </div>
    </div>
</body>
</html>
