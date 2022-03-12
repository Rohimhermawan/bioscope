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
                    <h1 class="h3 mb-2 text-gray-800">Poster bioscope</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="m-0 font-weight-bold text-white btn btn-secondary" href="{{url('poster/create')}}">Tambah Poster</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Poster</th>
                                            <th>Sekolah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Poster</th>
                                            <th>Sekolah</th>
                                            <th>Action</th>                                            
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->user->name}}</td>
                                            <td><img src="{{url('storage/poster/'.$p->poster)}}" alt="Poster" class="img-fluid" width="100px" height="100px"></td>
                                            <td>{{$p->user->participant->first()->sekolah}}</td>
                                            <td>
                                                <form method="GET" action="{{url('poster/edit/'.$p->id)}}">
                                                <button class="btn badge badge-warning p-2"><i class="fa fa-pencil"></i></button>
                                            </button>
                                                </form>
                                                <hr>
                                                <a class="btn badge badge-danger p-2" data-toggle="modal" data-target="#deleteModal{{$p->id}}"><i class="fa fa-trash"></i></a>
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
                @foreach($data as $p)
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
                            <div class="modal-body">Select "Delete" below if you are ready to delete your current Poster.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action="{{url('poster/delete/'.$p->id)}}" method="POST">
                                <button class=" btn btn btn-danger p-2">Delete</button>
                                @method('delete')
                                @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>     
@endforeach
@endsection