@extends('layouts.backend.app')
@section('title', 'Data Saya')
@push('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Sweetalert 2 -->
<link rel="stylesheet" type="text/css"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/sweetalert2/sweetalert2.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('content_title', 'Data Saya')
@section('content')
<x-alert></x-alert>

<div class="row" style="margin-top: 20px;">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="block text-sm font-bold text-gray-700">
                                Photo
                            </label>
                            <div class="mt-2 flex items-center">
                                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100 mr-2">
                                    <img src="{{asset('atlet/images/' . $dt->image)}}" alt="" style="width:150px;">
                                </span>
                                <!-- <input class="border border-gray-400 p-2 w-full" type="file" name="image" id="image"
                                    accept=".jpg, .png, .jpeg" readonly> -->
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="name">Nama Atlet:</label>
                            <input required="" type="text" name="name" id="name" class="form-control"
                                value="{{$dt->name}}" readonly>
                        </div>
                    </div>
                    <div class=" col-lg-3">
                        <div class="form-group">
                            <label for="nia">NIA:</label>
                            <input required="" type="text" name="nia" id="nia" class="form-control" value="{{$dt->nia}}"
                                readonly>
                        </div>
                    </div>
                    <div class=" col-lg-3">
                        <div class="form-group">
                            <label for="tgl_registrasi">Tanggal registrasi:</label>
                            <input required="" type="date" name="tgl_registrasi" id="tgl_registrasi"
                                class="form-control" value="{{$dt->tgl_registrasi}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir:</label>
                            <input required="" type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                value="{{$dt->tempat_lahir}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir:</label>
                            <input required="" type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                                value="{{$dt->tgl_lahir}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <input required="" type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                value="{{$dt->jenis_kelamin}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="bb">berat badan:</label>
                            <input required="" type="text" name="bb" id="bb" class="form-control" value="{{$dt->bb}}"
                                readonly>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="tb">tinggi badan:</label>
                            <input required="" type="text" name="tb" id="tb" class="form-control" value="{{$dt->tb}}"
                                readonly>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="no_telepon">No Telepon:</label>
                            <input required="" type="text" name="no_telepon" id="no_telepon" class="form-control"
                                value="{{$dt->no_telepon}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tingkat_sabuk">Tingkat Sabuk:</label>
                            <input required="" type="text" name="tingkat_sabuk" id="tingkat_sabuk" class="form-control"
                                value="{{$dt->tingkat_sabuk}}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="kelas">kelas:</label>
                            <input required="" type="text" name="kelas" id="kelas" class="form-control"
                                value="{{$dt->kelas}}" readonly>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-2">
                        <a href="{{ route('dataAtlet.edit', $dt->id) }}" class="btn btn-primary btn-rounded btn-fw"><i
                                class="fa fa-edit"></i>
                            Ubah Data</a>

                    </div>

                    <div class="col-lg-2">
                        <a href="{{route('printid', $dt->id)}}" target="_blank"
                            class="btn btn-warning btn-rounded btn-fw">
                            Cetak Kartu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>

@endsection