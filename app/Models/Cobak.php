<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Atlet;

class Cobak extends Model
{
    use HasFactory;
    protected $table = 'cobak';

    protected $fillable = ['image', 'nama', 'jenis'];

    public function siswa()
    {
        return $this->hasMany(Atlet::class);
    }
}