<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 15px;
        }

        .footer {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            color: black;
            text-align: right;
        }
    </style>
</head>

<body>
    @php
    $info = \App\InformasiToko::first();
    @endphp
    <h1 style="text-align: center">{{ $info->name }}</h1>
    <center>
        <img src="./image/upload/toko/logo.png" style="width:100px; border-radius:50%; height: 80px;">
    </center>
    <h5 style="text-align: center;">Jl. Mayjen Sutoyo, RW.9, Cawang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13630</h5>
        <br>
        <h2 style="text-align: center">Report Unit Data</h2>
        <h5 style="text-align: right">Date : @include('function.tglIndo'){{ hari_ini(date("D")) }}, {{ tgl_indo(date("Y-m-d")) }}</h5>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
                @php
                $l = \App\Unit::all();
                @endphp
                @foreach($l as $q)
                <tr>
                    <th>{{$q->id}}</th>
                    <td>{{$q->unit}}</td>
                    @endforeach
            </tbody>
        </table>

</body>
</html>