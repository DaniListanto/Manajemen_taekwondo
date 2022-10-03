<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\KasMasuk;

class KasMasuk extends Model
{
    public $timestamps = false;
    protected $table = 'kasmasuk';
    protected $fillable = ['id', 'tanggal', 'keterangan', 'jumlah'];

    public function kaskeluar()
    {
        return $this->belongsTo(KasKeluar::class);
    }
}