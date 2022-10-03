@extends('layouts.backend.app')
@section('title', 'Data Kas')
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
@section('content_title', 'Data Kas')
@section('content')

<div class="row">
    <div class="col-lg-2">
        <a href="{{route('saldo.cetak')}}" class="btn btn-primary btn-md"><i class="fa fa-plus"></i>
            PRINT PDF</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
            {{ Session::get('message') }}</div>
        @endif
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body text-center">
                <div class="clearfix">
                    <div class=" text-center">
                        <h5 class="mb-0 text-center ">Jumlah Saldo</h5>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                <h2 class="font-weight-medium  mb-0">
                    Rp.
                    {{ number_format($saldo,2,',','.') }}
                </h2>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 10px;">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <a href="{{ route('kasmasuk.index') }}" style="color: black;">
                <div class="card-body text-center">
                    <div class="clearfix">
                        <div class=" text-center">
                            <h5 class="mb-0 text-center ">Jumlah Kas Masuk</h5>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                    <h2 class="font-weight-medium  mb-0">
                        Rp.
                        {{ number_format($jumlahmasuk,2,',','.') }}
                    </h2>
                    </p>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <a href="{{ route('kaskeluar.index') }}" style="color: black;">
                <div class="card-body text-center">
                    <div class="clearfix">
                        <div class=" text-center">
                            <h5 class="mb-0 text-center ">Jumlah Kas Keluar</h5>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                    <h2 class="font-weight-medium  mb-0">
                        Rp.
                        {{ number_format($jumlahkeluar,2,',','.') }}
                    </h2>
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection