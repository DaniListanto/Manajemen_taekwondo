@extends('layouts.backend.app')
@section('title', 'Data Atlet')
@push('css')

<link rel="stylesheet" href="{{ asset('css/table/table.css') }}">

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
@section('content_title', 'Data Atlet')
@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @can('create-atlet')
                <a href="{{ route('atlet.create')  }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus fa-fw"></i> Tambah Data
                </a>
                @endcan

                <a href="atlet/cetak" class="btn btn-danger btn-sm"><i class="fa fa-pdf fa-fw"></i>
                    Cetak PDF</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-custom table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Atlet</th>
                                    <th>NIA</th>
                                    <th>Tanggal Registrasi</th>
                                    <th>No Telepon</th>
                                    <th>Tingkat Sabuk</th>
                                    <th>Kelas</th>
                                    <th width="150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($atlet as $dt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full"
                                                src="{{asset('atlet/images/'.$dt->image)}}" alt="" style="width:80px;">
                                        </div>
                                    </td>
                                    <td>{{$dt->name}}</td>
                                    <td>{{$dt->nia}}</td>
                                    <td>{{$dt->tgl_registrasi}}</td>
                                    <td>{{$dt->no_telepon}}</td>
                                    <td>{{$dt->tingkat_sabuk}}</td>
                                    <td>{{$dt->kelas}}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{route('atlet.edit', $dt->id)}}"
                                                class="btn btn-primary btn-sm ml-2">Edit</a>

                                            <a href="{{route('printid', $dt->id)}}" target="_blank"
                                                class="btn btn-warning btn-sm ml-2">Cetak</a>
                                            <form action="{{ route('atlet.destroy', $dt->id) }}" class="pull-left"
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

<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable({
        "iDisplayLength": 10
    });

});
</script>

@endpush