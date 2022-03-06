@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('delete'))
                    <div class="alert alert-success">
                        {{ session('delete') }}
                    </div>
                    @endif
                    @if (session('update'))
                    <div class="alert alert-success">
                        {{ session('update') }}
                    </div>
                    @endif
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Test bioscope</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="m-0 font-weight-bold text-white btn btn-dark" href="{{url('test/create')}}">Tambah Ujian</a>
                            <a class="m-0 font-weight-bold text-white btn btn-secondary" href="{{url('soal/create')}}">Tambah Soal</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Durasi</th>
                                            <th>Jumlah soal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Soal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Durasi</th>
                                            <th>Jumlah soal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Soal</th>                      
                                    </tfoot>
                                    <tbody>
                                        @foreach ($exams as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->nama}}</td>
                                            <td>{{$p->waktu}}</td>
                                            <td>{{$p->soal}}</td>
                                            <td>
                                                <form method="GET" action="{{url('test/'.$p->id)}}">
                                                <button class="btn badge badge-warning p-2">Edit</button>
                                                </form>
                                                <hr>
                                                <a class="btn badge badge-danger p-2" data-toggle="modal" data-target="#deleteModal{{$p->id}}">Delete</a>
                                            </td>
                                            <td> 
                                                <span id="status{{$loop->iteration}}" class="btn badge">{{$p->keterangan}}</span>
                                                <div class="form-check form-switch">
                                                    <form method="GET" action="{{url('test/active/'.$p->id)}}">
                                                        <input class="form-check-input ml-2" type="checkbox" id="konfirm{{$loop->iteration}}" >
                                                        <button type="submit" class=" p-3" style="z-index: 2; margin-right: 30px; opacity: 0;"></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <form method="GET" action="{{url('soal/'.$p->id)}}">
                                                	<button type="submit" class="btn badge badge-info p-2">Show</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <!-- Sure Modal-->
                @foreach($exams as $p)
                <div class="modal fade" id="deleteModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Delete" below if you are ready to delete your current test.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action="{{url('test/'.$p->id)}}" method="POST">
                                <button class=" btn btn btn-danger p-2">Delete</button>
                                @method('delete')
                                @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>     
@endforeach
 @foreach ($exams as $p)
                <script type="text/javascript">
                if ('{{$p->keterangan}}' == 'Tidak Aktif') {
                var belum = document.getElementById('status{{$loop->iteration}}');
                belum.classList.add('badge-danger');
                } else if ('{{$p->keterangan}}' == 'Aktif') {
                var sudah = document.getElementById('status{{$loop->iteration}}');
                sudah.classList.add('badge-success');
                var konfirm = document.getElementById('konfirm{{$loop->iteration}}');
                konfirm.setAttribute("checked","");
                }

                </script>
@endforeach
@endsection