<!DOCTYPE html>
<html>

<head>
    <title>GENERATE PDF</title>
</head>

<body>
    <table width="100%">
        <tr>
            <td><img src="images/taekwondologo.png" alt="" height="90"></td>
            <td align="center" class="tulisan">
                <center>
                    <font size="5"><b>TAEKWONDO INDONESIA</b></font><br>
                    <font size="4"><b>PENGURUS KOTA BATU</b></font><br>
                    <font size="4"><b>Unit BUMIAJI</b></font><br>
                    <font size="3">Jl. Raya Junggo 35 Tulungrejo Kec. Bumiaji. Batu</font><br>
                    <font size="3">Phone : 081249380063</font><br>
                </center>
            </td>
            <td><img src="images/lg.png" alt="" width="90" height="90"></td>

        </tr>

    </table>
    <center>
        <hr>
        <h2 style="font-family: sans-serif;">Laporan Pembayaran Spp</h2><br><br>
    </center>


    <b style="font-family: sans-serif;">Nama Atlet : {{ $data_atlet->name }}</b><br><br>
    <b style="font-family: sans-serif;">Kode Atlet : {{ $data_atlet->nia }}</b><br><br>
    <b style="font-family: sans-serif;">Kelas : {{ $data_atlet->kelas}}</b><br><br>

    <br>
    <b>Untuk Tahun : {{ request()->tahun_bayar }}</b><br><br>
    <table style="" border="1" cellspacing="0" cellpadding="10" width="100%">
        <thead>
            <tr>
                <th style="font-family: sans-serif;">No</th>
                <th style="font-family: sans-serif;">Nama Atlet</th>
                <th style="font-family: sans-serif;">Kode Atlet</th>
                <th style="font-family: sans-serif;">Tanggal Bayar</th>
                <th style="font-family: sans-serif;">Untuk Bulan</th>
                <th style="font-family: sans-serif;">Untuk Tahun</th>
                <th style="font-family: sans-serif;">Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $row)
            <tr>
                <td style="font-family: sans-serif;">{{ $loop->iteration }}</td>
                <td style="font-family: sans-serif;">{{ $row->atlet->name }}</td>
                <td style="font-family: sans-serif;">{{ $row->atlet->kode_atlet }}</td>
                <td style="font-family: sans-serif;">{{ \Carbon\Carbon::parse($row->tanggal_bayar)->format('d-m-Y') }}
                </td>

                <td style="font-family: sans-serif;">{{ $row->bulan_bayar }}</td>
                <td style="font-family: sans-serif;">{{ $row->tahun_bayar }}</td>
                <td style="font-family: sans-serif;">{{ $row->jumlah_bayar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>