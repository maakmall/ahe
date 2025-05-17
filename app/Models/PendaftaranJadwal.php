<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranJadwal extends Model
{
    protected $table = 'pendaftaran_jadwal';
    public $timestamps = false;

    protected $guarded = ['id'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}
