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
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Id Line</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Id Line</th>
                                            <th>Action</th>                      
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $p)
                                        @if ($p->restrict->where('jumlah', '>', 0)->first()->jumlah??0 > 0)
                                        <tr>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->restrict->first()->jumlah}}</td>
                                            <td>{{$p->participant->first()->line1??""}}</td>
                                            <td>
                                                <a class="btn badge badge-danger p-2" data-toggle="modal" data-target="#deleteModal{{$p->id}}">Reset</a>
                                            </td>
                                        </tr>
                                        <!-- Sure Modal-->
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
                                                    <div class="modal-body">Select "Reset" below if you are ready to delete your current test.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <form action="{{url('admin/controllers/reset/'.$p->restrict->first()->id)}}" method="POST">
                                                        <button class=" btn btn btn-danger p-2">Reset</button>
                                                        @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
@endsection