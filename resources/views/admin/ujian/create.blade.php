@extends('layouts.backend.app')
@section('title', 'Tambah Daftar Ujian')
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
@section('content_title', 'Tambah Daftar Ujian ')
@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col-8">
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('ujian.store')  }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="name">Nama Ujian:</label>
                                <input required="" type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tgl_ditutup">Tanggal Ditutup :</label>
                                <input required="" type="date" name="tgl_ditutup" id="tgl_ditutup" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tgl_ujian">Tanggal Ujian :</label>
                                <input required="" type="date" name="tgl_ujian" id="tgl_ujian" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="kuota">Kuota :</label>
                                <input required="" type="text" name="kuota" id="kuota" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="col-lg-3">
                            <div class="form-group">
                                <label for="status">Status :</label>
                                <input required="" type="text" name="status" id="status" class="form-control">
                            </div>
                        </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save fa-fw"></i> SIMPAN
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@stop
@push('js')
<!-- Select2 -->
<script src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/select2/js/select2.full.min.js"></script>
//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
theme: 'bootstrap4'
})
</script>
@endpush