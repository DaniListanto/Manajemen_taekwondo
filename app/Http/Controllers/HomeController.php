<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atlet;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function index()
    {
        $reguler = DB::table('atlet')
            ->where('kelas', 'reguler')
            ->count();
        $poomsae = DB::table('atlet')
            ->where('kelas', 'poomsae')
            ->count();
        $kyorugi = DB::table('atlet')
            ->where('kelas', 'kyorugi')
            ->count();

        $atlet = Atlet::where('user_id', \Auth::user()->id)->first();

        $user_id = \Auth::user()->id;

        $cek = Atlet::where('id', $user_id)->count();
        if ($cek < 1) {
            $pesan = 'Harap Melengkapi Biodata Terlebih Dahulu';
        } else {
            $pesan = 'Biodata Anda Sudah Dilengkapi.. Terima Kasih';
        }
        return view(
            'home',
            [
                'total_kyorugi' => DB::table('atlet')
                    ->where('kelas', 'kyorugi')
                    ->count(),
                'total_poomsae' => DB::table('atlet')
                    ->where('kelas', 'poomsae')
                    ->count(),
                'total_reguler' => DB::table('atlet')
                    ->where('kelas', 'reguler')
                    ->count(),
            ],
            compact(
                'atlet',
                'pesan',
                'user_id',
                'cek',
                'poomsae',
                'reguler',
                'kyorugi'
            )
        );
    }
}