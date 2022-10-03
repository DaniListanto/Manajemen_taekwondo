<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prestasi;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Petugas;
use App\Models\Pembayaran;

class Atlet extends Model
{
    use HasFactory;

    protected $table = 'atlet';

    protected $fillable = [
        'user_id',
        'kode_atlet',
        'nia',
        'image',
        'name',
        'tgl_registrasi',
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'bb',
        'tb',
        'no_telepon',
        'tingkat_sabuk',
        'kelas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
    public function atlet()
    {
        return $this->hasMany(Atlet::class);
    }
}