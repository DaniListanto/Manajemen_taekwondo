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
    </center>
    <center>
        <h2 style="font-family: sans-serif;">History Pembayaran SPP</h2>
    </center>
    <br>
    <div style="float: left;">
        <b style="font-family: sans-serif;">Nama Atlet : {{ $pembayaran->atlet->name }}</h3><br>
            <b style="font-family: sans-serif;">Kelas : {{ $pembayaran->atlet->kelas }}</b><br>
            <b style="font-family: sans-serif;">NIA : {{ $pembayaran->atlet->nia }}</b><br>
    </div>

    <br><br><br><br><br>
    <table style="" border="1" cellspacing="0" cellpadding="10" width="100%">
        <thead>
            <tr>
                <th scope="col" style="font-family: sans-serif;">Untuk Tahun</th>
                <th scope="col" style="font-family: sans-serif;">Untuk Bulan</th>
                <th scope="col" style="font-family: sans-serif;">Jumlah Bayar</th>
                <th scope="col" style="font-family: sans-serif;">Kode Pembayaran</th>
                <th scope="col" style="font-family: sans-serif;">Tanggal Bayar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="font-family: sans-serif;">{{ $pembayaran->tahun_bayar }}</td>
                <td style="font-family: sans-serif;">{{ $pembayaran->bulan_bayar }}</td>
                <td style="font-family: sans-serif;">{{ $pembayaran->jumlah_bayar }}</td>
                <td style="font-family: sans-serif;">{{ $pembayaran->kode_pembayaran }}</td>
                <td style="font-family: sans-serif;">
                    {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y') }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>