<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use App\Models\Atlet;
use App\Models\User;
use App\Models\Petugas;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasi';
    protected $fillable = [
        'id',
        'image',
        'name',
        'nama_kejuaraan',
        'tingkat',
        'kelas',
        'kategori',
        'perolehan',
        'tgl_acara',
        'lokasi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
    public function atlet()
    {
        return $this->belongsTo(Atlet::class);
    }
}