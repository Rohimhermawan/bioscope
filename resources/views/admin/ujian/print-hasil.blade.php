<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ujian</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap');
        @page {
            margin: 0 !important;
        }
        @page {
            margin: 0 !important;
        }
        body{
            font-family: 'Roboto', 'sans-serif';
            padding: 20px;
            margin: 0;
        }
        table, td, th {
            border: 1px solid black ;
        }
        table {
            border-collapse:collapse;
            text-align: center;
            width: 100%;
        }
        .container {
            background-color: white;
            padding: 5px;
            border-radius: 5px;
        }
        section {
            background-color: #adadad; 
            padding:4px; 
            padding-top:1px; 
            padding-right:1px; 
            border-radius:5px;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="text-align:center;">Hasil Ujian : {{$data->first()->exam->nama??'--'}}</h1>
    </header>
    <section>
        <div class="container" >
            <table class="table table-dark table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Score</th>
                        <th>Benar</th>
                        <th>Salah</th>
                        <th>Kosong</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{$loop->iteration??'--'}}</td>
                        <td>{{$d->user->name??'--'}}</td>
                        <td>{{$d->user->email??'--'}}</td>
                        <td>{{$d->score??'--'}}</td>
                        <td>{{$d->benar??'--'}}</td>
                        <td>{{$d->salah??'--'}}</td>
                        <td>{{$d->kosong??'--'}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Score</th>
                        <th>Benar</th>
                        <th>Salah</th>
                        <th>Kosong</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>