@extends('layouts.backend.app')
@section('title', 'Data Prestasi')
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
@section('content_title', 'Data Prestasi')
@section('content')
<x-alert></x-alert>
<form action="{{ route('dataAtlet.update', $dt->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
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
                                    <input class="border border-gray-400 p-2 w-full" type="file" name="image" id="image"
                                        accept=".jpg, .png, .jpeg">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="name">Nama Atlet:</label>
                                <input required="" type="text" name="name" id="name" class="form-control"
                                    value="{{$dt->name}}">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tgl_registrasi">Tanggal registrasi:</label>
                                <input required="" type="date" name="tgl_registrasi" id="tgl_registrasi"
                                    class="form-control" value="{{$dt->tgl_registrasi}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir:</label>
                                <input required="" type="text" name="tempat_lahir" id="tempat_lahir"
                                    class="form-control" value="{{$dt->tempat_lahir}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir:</label>
                                <div class="row">

                                    <div class="col-lg-8">
                                        <input required="" type="date" name="tgl_lahir" id="tgl_lahir"
                                            class="form-control" value="{{$dt->tgl_lahir}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select required="" name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-control select2bs4">

                                    <option value="{{$dt->jenis_kelamin}}">{{$dt->jenis_kelamin}}</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="bb">berat badan:</label>
                                <input required="" type="text" name="bb" id="bb" class="form-control"
                                    value="{{$dt->bb}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tb">tinggi badan:</label>
                                <input required="" type="text" name="tb" id="tb" class="form-control"
                                    value="{{$dt->tb}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="no_telepon">No Telepon:</label>
                                <input required="" type="text" name="no_telepon" id="no_telepon" class="form-control"
                                    value="{{$dt->no_telepon}}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tingkat_sabuk">Tingkat Sabuk:</label>
                                <select required="" name="tingkat_sabuk" id="tingkat_sabuk"
                                    class="form-control select2bs4">
                                    <option value="{{$dt->tingkat_sabuk}}">
                                        {{$dt->tingkat_sabuk}}</option>
                                    <option value="putih">Putih</option>
                                    <option value="kuning">Kuning</option>
                                    <option value="kuning-strip-hijau">Kuning Strip Hijau</option>
                                    <option value="Hijau">Hijau</option>
                                    <option value="Hijau-strip-biru">Hijau Strip Biru</option>
                                    <option value="Biru">Biru</option>
                                    <option value="Biru-strip-merah">Biru Strip Merah</option>
                                    <option value="merah">Merah</option>
                                    <option value="merah-strip-hitam1">Merah Strip Hitam 1</option>
                                    <option value="merah-strip-hitam2">Merah Strip Hitam 2</option>
                                    <option value="Hitam">Hitam</option>
                                    <option value="Dan1">Dan 1</option>
                                    <option value="Dan2">Dan 2</option>
                                    <option value="Dan3">Dan 3</option>
                                    <option value="Dan4">Dan 4</option>
                                    <option value="Dan5">Dan 5</option>
                                    <option value="Dan6">Dan 6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="kelas">kelas:</label>
                                <select required="" name="kelas" id="kelas" class="form-control select2bs4">

                                    <option value="{{$dt->kelas}}">{{$dt->kelas}}</option>
                                    <option value="reguler">Reguler</option>
                                    <option value="poomsae">Poomsae</option>
                                    <option value="kyorugi">Kyorugi</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                            Simpan
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
</form>
@endsection
@push('js')
<!-- Select2 -->
<script src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})
</script>
@endpush