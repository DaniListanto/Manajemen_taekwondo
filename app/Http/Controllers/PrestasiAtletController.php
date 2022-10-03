<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Atlet;
use App\Models\Spp;
use App\Models\Prestasi;
use App\Models\Petugas;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\DataTables\PrestasiAtletDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\ImageManagerStatic as Image;

class PrestasiAtletController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read-prestasiAtlet'])->only([
            'index',
            'show',
        ]);
        $this->middleware(['permission:create-prestasiAtlet'])->only([
            'create',
            'store',
        ]);
        $this->middleware(['permission:update-prestasiAtlet'])->only([
            'edit',
            'update',
        ]);
        $this->middleware(['permission:delete-prestasiAtlet'])->only([
            'destroy',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prestasi = Prestasi::where(
            'name',

            Auth::user()->name
        )->get();
        $spp = Spp::all();
        $atlet = Atlet::where(
            'name',

            Auth::user()->name
        )->get();

        return view('prestasi.index', compact('spp', 'atlet', 'prestasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_name = Atlet::where(
            'name',

            Auth::user()->name
        )->get();
        return view('prestasi.create', compact('data_name'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,',
            'nama_kejuaraan' => 'required',
            'tingkat' => 'required',
            'kelas' => 'required',
            'kategori' => 'required',
            'perolehan' => 'required',
            'tgl_acara' => 'required',
            'lokasi' => 'required',
        ]);

        if ($validator->passes()) {
            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $imageprestasi =
                    uniqid(11) . '.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(700, 250);
                $image_resize->save(
                    public_path('prestasi\images/' . $imageprestasi)
                );
            }

            Prestasi::create([
                'image' => $imageprestasi,
                'name' => $request->name,
                'nama_kejuaraan' => $request->nama_kejuaraan,
                'tingkat' => $request->tingkat,
                'kelas' => $request->kelas,
                'kategori' => $request->kategori,
                'perolehan' => $request->perolehan,
                'tgl_acara' => $request->tgl_acara,
                'lokasi' => $request->lokasi,
                'status' => 'pending',
            ]);

            Alert::success('Sukses', 'Data Berhasil Ditambahkan');
            return redirect()->route('prestasiAtlet.index');
        }
        Alert::error('Gagal', $validator->errors()->all());
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $name = Atlet::all();
        $prestasi = Prestasi::findOrFail($id);

        return view('prestasi.edit', compact('name', 'prestasi'));
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
            'nama_kejuaraan' => 'required',
            'tingkat' => 'required',
            'kelas' => 'required',
            'kategori' => 'required',
            'perolehan' => 'required',
            'tgl_acara' => 'required',
            'lokasi' => 'required',
        ]);

        if ($validator->passes()) {
            $input = $request->all();
            if ($request->hasfile('image')) {
                $imageprestasi =
                    uniqid(11) .
                    '.' .
                    $request->file('image')->getClientOriginalExtension();
                $image_resize = Image::make(
                    $request->file('image')->getRealPath()
                );
                $image_resize->resize(700, 250);
                $image_resize->save(
                    public_path('prestasi\images/' . $imageprestasi)
                );
                $input['image'] = "$imageprestasi";
            } else {
                unset($input['image']);
            }
            Prestasi::findOrFail($id)->update($input);

            Alert::success('Sukses', 'Data Berhasil Diupdate');
            return redirect()->route('prestasiAtlet.index');
        }

        Alert::error('Gagal', $validator->errors()->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('prestasiAtlet.index');
    }
}