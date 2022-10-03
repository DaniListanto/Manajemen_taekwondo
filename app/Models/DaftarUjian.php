<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Atlet;
use App\Models\Ujian;

class DaftarUjian extends Model
{
    use HasFactory;

    protected $table = 'daftarujian';

    protected $fillable = [
        'id',
        'name',
        'tingkat_sabuk',
        'tgl_lahir',
        'tgl_daftar',
        'sebelum',
        'sabuk',
        'ujian_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function atlet()
    {
        return $this->belongsTo(Atlet::class);
    }
    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}