@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 ml-3 text-gray-800">Test bioscope</h1>
                    <!-- DataTales Example -->
                        <div class="card-body">
                            <div class="table-responsive bg-white p-4">
                                <table class="table table-bordered text-center table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Durasi</th>
                                            <th>Jumlah soal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Print</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Durasi</th>
                                            <th>Jumlah soal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Print</th>                      
                                    </tfoot>
                                    <tbody>
                                        @foreach ($exams as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->nama}}</td>
                                            <td>{{$p->waktu}}</td>
                                            <td>{{$p->soal}}</td>
                                            <td>
                                                <span id="status{{$loop->iteration}}" class="btn badge">{{$p->keterangan}}</span>
                                            </td>
                                            <td>
                                                <form method="GET" action="{{url('test/result/'.$p->id)}}">
                                                    <button type="submit" class="btn badge badge-info p-2">Show</button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{url('result/print/'.$p->id)}}" class="btn badge badge-primary p-2" target="_blank">Print</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->
                @foreach ($exams as $p)
                <script type="text/javascript">
                if ('{{$p->keterangan}}' == 'Tidak Aktif') {
                var belum = document.getElementById('status{{$loop->iteration}}');
                belum.classList.add('badge-danger');
                } else if ('{{$p->keterangan}}' == 'Aktif') {
                var sudah = document.getElementById('status{{$loop->iteration}}');
                sudah.classList.add('badge-success');
                }

                </script>
@endforeach
@endsection