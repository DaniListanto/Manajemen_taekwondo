<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Atlet;
use App\Models\DaftarUjian;
use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\DataTables\AtletDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class DaftarUjianController extends Controller
{
    public function index()
    {
        $dataujian = DaftarUjian::where(
            'name',

            Auth::user()->name
        )->get();
        $data = DaftarUjian::get();
        $kegiatan = DB::table('ujian')->get();
        return view(
            'atlet.ujian.index',
            compact('kegiatan', 'dataujian', 'data')
        );
    }
    public function detail()
    {
        $ujian = Ujian::get();
        $daftarujian = DaftarUjian::with(['ujian'])->get();
        return view(
            'admin/ujian/detaildaftar',
            compact('daftarujian', 'ujian')
        );
    }
    public function create()
    {
        $daftarujian = Atlet::where('user_id', Auth::user()->id)->get();
        $atlet = Atlet::where(
            'name',

            Auth::user()->name
        )->get();
        // mendefinisikan ($kegiatan) data kegiatan di tabel pendafatran, sehingga didapatkan (var_kegiatan)
        $kegiatan = DB::table('ujian')->get();
        return view(
            'atlet.ujian.create',
            ['var_kegiatan' => $kegiatan],
            compact('atlet', 'kegiatan', 'daftarujian')
        );
    }

    //form dafatar kegiatan
    public function store(Request $req)
    {
        $daftarujian = Atlet::where('user_id', Auth::user()->id)->get();
        $atlet = Atlet::where(
            'name',

            Auth::user()->name
        )->get();
        $tgl = Carbon::now();
        $name = $req->name;
        $tgl_daftar = $tgl;
        $tgl_lahir = $req->tgl_lahir;
        $tingkat_sabuk = $req->tignkat_sabuk;
        $sabuk = $req->sabuk;
        $kegiatan = $req->keg;
        $kegiatan_id = $req->ujian_id;

        $kegiatan = DB::table('ujian')
            ->where('id', '=', $kegiatan_id)
            ->get();

        // ubah variabel kegiatan menjadi array
        $kegiatan = $kegiatan->toArray();
        if ($kegiatan[0]->sisa >= $kegiatan[0]->kuota) {
            Alert::error('Gagal', 'Kuota Sudah Penuh');
            return redirect()->back();
        }
        //input kedatabase
        else {
            DB::table('daftarujian')->insert([
                'name' => $name,
                'tgl_lahir' => $tgl_lahir,
                'tgl_daftar' => $tgl_daftar,
                'sabuk' => $sabuk,
                'tingkat_sabuk' => $tingkat_sabuk,
                'ujian_id' => $kegiatan_id,
            ]);
            $row = DB::table('daftarujian')
                ->where('ujian_id', '=', $kegiatan[0]->id)
                ->get();
            $hitung = count($row);

            // update data dan sisa pada tabel kegiatan
            DB::table('ujian')
                ->where('id', '=', $kegiatan_id)
                ->update(['sisa' => $hitung]);

            // allert dan redirect ke tabel daftar kegiatan
            $kegiatan = DB::table('ujian')->get();
            Alert::success('Sukses', 'Data Berhasil Ditambahkan');
            return redirect()->route('daftarujian.index');
        }
    }

    public function print(Request $request)
    {
        $data = DaftarUjian::get();
        $tanggal = $request->validate([
            'tanggal_daftar' => 'required',
        ]);

        $data['daftarujian'] = DaftarUjian::with(['atlet'])
            ->where('tgl_daftar', $tanggal)
            ->get();

        if ($data['daftarujian']->count() > 0) {
            $pdf = PDF::loadView('admin.ujian.print', $data);
            return $pdf->stream(
                'Daftar-Atlet-Ujian' .
                    Carbon::parse($request->tanggal_daftar)->format('d-m-Y') .
                    '-' .
                    '.pdf'
            );
        } else {
            return back()->with('error');
        }
    }
}