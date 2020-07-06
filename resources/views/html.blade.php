<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    *{
    font-family: 'Times New Roman',serif;
    }
    table,th,td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    .table1{
        margin: auto;
        color: black;
    }
    h1{
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

</style>
<body>
<h1></h1>
<h1>
    Data Siswa<br>
    Paud Tunas Harapan
</h1>
<hr>
<div class="table-responsive">
    <table class="table1">
        <thead>
        <tr>
            <th>Nama</th>
            <th>Gender</th>
            <th>Tempat tanggal Lahir</th>
            <th>Agama</th>
            <th>Wali murid</th>
        </tr>
        </thead>
        <tbody>
        @foreach($siswa as $data)
            <tr>
                <td>{{$data->nama}}</td>
                <td>{{$data->gender->jeniskelamin}}</td>
                <td>
                    {{$data->tempat->kota}} {{$data->tanggal}}
                </td>
                <td>{{$data->agama->agama}}</td>
                <td>{{$data->walimurid->nama}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
