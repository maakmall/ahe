<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Cuti {{ $leave->siswa->nama_lengkap }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 25px;
        }

        .card-title {
            font-size: 20pt;
            margin-bottom: 0;
        }

        table {
            padding-right: 70px;
            padding-left: 70px;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .mb-5 {
            margin-bottom: 1.5em;
        }

        .mb-7 {
            margin-bottom: 5em;
        }

    </style>
</head>
<body>
    <h1 class="card-title text-center mb-5">Surat Cuti</h1>

    <table width="100%" class="mb-5">
        <tr>
            <td class="text-dark pb-3"><b>Nama Lengkap</b></td>
            <td class="pb-3">
                <span class="text-dark fw-bold">:</span>
                {{ $leave->siswa->nama_lengkap }}
            </td>
        </tr>
        <tr>
            <td class="text-dark pb-3"><b>Nama Panggilan</b></td>
            <td class="pb-3">
                <span class="text-dark fw-bold">:</span>
                {{ $leave->siswa->nama_panggilan }}
            </td>
        </tr>
        <tr>
            <td class="text-dark pb-3"><b>Jenis Kelamin</b></td>
            <td class="pb-3">
                <span class="text-dark fw-bold">:</span>
                {{ $leave->siswa->jenis_kelamin }}
            </td>
        </tr>
        <tr>
            <td class="text-dark pb-3"><b>Kelas</b></td>
            <td class="pb-3">
                <span class="text-dark fw-bold">:</span>
                {{ $leave->siswa->kelas }}
            </td>
        </tr>
        <tr>
            <td class="text-dark pb-3"><b>No. WhatsApp</b></td>
            <td class="pb-3">
                <span class="text-dark fw-bold">:</span>
                {{ $leave->siswa->no_wa }}
            </td>
        </tr>
        <tr>
            <td class="text-dark pb-3"><b>Alamat</b></td>
            <td class="pb-3">
                <span class="text-dark fw-bold">:</span>
                {{ $leave->siswa->alamat }}
            </td>
        </tr>
        <tr>
            <td class="text-dark pb-3"><b>Alasan</b></td>
            <td class="pb-3">
                <span class="text-dark fw-bold">:</span>
                {{ $leave->alasan }}
            </td>
        </tr>
        <tr>
            <td class="text-dark pb-3"><b>Status</b></td>
            <td class="pb-3">
                <span class="text-dark fw-bold">:</span>
                {{ $leave->status }}
            </td>
        </tr>
    </table>

    <p class="mb-7">
        Dengan ini mengajukan izin cuti sementara dari kegiatan belajar di Bimbingan Belajar Hebat Cabang Warnasari mulai dari tanggal
        <b>{{ $leave->mulai_tanggal->isoFormat('DD MMM YYYY') }}</b> sampai dengan
        <b>{{ $leave->sampai_tanggal->isoFormat('DD MMM YYYY') }}</b>.
    </p>

    <p class="text-end">{{ $leave->tanggal_dibuat->translatedFormat('l, d F Y') }}</p>
</body>
</html>