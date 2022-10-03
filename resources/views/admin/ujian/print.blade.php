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
        <h2 style="font-family: sans-serif;">Daftar Atlet Ujian tanggal
            {{ \Carbon\Carbon::parse(request()->tanggal_daftar)->format('d-m-Y') }}</h2>
    </center>
    <br>
    <br><br>
    <table style="" border="1" cellspacing="0" cellpadding="10" width="100%">
        <thead>
            <tr>
                <th scope="col" style="font-family: sans-serif;">No</th>
                <th scope="col" style="font-family: sans-serif;">Nama</th>
                <th scope="col" style="font-family: sans-serif;">Tanggal Lahir</th>
                <th scope="col" style="font-family: sans-serif;">Jenis Sabuk</th>

            </tr>
        </thead>
        <tbody>
            @foreach($daftarujian as $row)
            <tr>
                <th scope="row" style="font-family: sans-serif;">{{ $loop->iteration }}</th>
                <td style="font-family: sans-serif;">{{ $row->name }}</td>
                <td style="font-family: sans-serif;">{{ \Carbon\Carbon::parse($row->tgl_lahir)->format('d-m-Y') }}
                </td>
                <td style="font-family: sans-serif;">{{ $row->sabuk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>