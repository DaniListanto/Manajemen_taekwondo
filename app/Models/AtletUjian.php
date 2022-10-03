<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Atlet;
use App\Models\Ujian;

class AtletUjian extends Model
{
    use HasFactory;

    protected $table = 'atletujian';

    protected $fillable = [
        'id',
        'name',
        'tgl_daftar',
        'tgl_lahir',
        'sebelum',
        'sabuk',
        'ujian_id',
        'atlet_id',
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