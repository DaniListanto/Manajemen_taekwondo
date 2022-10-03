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
        <h2 style="font-family: sans-serif;">Laporan Saldo Kas Per Tanggal {{ \Carbon\Carbon::now()->format('d-m-Y') }}
        </h2>
    </center>
    <br>
    <br><br>
    <table style="" border="1" cellspacing="0" cellpadding="10" width="100%">
        <thead>
            <tr>
                <th scope="col" style="font-family: sans-serif;">Kas Masuk</th>
                <th scope="col" style="font-family: sans-serif;">Kas Keluar</th>
                <th scope="col" style="font-family: sans-serif;">Jumlah Saldo</th>
            </tr>
        </thead>
        <tbody>

            <tr>

                <td style="font-family: sans-serif;">Rp.
                    {{ number_format($jumlahmasuk,2,',','.') }}</td>
                <td style="font-family: sans-serif;">Rp.
                    {{ number_format($jumlahkeluar,2,',','.') }}</td>
                <td style="font-family: sans-serif;">Rp.
                    {{ number_format($saldo,2,',','.') }}</td>

            </tr>

        </tbody>
    </table>

</body>

</html>