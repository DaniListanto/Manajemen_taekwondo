@extends('layouts.backend.app')
@section('title', 'Data History Pembayaran')
@push('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush
@section('content_title', 'History Pembayaran')
@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Atlet</th>
                            <th>Kelas</th>
                            <th>Tanggal Bayar</th>
                            <th>Untuk Bulan</th>
                            <th>Untuk Tahun</th>
                            <th>Nominal</th>
                            <th>Print</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{$data -> atlet->name}}</td>
                            <td>{{$data->atlet->kelas}}</td>
                            <td>{{$data->tanggal_bayar}}</td>
                            <td>{{$data->bulan_bayar}}</td>
                            <td>{{$data->tahun_bayar}}</td>
                            <td>{{$data->jumlah_bayar}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{
                        route('pembayaran.history-pembayaran.print', $data->id) 
                                }}" class="btn btn-danger btn-sm ml-2" target="_blank">
                                        <i class="fas fa-print fa-fw"></i></a>
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
<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable({
        "iDisplayLength": 10
    });

});
</script>
</script>
@endpush