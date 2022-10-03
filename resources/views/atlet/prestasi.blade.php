@extends('layouts.backend.app')
@section('title', 'Data Prestasi')
@push('css')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush
@section('content_title', 'Data Prestasi')
@section('content')
<x-alert></x-alert>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dataTable2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Atlet</th>
                            <th>Nama Kejuaraan</th>
                            <th>Tingkat</th>
                            <th>Kelas</th>
                            <th>Kategori</th>
                            <th>Perolehan</th>
                            <th>tgl_acara</th>
                            <th>lokasi</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
<script>
$(function() {

    var table = $("#dataTable2").DataTable({
        processing: true,
        serverSide: true,
        "responsive": true,
        ajax: "{{ route('atlet.prestasi') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'nama_kejuaraan',
                name: 'nama_kejuaraan'
            },
            {
                data: 'tingkat',
                name: 'tingkat'
            },
            {
                data: 'kelas',
                name: 'kelas'
            },
            {
                data: 'kategori',
                name: 'kategori'
            },
            {
                data: 'perolehan',
                name: 'perolehan'
            },
            {
                data: 'tgl_acara',
                name: 'tgl_acara'
            },
            {
                data: 'lokasi',
                name: 'lokasi'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: true
            },
        ]
    });

});
</script>
@endpush