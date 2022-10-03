<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Atlet;
use App\Models\Ujian;

class Ujian extends Model
{
    use HasFactory;

    protected $table = 'ujian';

    protected $fillable = [
        'id',
        'name',
        'tgl_ditutup',
        'tgl_ujian',
        'kuota',
        'sisa',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function atlet()
    {
        return $this->belongsTo(Atlet::class);
    }

    public function daftarujian()
    {
        return $this->belongsTo(DaftarUjian::class);
    }
}