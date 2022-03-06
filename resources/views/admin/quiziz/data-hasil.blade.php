@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 ml-3 text-gray-800">Test bioscope</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Benar</th>
                                            <th>Salah</th>
                                            <th>kosong</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Benar</th>
                                            <th>Salah</th>
                                            <th>kosong</th>
                                            <th>Score</th>                      
                                    </tfoot>
                                    <tbody>
                                        @foreach ($user as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->quiziz1->where('exam_id', $id)->first()->benar??'--'}}</td>
                                            <td>{{$p->quiziz1->where('exam_id', $id)->first()->salah??'--'}}</td>
                                            <td>{{$p->quiziz1->where('exam_id', $id)->first()->kosong??'--'}}</td>
                                            <td>{{$p->quiziz1->where('exam_id', $id)->first()->score??'--'}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
@endsection