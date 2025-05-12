<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

class Cuti extends Model
{
    protected $table = 'cuti';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function casts(): array
    {
        return [
            'mulai_tanggal' => 'date',
            'sampai_tanggal' => 'date',
            'tanggal_dibuat' => 'datetime'
        ];
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    #[Scope]
    public function pending(Builder $query): void
    {
        $query->where('status', 'Pending');
    }
}
