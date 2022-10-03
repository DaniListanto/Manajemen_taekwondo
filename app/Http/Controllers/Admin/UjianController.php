<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

class UjianController extends Controller
{
    public function index()
    {
        $ujian = Ujian::all();

        return view('admin.ujian.index', compact('ujian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.ujian.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',

            'tgl_ditutup' => 'required',
            'tgl_ujian' => 'required',
            'kuota' => 'required',
            // 'status' => 'required',
        ]);

        if ($validator->passes()) {
            Ujian::create([
                'name' => $request->name,
                'tgl_ditutup' => $request->tgl_ditutup,
                'tgl_ujian' => $request->tgl_ujian,
                'kuota' => $request->kuota,
                'sisa' => '0',
                'status' => 'buka',
            ]);
            Alert::success('Sukses', 'Data Berhasil Ditambahkan');
            return redirect()->route('ujian.index');
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ujian = Ujian::findOrFail($id);
        return view('admin.ujian.edit', compact('ujian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',

            'tgl_ditutup' => 'required',
            'tgl_ujian' => 'required',
            'kuota' => 'required',
        ]);

        if ($validator->passes()) {
            Ujian::findOrFail($id)->update([
                'name' => $request->name,
                'tgl_ditutup' => $request->tgl_ditutup,
                'tgl_ujian' => $request->tgl_ujian,
                'kuota' => $request->kuota,
            ]);
            Alert::success('Sukses', 'Data Berhasil Diubah');
            return redirect()->route('ujian.index');
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updatestatus($id)
    {
        $status = DB::table('ujian')
            ->where('id', '=', $id)
            ->get();
        //mengubah data status menjadi kondisi php sederhana (penyederhanaan data)
        $status = $status->toArray();
        if ($status[0]->status == 'buka') {
            DB::table('ujian')
                ->where('id', '=', $id)
                ->update(['status' => 'tutup']);
            Alert::success('Sukses', 'Status Pendaftaran Berhasil Ditutup');
            return redirect()->route('ujian.index');
        } else {
            DB::table('ujian')
                ->where('id', '=', $id)
                ->update(['status' => 'buka']);
            Alert::success('Sukses', 'Status Pendaftaran Berhasil Dibuka');
            return redirect()->route('ujian.index');
        }
    }

    public function destroy($id)
    {
        $ujian = Ujian::findOrFail($id);
        $ujian->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('ujian.index');
    }

    public function pdf()
    {
        $atlet = Atlet::all();
        $pdf = PDF::loadView('admin.atlet.atlet_pdf', compact('atlet'));
        return $pdf
            ->setPaper('a4', 'potrait')
            ->download('data_atlet' . '_' . date('Y-m-d_H-i-s') . '.pdf');
    }

    public function cetak_nama($id)
    {
        $data = Atlet::where('id', $id)->first();

        $pdf = PDF::loadView('admin.kartu_nama.cetak_kartu', $data);
        return $pdf
            ->setPaper('a4', 'potrait')
            ->download('kartu_atlet' . '_' . date('Y-m-d_H-i-s') . '.pdf');
    }
    public function print(Request $request)
    {
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
            Alert::error(
                'Gagal',
                'Tidak ada Data Pada tanggal ' .
                    Carbon::parse($request->tanggal_daftar)->format('d-m-Y')
            );
            return redirect()->back();
        }
    }
}