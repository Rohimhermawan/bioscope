@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tracing Poster bioscope</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                            <th>Device</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Time</th>                                            
                                            <th>Action</th>                                            
                                            <th>Device</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data->trace as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->poster->user->name}}</td>
                                            <td>{{$p->poster->user->email}}</td>
                                            <td>{{date('d-m-Y H:i:s', strtotime($p->created_at)+60*60*7)}}</td>
                                            <td>{{$p->action}}</td>
                                            <td>{{$p->device}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->   
@endsection