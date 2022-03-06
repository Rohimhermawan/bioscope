<!DOCTYPE html>
<html>
<head>
    <title>{{$data->nama1}}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap');
        @page {
            margin: 0 !important;
        }
        body {
            margin: 0 !important;
            background-image: url("data:image/png;base64,{{base64_encode(file_get_contents(public_path('files/kartu-peserta.jpg')))}}");
            background-size:100%;
        }
        .page-break {
            page-break-before: always;
            margin-bottom: 35%;
        }
        td {
            font-family: 'Roboto', 'sans-serif';
            font-size: 20px;
            font-weight: 900;
        }
    </style>
</head>
<body>
<img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('storage/foto/'.$data->foto1)))}}" alt="Pas Foto Peserta" style="width:150px; height:200px; position:absolute; top:35%; left:37%; border:3px solid black; box-shadow:0 0 7px black;">
<table style="margin-top: 62%; margin-left:30%; color:#032c54;">
    <tr>
        <td>Cabang</td>
        <td>: {{$data->cabang}}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>: {{$data->nama1}}</td>
    </tr>
    <tr>
        <td>Sekolah</td>
        <td>: {{$data->sekolah}}</td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>: {{$data->kelas1}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{$data->alamat1}}</td>
    </tr>
    <tr>
        <td>Telepon</td>
        <td>: {{$data->telepon1}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>: {{$data->email1}}</td>
    </tr>
    </table>
    @if ($data->nama2)
    <div class="page-break"></div>
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('storage/foto/'.$data->foto2)))}}" alt="Pas Foto Peserta" style="width:150px; height:200px; position:absolute; top:35%; left:37%; border:3px solid black; box-shadow:0 0 7px black;">
        <table style="position:relative; top: 62%; margin-left:30%; color:#032c54;">
    <tr>
        <td>Cabang</td>
        <td>: {{$data->cabang}}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>: {{$data->nama2}}</td>
    </tr>
    <tr>
        <td>Sekolah</td>
        <td>: {{$data->sekolah}}</td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>: {{$data->kelas2}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{$data->alamat2}}</td>
    </tr>
    <tr>
        <td>Telepon</td>
        <td>: {{$data->telepon2}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>: {{$data->email2}}</td>
    </tr>
    </table>
    @endif
    @if ($data->nama3)
    <div class="page-break"></div>
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('storage/foto/'.$data->foto3)))}}" alt="Pas Foto Peserta" style="width:150px; height:200px; position:absolute; top:35%; left:37%; border:3px solid black; box-shadow:0 0 7px black;">
    <table style="position:relative; top: 62%; margin-left:30%; color:#032c54;">
    <tr>
        <td>Cabang</td>
        <td>: {{$data->cabang}}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>: {{$data->nama3}}</td>
    </tr>
    <tr>
        <td>Sekolah</td>
        <td>: {{$data->sekolah}}</td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>: {{$data->kelas3}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: {{$data->alamat3}}</td>
    </tr>
    <tr>
        <td>Telepon</td>
        <td>: {{$data->telepon3}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>: {{$data->email3}}</td>
    </tr>
    </table>
    @endif
</body>
</html>