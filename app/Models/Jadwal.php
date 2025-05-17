<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    public $timestamps = false;

    protected $fillable = ['hari', 'jam'];

    public function pendaftaranJadwal()
    {
        return $this->hasMany(PendaftaranJadwal::class, 'id_jadwal');
    }
}
