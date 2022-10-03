<!DOCTYPE html>
<html>

<head>
    <title>GENERATE PDF</title>
    <style>
    .tulisan {
        margin-right: 70px;
    }
    </style>
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
    </center>
    <center>
        <h2 style="font-family: sans-serif;">Laporan Pembayaran Spp</h2>
    </center>
    <br>
    <b>Dari tanggal {{ \Carbon\Carbon::parse(request()->tanggal_mulai)->format('d-m-Y') }} -
        {{ \Carbon\Carbon::parse(request()->tanggal_selesai)->format('d-m-Y') }}</b><br><br>
    <table style="" border="1" cellspacing="0" cellpadding="10" width="100%">
        <thead>
            <tr>
                <th scope="col" style="font-family: sans-serif;">No</th>
                <th scope="col" style="font-family: sans-serif;">Nama Atlet</th>
                <th scope="col" style="font-family: sans-serif;">NIA</th>
                <th scope="col" style="font-family: sans-serif;">Kelas</th>
                <th scope="col" style="font-family: sans-serif;">Tanggal Bayar</th>
                <th scope="col" style="font-family: sans-serif;">Jumlah Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $row)
            <tr>
                <th scope="row" style="font-family: sans-serif;">{{ $loop->iteration }}</th>
                <td style="font-family: sans-serif;">{{ $row->atlet->name }}</td>
                <td style="font-family: sans-serif;">{{ $row->nia }}</td>
                <td style="font-family: sans-serif;">{{ $row->atlet->kelas }}</td>
                <td style="font-family: sans-serif;">
                    {{ \Carbon\Carbon::parse($row->tanggal_bayar)->format('d-m-Y') }}
                </td>

                <td style="font-family: sans-serif;">{{ $row->jumlah_bayar }}</td>
            </tr>
            @endforeach
        </tbody>


    </table>
    <br>

    @php
    $i = 50000;
    $j = $pembayaran->count();

    @endphp

    <h3 style="text-align:right; ">Total Jumlah bayar = {{$i * $j}}</h3>

    <br>
    <table style="float:right; margin-right:30px;">
        <tr>
            <td align="right">
                <p>Mengetahui,</p>
                <img class="mx-auto" src="images/sign.png" alt="" width="80" style="margin-left:25px; margin-top: 5px;">
                <div class="border-b border-black border-b-1 w-full register-hr"></div>
                <p><b>Dwi Wijayanto</b></p>
            </td>
        </tr>
    </table>
    <!-- <img class="mx-auto" src="images/sign.png" alt="" width="70" style="margin-left:25px; margin-top: 5px;">
    <div class="border-b border-black border-b-1 w-full register-hr"></div>
    <span class="mx-auto text-center block" style="margin-left: 25px;">Register</span> -->


</body>

</html>