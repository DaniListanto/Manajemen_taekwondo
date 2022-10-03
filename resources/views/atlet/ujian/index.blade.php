@extends('layouts.backend.app')

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

@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col-7">
        <h4>Daftar Ujian</h4>
    </div>
    <div class="col-5">
        <h4>History Saya</h4>
    </div>
</div>
<br>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('daftarujian.create') }}" class="btn btn-primary btn-sm"><i
                        class="fa fa-registered fa-fw"></i>
                    DAFTAR SEKARANG</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ujian</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Kuota</th>
                                    <th>Status</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kegiatan as $dt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$dt->name}}</td>
                                    <td>{{\Carbon\Carbon::parse($dt->tgl_ujian)->format('d-m-Y') }}</td>
                                    <td>{{$dt -> sisa}} dari {{$dt -> kuota}}</td>
                                    <td>{{$dt->status}}</td>
                                    <!-- <td>
                                <div class="row">
                                    <a href="{{ route('daftarujian.create') }}"
                                        class="btn btn-primary btn-sm ml-2">Daftar</a>
                                </div>
                            </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-6">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Atlet</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Sabuk</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataujian as $dt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$dt->name}}</td>
                                    <td>{{\Carbon\Carbon::parse($dt->tgl_lahir)->format('d-m-Y') }}</td>
                                    <td>{{\Carbon\Carbon::parse($dt->tgl_daftar)->format('d-m-Y') }}</td>
                                    <td>{{$dt -> sabuk}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- Edit Modal -->

@stop

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
</script>
<script
    src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script
    src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<!-- Sweetalert 2 -->
<script type="text/javascript"
    src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/select2/js/select2.full.min.js"></script>
<script>

</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable({
        "iDisplayLength": 10
    });

});
</script>

@endpush