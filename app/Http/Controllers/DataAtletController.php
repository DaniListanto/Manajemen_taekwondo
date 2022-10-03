<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Atlet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\ImageManagerStatic as Image;

use PDF;

class DataAtletcontroller extends Controller
{
    public function index()
    {
        $title = 'Update Data';
        $dt = Atlet::where('user_id', \Auth::user()->id)->first();
        $cek = Atlet::where('nia', \Auth::user()->id)->count();

        return view('atlet.profil.index', compact('title', 'dt', 'cek'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'alamat' => 'required',
            'tgl_registrasi' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'no_telepon' => 'required',
            'tingkat_sabuk' => 'required',
            'kelas' => 'required',
        ]);

        $data['user_id'] = $id;
        $data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Biodata::insert($data);

        \Session::flash('sukses', 'Data berhasil diupdate');

        return redirect()->back();
    }

    public function edit($id)
    {
        // if (Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }

        $dt = Atlet::findOrFail($id);
        $cek = Atlet::where('user_id', \Auth::user()->id)->count();
        return view('atlet.profil.edit', compact('dt', 'cek'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tgl_registrasi' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'no_telepon' => 'required',
            'tingkat_sabuk' => 'required',
            'kelas' => 'required',
        ]);

        if ($validator->passes()) {
            $input = $request->all();
            if ($request->hasfile('image')) {
                $imageatlet =
                    uniqid(11) .
                    '.' .
                    $request->file('image')->getClientOriginalExtension();
                $image_resize = Image::make(
                    $request->file('image')->getRealPath()
                );
                $image_resize->resize(300, 380);
                $image_resize->save(public_path('atlet\images/' . $imageatlet));
                $input['image'] = "$imageatlet";
            } else {
                unset($input['image']);
            }
            Atlet::findOrFail($id)->update($input);

            Alert::success('Sukses', 'Data Berhasil Diubah');
            return redirect()->route('dataAtlet.index');
        }
    }

    public function cetak()
    {
        try {
            $dt = User::where('id', \Auth::user()->id)
                ->with('biodata_r')
                ->first();
            $sk = Profile_sekolah::first();

            $pdf = PDF::loadview(
                'dashboard.biodata.pdf',
                compact('dt', 'sk')
            )->setPaper('a4', 'landscape');
            return $pdf->stream();
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage() . ' ! ' . $e->getLine());
        }

        return redirect()->back();
    }
}