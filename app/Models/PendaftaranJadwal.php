<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranJadwal extends Model
{
    protected $table = 'pendaftaran_jadwal';
    public $timestamps = false;

    protected $guarded = ['id'];
}
