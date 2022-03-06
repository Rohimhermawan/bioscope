@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Test bioscope</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Soal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Soal</th>                      
                                    </tfoot>
                                    <tbody>
                                        @foreach($data as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{"quiziz_".$d->exam_id}}</td>
                                            <td>
                                                <form method="GET" action="{{url('quiziz/'.$d->exam_id)}}">
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
@endsection