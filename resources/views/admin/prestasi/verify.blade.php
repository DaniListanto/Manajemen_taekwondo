@extends('layouts.backend.app')
@section('title', 'Data Verifikasi Prestasi')
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
@section('content_title', 'Data Verifikasi Prestasi')
@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bukti</th>
                                    <th>name</th>
                                    <th>Nama Kejuaraan</th>
                                    <th>Tingkat</th>
                                    <th>Kelas</th>
                                    <th>Kategori</th>
                                    <th>Perolehan</th>
                                    <th>tgl_acara</th>
                                    <th>lokasi</th>
                                    <th>status</th>
                                    <th style="width:80px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prestasi as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full"
                                                src="{{asset('prestasi/images/'.$data->image)}}" alt=""
                                                style="width:80px;">
                                        </div>
                                    </td>
                                    <td>
                                        {{$data->name}}
                                    </td>
                                    <td>
                                        {{$data->nama_kejuaraan}}
                                    </td>
                                    <td>
                                        {{$data->tingkat}}
                                    </td>
                                    <td>
                                        {{$data->kelas}}
                                    </td>
                                    <td>
                                        {{$data->kategori}}
                                    </td>
                                    <td>
                                        {{$data->perolehan}}
                                    </td>
                                    <td>
                                        {{$data->tgl_acara}}
                                    </td>
                                    <td>
                                        {{$data->lokasi}}
                                    </td>
                                    <td>
                                        {{$data->status}}
                                    </td>
                                    <td>
                                        <div class="row">
                                            <a href="{{route('prestasi.konfirmasi', $data->id)}}"
                                                class="btn btn-primary btn-sm ml-2">Konfirmasi</a>
                                            <form action="{{ route('prestasi.destroy', $data->id) }}" class="pull-left"
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