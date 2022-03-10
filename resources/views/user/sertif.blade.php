<!DOCTYPE html>
<html>
<head>
    <title>{{$data->participant->nama1}}</title>
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
    @if ($data->pembayaran == "Sudah Bayar")    
    @if ($data->participant->nama2)
    <div class="page-break"></div>
    @endif
    @if ($data->participant->nama3)
    <div class="page-break"></div>
    @endif
    @endif
    @if ($data->pembayaran == "Lolos")    
    <div class="page-break"></div>
    @if ($data->participant->nama2)
    <div class="page-break"></div>
    @endif
    @if ($data->participant->nama3)
    <div class="page-break"></div>
    @endif
    @endif
</body>
</html>