@extends('layouts.backend.app')
@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" type="text/css"
    href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/chart.js/Chart.min.css">
@endpush

@section('content_title', 'Dashboard')
@section('content')
@role('admin')
<!-- Small boxes (Stat box) -->
<div class="card">
    <div class="card-body" style="height:300px;">
        <div class="row">
            <div class="col-lg-4 col-4">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_poomsae }}</h3>

                        <h4>Atlet Poomsae</h4>
                    </div>
                    <div class="icon" style="color:white;">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('atlet.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-4 col-4">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $total_kyorugi }}</h3>

                        <h4>Atlet Kyorugi</h4>
                    </div>
                    <div class="icon" style="color:white;">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('atlet.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-4">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_reguler }}</h3>

                        <h4>Atlet Reguler</h4>
                    </div>
                    <div class="icon" style="color:white;">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('atlet.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</div>
@endrole
@role('atlet')
<div class="row">
    <div class="col-lg">
        <div class="jumbotron" style="background-color:white;">






            <h1 class="display-4">Hello, {{ Auth::user()->username }}!</h1>
            <p class="lead">Selamat datang di TAEKWONDO BUMIAJI.</p>
            <br>

        </div>
    </div>
</div>
@endrole
@role('user')
<div class="row">
    <div class="col-lg">
        <div class="jumbotron" style="background-color:white;">
            <h2><b>Menunggu Verifikasi Admin </b> </h2>

            <h2 style="color:red;">Lakukan Pembayaran dan Pengumpulan Berkas Saat Latihan !!</h2>

            <hr class="my-4">

        </div>
    </div>
</div>
@endrole
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/chart.js/Chart.min.js">
</script>
<!-- <script>
var ctx = document.getElementById("canvas").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Atlet Reguler", "Atlet Poomsae", "Atlet Kyorugi"],
        datasets: [{
            label: '',
            data: [{!!$reguler!!},
                {
                    !!$poomsae!!
                },
                {
                    !!$kyorugi!!
                },
            ],
            backgroundColor: [
                'rgba(52, 131, 249, 0.6)',
                'rgba(255, 84, 61, 0.6)',
                'rgba(5, 248, 61, 0.5)',
            ],
            borderColor: [
                'rgba(5, 122, 255, 0.7)',
                'rgba(255, 0, 0, 0.7)',
                'rgba(5, 248, 61, 0.7)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script> -->
@endpush