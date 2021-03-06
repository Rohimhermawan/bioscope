@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Pembayaran</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Konfirmasi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>                                       
                                            <th>Status</th>
                                            <th>Konfirmasi</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($bayar as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->email}}</td>
                                            <td>
                                                <button id="status{{$loop->iteration}}" class="btn badge">{{$p->pembayaran}}</button>
                                            </td>
                                            <td>
                                                <div class="form-switch">
                                                <form method="POST" action="{{url('confirm/'.$p->id)}}">
                                                  @csrf
                                                  <input class="form-check-input ml-2" type="checkbox" id="konfirm{{$loop->iteration}}" >
                                                    <button type="submit" class=" p-3" style="z-index: 2; margin-right: 30px; opacity: 0;"></button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    fetch('/fetch/participant')
                        .then(response => response.json())
                        .then(data => {  
                            for (let i = 1; i <= Object.keys(data).length; i++) {
                                if (data[i-1].pembayaran == 'Sudah Bayar') {
                                    var sudah = document.getElementById('status'+i);
                                    sudah.classList.add('badge-info');
                                } else if (data[i-1].pembayaran == 'Lolos') {
                                    var lolos = document.getElementById('status'+i);
                                    lolos.classList.add('badge-success');
                                    lolos.classList.remove('badge-warning');
                                    var konfirm = document.getElementById('konfirm'+i);
                                    konfirm.setAttribute("checked","");
                                } else {
                                    var none = document.getElementById('status'+i);
                                    none.classList.add('badge-warning');
                                }
                            }
                        });
                </script>
                <!-- /.container-fluid -->
@endsection