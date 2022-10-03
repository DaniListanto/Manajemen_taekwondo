<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KasMasuk;
use App\Models\KasKeluar;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kas_keluar = KasKeluar::get();
        $jumlahkeluar = 0;
        foreach ($kas_keluar as $item => $value) {
            // simpan nilai harga ke variabel $harga_total
            $jumlahkeluar += $value['jumlah'];
        }

        $kas_masuk = KasMasuk::get();
        $jumlahmasuk = 0;
        foreach ($kas_masuk as $item => $value) {
            // simpan nilai harga ke variabel $harga_total
            $jumlahmasuk += $value['jumlah'];
        }

        $data_saldo = KasMasuk::with(['KasKeluar'])->get();
        $saldo = $jumlahmasuk - $jumlahkeluar;

        return view(
            'admin.kas.saldo.index',
            compact(
                'saldo',
                'jumlahmasuk',
                'jumlahkeluar',
                'kas_masuk',
                'kas_keluar',
                'data_saldo'
            )
        );
    }
    public function printpdf()
    {
        $kas_keluar = KasKeluar::get();
        $jumlahkeluar = 0;
        foreach ($kas_keluar as $item => $value) {
            // simpan nilai harga ke variabel $harga_total
            $jumlahkeluar += $value['jumlah'];
        }

        $kas_masuk = KasMasuk::get();
        $jumlahmasuk = 0;
        foreach ($kas_masuk as $item => $value) {
            // simpan nilai harga ke variabel $harga_total
            $jumlahmasuk += $value['jumlah'];
        }

        $data_saldo = KasMasuk::with(['KasKeluar'])->get();
        $saldo = $jumlahmasuk - $jumlahkeluar;
        $pdf = PDF::loadView(
            'admin.kas.saldo.laporanpdf',
            compact(
                'saldo',
                'jumlahmasuk',
                'jumlahkeluar',
                'kas_masuk',
                'kas_keluar',
                'data_saldo'
            )
        );
        return $pdf
            ->setPaper('a4', 'potrait')
            ->download('data_saldo' . '_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}