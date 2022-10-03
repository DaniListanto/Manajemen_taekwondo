@extends('layouts.backend.app')
@section('title', 'Tambah Kas Keluar')
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
@section('content_title', 'Tambah Kas Keluar')
@section('content')

<form method="POST" action="{{ route('kaskeluar.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex  grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nama" class="col-md-70 control-label">Tanggal</label>
                                <div class="col-md-60">
                                    <input type="date" class="form-control" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-70 control-label">Keterangan</label>
                                <div class="col-md-60">
                                    <input type="text" class="form-control" name="keterangan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-70 control-label">Jumlah</label>
                                <div class="col-md-60">
                                    <input type="text" class="form-control" name="jumlah">
                                </div>
                            </div>
                            <div class="float-right">

                                <a href="/admin/kaskeluar" class="btn btn-light pull-right">Back</a>
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>

@endsection