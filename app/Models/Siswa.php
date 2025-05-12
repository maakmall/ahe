<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function casts(): array
    {
        return [
            'tanggal_lahir' => 'date'
        ];
    }
}
