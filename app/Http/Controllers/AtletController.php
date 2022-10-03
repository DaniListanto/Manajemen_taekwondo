<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Atlet;
use App\Models\Ujian;
use App\Models\Spp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DataTables;
use PDF;

class AtletController extends Controller
{
    public function index()
    {
        $ujian = Ujian::all();


        return view('atlet.ujian.index', compact('ujian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prestasi(Request $request)
    {
        if ($request->ajax()) {
            $atlet = Atlet::where('user_id', Auth::user()->id)->first();

            $data = Prestasi::with(['atlet'])
                ->where($atlet->id)
                ->latest()
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="row"><a <a href="' .
                        route('atlet.prestasi.preview', $row->id) .
                        '"class="btn btn-danger btn-sm ml-2" target="_blank">
                    <i class="fas fa-print fa-fw"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('atlet.prestasi');
    }

    public function printId(Atlet $atlet)
    {
        $atlet = Atlet::where('user_id', Auth::user()->id)->first();
        $pdf = PDF::loadView('id-card-pdf', ['atlet' => [$atlet]]);
        $pdf->setPaper('A4', '');
        return $pdf->stream(
            $atlet->name .
                '-' .
                str_pad($atlet->id + 1, 4, '0', STR_PAD_LEFT) .
                '.pdf'
        );
    }

    public function cetak_nama($id)
    {
        $data = Atlet::where('id', Auth::user()->id)->get();

        $pdf = PDF::loadView('kartu_nama.cetak_kartu', $data, compact('data'));
        return $pdf->stream();
    }

    public function previewPrestasi($id)
    {
        $data['atlet'] = Atlet::where('user_id', Auth::user()->id)->first();

        $data['pembayaran'] = Prestasi::with(['atlet'])
            ->where('id', $id)
            ->where('atlet_id', $data['atlet']->id)
            ->first();

        $pdf = PDF::loadView('atlet.prestasi', $data);
        return $pdf->stream();
    }

    public function pembayaranSpp()
    {
        $spp = Spp::all();

        return view('atlet.pembayaran-spp', compact('spp'));
    }

    public function pembayaranSppShow(Spp $spp)
    {
        $atlet = Atlet::where('user_id', Auth::user()->id)->first();

        $pembayaran = Pembayaran::with(['atlet'])
            ->where('atlet_id', $atlet->id)
            ->where('tahun_bayar', $spp->tahun)
            ->oldest()
            ->get();

        return view(
            'atlet.pembayaran-spp-show',
            compact('pembayaran', 'atlet', 'spp')
        );
    }

    public function historyPembayaran(Request $request)
    {
        if ($request->ajax()) {
            $atlet = Atlet::where('user_id', Auth::user()->id)->first();

            $data = Pembayaran::with(['atlet'])
                ->where('atlet_id', $atlet->id)
                ->latest()
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="row"><a <a href="' .
                        route('atlet.history-pembayaran.preview', $row->id) .
                        '"class="btn btn-danger btn-sm ml-2" target="_blank">
                    <i class="fas fa-print fa-fw"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('atlet.history-pembayaran');
    }

    public function previewHistoryPembayaran($id)
    {
        $data['atlet'] = Atlet::where('user_id', Auth::user()->id)->first();

        $data['pembayaran'] = Pembayaran::with(['Atlet'])
            ->where('id', $id)
            ->where('atlet_id', $data['atlet']->id)
            ->first();

        $pdf = PDF::loadView('atlet.history-pembayaran-preview', $data);
        return $pdf
        ->setPaper('a5', 'potrait')
        ->stream(
            
        );
    }

    public function laporanPembayaran()
    {
        $spp = Spp::all();
        return view('atlet.laporan', compact('spp'));
    }

    public function printPdf(Request $request)
    {
        $atlet = Atlet::where('user_id', Auth::user()->id)->first();

        $data['pembayaran'] = Pembayaran::with(['atlet'])
            ->where('atlet_id', $atlet->id)
            ->where('tahun_bayar', $request->tahun_bayar)
            ->get();

        $data['data_atlet'] = $atlet;

        if ($data['pembayaran']->count() > 0) {
            $pdf = PDF::loadView('atlet.laporan-preview', $data);
            return $pdf->stream(
                'pembayaran-spp-' .
                    $atlet->name .
                    '-' .
                    $atlet->kode_atlet .
                    '-' .
                    $request->tahun_bayar .
                    '-' .
                    Str::random(9) .
                    '.pdf'
            );
        } else {
            return back()->with(
                'error',
                'Data Pembayaran Spp Anda Tahun ' .
                    $request->tahun_bayar .
                    ' tidak tersedia'
            );
        }
    }
}