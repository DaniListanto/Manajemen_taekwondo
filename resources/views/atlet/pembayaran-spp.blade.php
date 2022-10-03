@extends('layouts.backend.app')
@section('title', 'Pembayaran')
@section('content_title', 'Pembayaran')
@section('content')



<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Pilih Tahun</div>
            <div class="card-body">
                <div class="list-group">
                    @foreach($spp as $row)
                    @if($row->tahun == date('Y'))
                    <a href="{{ route('atlet.pembayaran-spp.pembayaranSppShow', $row->tahun) }}"
                        class="list-group-item list-group-item-action active">
                        {{ $row->tahun }}
                    </a>
                    @else
                    <a href="{{ route('atlet.pembayaran-spp.pembayaranSppShow', $row->tahun) }}"
                        class="list-group-item list-group-item-action">
                        {{ $row->tahun }}
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="callout callout-danger">
            <h5>Pemberitahuan!</h5>

            <p>Garis biru pada list tahun menandakan tahun aktif / tahun sekarang.</p>
        </div>
    </div>
</div>
<br>
<h3>Cetak Laporan</h3>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Laporan Pembayaran</div>
            <div class="card-body">
                <form method="POST" action="{{ route('atlet.laporan-pembayaran.print-pdf') }}">
                    @csrf
                    <div class="form-group">
                        <label for="tahun_bayar">Tahun</label>
                        <select name="tahun_bayar" required="" class="form-control" id="tahun_bayar">
                            <option disabled="" selected="">- PILIH TAHUN -</option>
                            @foreach($spp as $row)
                            <option value="{{ $row->tahun }}">{{ $row->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-sm" target="_blank">
                            <i class="fas fa-print fa-fw" target="_blank"></i> CETAK LAPORAN
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection