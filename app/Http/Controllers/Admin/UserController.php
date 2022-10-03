<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserDataTable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserDataTable $datatable)
    {
        if ($request->ajax()) {
            return $datatable->data();
        }

        return view('admin.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new \App\Models\User();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt('rahasia');
        $data->id_registrasi = 'REG-' . date('YmdHis');
        $data->save();

        $user_register = \App\Models\User::create($request->all());

        alert()->success('Berhasil.', 'Data telah disimpan!');

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['data' => $user]);
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
        User::findOrFail($id)->update([
            'email' => $request->email,
            'password' => $request->password
                ? Hash::make($request->password)
                : $request->old_password,
        ]);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
    }
}