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
    <img src="./image/upload/toko/{{ $info->photo }}" style="width:100px; border-radius:80%; height: 80px;margin-left:600px;">
    <h2 style="text-align: center">Report Unit Data</h1>
        <br>
        <h6 style="text-align: right">Date : @include('function.tglIndo'){{ hari_ini(date("D")) }}, {{ tgl_indo(date("Y-m-d")) }}</h6>
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