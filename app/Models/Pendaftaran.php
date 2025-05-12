<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    public $timestamps = false;
    protected $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    public function casts(): array
    {
        return [
            'tanggal' => 'datetime'
        ];
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function pendaftaranJadwal(): HasMany
    {
        return $this->hasMany(PendaftaranJadwal::class, 'id_pendaftaran');
    }

    public function jadwal(): HasManyThrough
    {
        return $this->hasManyThrough(
            Jadwal::class,
            PendaftaranJadwal::class,
            'id_pendaftaran', // Foreign key di tabel tengah (pendaftaran_jadwal)
            'id',             // Foreign key di tabel target (jadwal)
            'id',             // Local key di tabel asal (pendaftaran)
            'id_jadwal'       // Local key di tabel tengah (pendaftaran_jadwal)
        );
    }

    #[Scope]
    public function initial(Builder $query): void
    {
        $query->where('daftar_ulang', false);
    }

    #[Scope]
    public function reregister(Builder $query): void
    {
        $query->where('daftar_ulang', true);
    }

    #[Scope]
    public function pending(Builder $query): void
    {
        $query->where('status', 'Pending');
    }
}
