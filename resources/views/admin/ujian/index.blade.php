@extends('layouts.backend.app')
@section('title', 'Daftar Ujian')
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
@section('content_title', 'Daftar Ujian')
@section('content')
<x-alert></x-alert>
<!-- <div class="col-lg-6">
    <div class="card" style="height:183px;">

        <div class="card-header" style="font-weight: bold;">Laporan Daftar Atlet</div>
        <div class="card-body">
            <form method="POST" action="{{ route('daftarujian.print') }}">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <input type="date" name="tanggal_daftar" required="" class="form-control" id="tanggal_daftar">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-danger btn-sm" target="_blank">
                            PRINT
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

                <a href="{{ route('ujian.create')  }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus fa-fw"></i> Tambah Data
                </a>
                <a href="{{ route('ujian.detail')  }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-registered  fa-fw"></i> Atlet Mendaftar
                </a>

                <!-- <a href="atlet/cetak" class="btn btn-danger btn-sm"><i class="fa fa-pdf fa-fw"></i>
                    Cetak PDF</a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ujian</th>
                            <th>Tanggal Ditutup</th>
                            <th>Tanggal Ujian</th>
                            <th>Kuota</th>
                            <th>Status</th>
                            <th width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ujian as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$dt->name}}</td>
                            <td>{{\Carbon\Carbon::parse($dt->tgl_ditutup)->format('d-m-Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($dt->tgl_ujian)->format('d-m-Y') }}</td>
                            <td>{{$dt -> sisa}} dari {{$dt -> kuota}}</td>
                            <td>{{$dt->status}}</td>
                            <td>
                                <div class="row">
                                    <a href="ubahstatus/{{ $dt->id }}" class="btn btn-primary btn-sm ml-2">Ganti
                                        Status</a>
                                    <a href="{{route('ujian.edit', $dt->id)}}"
                                        class="btn btn-warning btn-sm ml-2">Edit</a>
                                    <!-- <a href="{{route('ujian.detail')}}" class="btn btn-warning btn-sm ml-2">Detail</a> -->
                                    <form action="{{ route('ujian.destroy', $dt->id) }}" class="pull-left"
                                        method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm ml-2"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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