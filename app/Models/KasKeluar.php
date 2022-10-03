<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KasMasuk;
use App\Models\KasKeluar;

class KasKeluar extends Model
{
    public $timestamps = false;
    protected $table = 'kaskeluar';
    protected $fillable = ['id', 'tanggal', 'keterangan', 'jumlah'];

    public function kasmasuk()
    {
        return $this->belongsTo(KasMasuk::class);
    }
}