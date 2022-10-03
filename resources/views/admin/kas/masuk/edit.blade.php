@extends('layouts.backend.app')
@section('title', 'Edit Kas Masuk')
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
@section('content_title', 'Edit Kas Masuk')
@section('content')

<form action="{{ route('kasmasuk.update', $kas_masuk->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            

                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-70 control-label">Tanggal</label>
                                    <div class="col-md-60">
                                        <input type="date" class="form-control" name="tanggal"
                                            value="{{$kas_masuk->tanggal}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-70 control-label">Keterangan</label>
                                    <div class="col-md-60">
                                        <input type="text" class="form-control" name="keterangan"
                                            value="{{$kas_masuk->keterangan}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-70 control-label">Jumlah</label>
                                    <div class="col-md-60">
                                        <input type="text" class="form-control" name="jumlah"
                                            value="{{$kas_masuk->jumlah}}"></br>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" id="submit">
                                Ubah
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="{{route('kasmasuk.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection