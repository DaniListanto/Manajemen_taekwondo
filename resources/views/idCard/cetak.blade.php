<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Id Card</title>
    <style>
    .page-break {
        page-break-after: always;
    }

    .main {
        width: 346px;
        height: 214px;
        margin: auto;
        margin-bottom: 30px;
        position: relative;
    }

    .background-image {
        width: 345px;
        height: 212px;
        border-radius: 6px;
        position: relative;
        border: 1px solid gray;
        position: absolute;
    }

    .main-data {
        width: 345px;
        height: 212px;
        position: absolute;
    }

    .right-div {
        font-size: 10pt;
        margin-left: 10px;
        position: absolute;
        float: left;
        width: 240px;
        height: 212px;
    }

    .left-div {
        position: absolute;
        float: left;
        width: 100px;
        height: 212px;
    }

    .logo {
        position: absolute;
        margin: 25px 0 0 18px;
    }

    .info {
        position: absolute;
        padding: 0 12px;
        height: 120px;
        margin-top: 5px;
    }

    .capitalize {
        text-transform: capitalize;
        font-weight: bold;
    }

    .register-hr {
        border-bottom: 1px solid black;
        width: 100px;
    }



    .back-div {
        padding: 10px;
        position: absolute;
        height: 194px;
        margin-left: 120px;
        width: 208px;
        display:
    }
    </style>
</head>

<body>
    @foreach ($atlet as $dt)
    <div>
        <div class="main">
            <img class="background-image" src="images/bg.jpg" alt="">
            <div class="main-data">
                <table width="100%">
                    <tr>
                        <td><img style="margin-left:5px;" src="images/taekwondologo.png" alt="" height="30"></td>
                        <td align="center">
                            <center>
                                <font size="1"><b>TAEKWONDO INDONESIA Unit BUMIAJI</b></font><br>
                                <font size="6.0">Jl. Raya Junggo 35 Tulungrejo Kec. Bumiaji. Batu</font><br>
                            </center>
                        </td>
                        <td><img src="images/lg.png" alt="" height="30"></td>
                    </tr>
                </table>
                <hr>
                <div class="left-div">
                    <div class="info">
                        <img style="height: 100px;" src="{{public_path('atlet/images/' . $dt->image)}}" alt="">
                        <br>

                    </div>
                </div>
                <div class="right-div" style=" line-height: 1.5; letter-spacing: 2px;">
                    <font size="7.0" face="sans-serif"><b>{{$dt->name}}</b></font><br>
                    <font size="7.0" face="sans-serif">NIA : {{$dt->nia}}</font><br>
                    <font size="7.0" face="sans-serif">Jenis Kelamin : {{$dt->jenis_kelamin}}</font><br>
                    <font size="7.0" face="sans-serif">Kelas : {{$dt->kelas}}</font><br>
                </div>
                <table style="float:right; margin-right:30px; margin-top:78px;">
                    <tr>
                        <td align="center">
                            <font size="7.0" face="sans-serif">Ketua Unit Bumiaji</font><br>
                            <img class="mx-auto" src="images/sign.png" alt="" height="20px"><br>
                            <font size="7.0" face="sans-serif">Dwi Wijayanto</font><br>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
    @if (!$loop->last)
    <div class="page-break"></div>
    @endif
    @endforeach
</body>

</html>