<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
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

        return view('admin.dashboard', [
            'total_kyorugi' => DB::table('atlet')
                ->where('kelas', 'kyorugi')
                ->count(),
            'total_poomsae' => DB::table('atlet')
                ->where('kelas', 'poomsae')
                ->count(),
            'total_reguler' => DB::table('atlet')
                ->where('kelas', 'reguler')
                ->count(),
            'total_admin' => DB::table('model_has_roles')
                ->where('role_id', 1)
                ->count(),
            'total_petugas' => DB::table('petugas')->count(),
            'reguler' => $reguler,
            'poomsae' => $poomsae,
            'kyorugi' => $kyorugi,
        ]);
    }
}