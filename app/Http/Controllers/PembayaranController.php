<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Atlet;
use App\Models\Spp;
use App\Models\Petugas;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Validator;
use App\Helpers\Bulan;
use PDF;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $data = Atlet::get();
        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $btn =
        //                 '<div class="row"><a href="' .
        //                 route('pembayaran.bayar', $row->nia) .
        //                 '"class="btn btn-primary btn-sm ml-2">
        //             <i class="fas fa-money-check"></i> BAYAR
        //             </a>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        $atlet = Atlet::get();

        return view('pembayaran.index', compact('atlet'));
    }

    public function bayar($id)
    {
        $atlet = Atlet::where('id', $id)->first();

        $spp = Spp::all();

        return view('pembayaran.bayar', compact('atlet', 'spp'));
    }

    public function spp($tahun)
    {
        $spp = Spp::where('tahun', $tahun)->first();

        return response()->json([
            'data' => $spp,
            'nominal_rupiah' => 'Rp ' . number_format($spp->nominal, 0, 2, '.'),
        ]);
    }

    public function prosesBayar(Request $request, $nia)
    {
        $request->validate(
            [
                'jumlah_bayar' => 'required',
            ],
            [
                'jumlah_bayar.required' => 'Jumlah bayar tidak boleh kosong!',
            ]
        );

        // $petugas = Petugas::where('user_id', Auth::user()->id)->first();

        $pembayaran = Pembayaran::whereIn('bulan_bayar', $request->bulan_bayar)
            ->where('tahun_bayar', $request->tahun_bayar)
            ->where('atlet_id', $request->atlet_id)
            ->pluck('bulan_bayar')
            ->toArray();

        if (!$pembayaran) {
            DB::transaction(function () use ($request) {
                foreach ($request->bulan_bayar as $bulan) {
                    Pembayaran::create([
                        'kode_pembayaran' =>
                            'SPPR' . Str::upper(Str::random(5)),
                        'atlet_id' => $request->atlet_id,
                        'nia' => $request->nia,
                        'kelas' => $request->kelas,
                        'tanggal_bayar' => Carbon::now('Asia/Jakarta'),
                        'tahun_bayar' => $request->tahun_bayar,
                        'bulan_bayar' => $bulan,
                        'jumlah_bayar' => $request->jumlah_bayar,
                    ]);
                }
            });

            return redirect()
                ->route('pembayaran.history-pembayaran')
                ->with('success', 'Pembayaran berhasil disimpan!');
        } else {
            return back()->with(
                'error',
                'Atlet Dengan Nama : ' .
                    $request->name .
                    ' , NIA : ' .
                    $request->nia .
                    ' Sudah Membayar Spp di bulan yang diinput (' .
                    implode($pembayaran, ',') .
                    ')' .
                    ' , di Tahun : ' .
                    $request->tahun_bayar .
                    ' , Pembayaran Dibatalkan'
            );
        }
    }

    public function statusPembayaran(Request $request)
    {
        $atlet = Atlet::get();

        return view('pembayaran.status-pembayaran', compact('atlet'));
    }

    public function statusPembayaranShow(Atlet $atlet)
    {
        $spp = Spp::all();
        return view(
            'pembayaran.status-pembayaran-tahun',
            compact('atlet', 'spp')
        );
    }

    public function statusPembayaranShowStatus($id, $tahun)
    {
        $atlet = Atlet::where('id', $id)->first();

        $spp = Spp::where('tahun', $tahun)->first();

        $pembayaran = Pembayaran::with(['atlet'])
            ->where('atlet_id', $atlet->id)
            ->where('tahun_bayar', $spp->tahun)
            ->get();

        return view(
            'pembayaran.status-pembayaran-show',
            compact('atlet', 'spp', 'pembayaran')
        );
    }

    public function historyPembayaran(Request $request)
    {
        $data = Pembayaran::with(['atlet'])
            ->latest()
            ->get();
        // if ($request->ajax()) {
        //     $data = Pembayaran::with([
        //         'atlet'
        //     ])
        //         ->latest()
        //         ->get();

        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $btn =
        //                 '<div class="row"><a href="' .
        //                 route('pembayaran.history-pembayaran.print', $row->id) .
        //                 '"class="btn btn-danger btn-sm ml-2" target="_blank">
        //             <i class="fas fa-print fa-fw"></i></a>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('pembayaran.history-pembayaran', compact('data'));
    }

    public function printHistoryPembayaran($id)
    {
        $data['pembayaran'] = Pembayaran::with(['atlet'])
            ->where('id', $id)
            ->first();

        $pdf = PDF::loadView('pembayaran.history-pembayaran-preview', $data);
        return $pdf->stream();
    }

    public function laporan()
    {
        $name = Atlet::all();
        $total = 50000;
        return view('pembayaran.laporan', compact('name', $total));
    }

    public function printPdf(Request $request)
    {
        $tanggal = $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $data['pembayaran'] = Pembayaran::with(['atlet'])
            ->whereBetween('tanggal_bayar', $tanggal)
            ->get();
        $total = $data;

        if ($data['pembayaran']->count() > 0) {
            $pdf = PDF::loadView('pembayaran.laporan-preview', $data);
            return $pdf->stream(
                'pembayaran-spp-' .
                    Carbon::parse($request->tanggal_mulai)->format('d-m-Y') .
                    '-' .
                    Carbon::parse($request->tanggal_selesai)->format('d-m-Y') .
                    Str::random(9) .
                    '.pdf'
            );
        } else {
            return back()->with(
                'error',
                'Data pembayaran spp tanggal ' .
                    Carbon::parse($request->tanggal_mulai)->format('d-m-Y') .
                    ' sampai dengan ' .
                    Carbon::parse($request->tanggal_selesai)->format('d-m-Y') .
                    ' Tidak Tersedia'
            );
        }
    }
    public function printPdf2(Request $request)
    {
        $total = 50000;
        $tanggal = $request->validate([
            'name' => 'required',
        ]);

        $data['pembayaran'] = Pembayaran::with(['atlet'])
            ->where('atlet_id', $tanggal)
            ->get();

        if ($data['pembayaran']->count() > 0) {
            $pdf = PDF::loadView('pembayaran.laporan-preview', $data);
            return $pdf->stream('pembayaran-spp-' . $request->name . '.pdf');
        } else {
            return back()->with(
                'error',
                'Data pembayaran spp tanggal ' .
                    Carbon::parse($request->tanggal_mulai)->format('d-m-Y') .
                    ' sampai dengan ' .
                    Carbon::parse($request->tanggal_selesai)->format('d-m-Y') .
                    ' Tidak Tersedia'
            );
        }
    }
}