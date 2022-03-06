@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">
                	@if (session('success'))
	                <div class="alert alert-success">
	                    {{ session('success') }}
	                </div>
	                @endif
	                @if (session('update'))
                    <div class="alert alert-success">
                        {{ session('update') }}
                    </div>
                    @endif
                    @if (session('delete'))
                    <div class="alert alert-success">
                        {{ session('delete') }}
                    </div>
                    @endif
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Soal bioscope</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Soal</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Soal</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>                      
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach ($questions as $p)
                                        <tr>
                                        	<td>{{$i}}</td>
                                            <td><img src="{{url('storage/gambar/soal/'.$p->exam_id. '/' .$p->gambar)}}" width="150px"  alt="{{$p->gambar}}"></td>
                                            <td>{{strip_tags($p->soal)}}</td>
                                            <td>
                                                <a class="btn btn-info" data-toggle="modal" data-target="#detail{{$p->id}}">Show</a>
                                            </td>
                                            <td>
                                            	<form method="GET" action="{{url('soal/edit/'.$p->id)}}">
                                                <button class="btn badge badge-warning p-2">Edit</button>
                                                </form>
                                                <hr>
                                                <a class="btn badge badge-danger p-2" data-toggle="modal" data-target="#deleteModal{{$p->id}}">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($questions as $p)
										<div class="modal fade" id="detail{{$p->id}}" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel{{$p->id}}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document" width="80%">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Soal</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <table>
                                                        <div class="form-group">
                                                            <label for="soal">gambar :</label>
                                                            <div id="soal"><img src="{{url('storage/gambar/soal/'.$p->exam_id. '/' .$p->gambar)}}" alt="{{$p->gambar}}" width="150px"></div>
                                                        </div>
                                                        <tr>
                                                        	<td colspan="2" class="justify-middle">
                                                        		
                                                        	</td>
                                                        </tr>
                                                        <div class="form-group">
                                                            <label for="soal">Soal :</label>
                                                            <div id="soal"><?php echo $p->soal; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="soal">Pilihan A :</label>
                                                            <div id="soal"><?php echo $p->opsi_a; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="soal">Pilihan B :</label>
                                                            <div id="soal"><?php echo $p->opsi_b; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="soal">Pilihan C :</label>
                                                            <div id="soal"><?php echo $p->opsi_c; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="soal">Pilihan D :</label>
                                                            <div id="soal"><?php echo $p->opsi_d; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="soal">Pilihan E :</label>
                                                            <div id="soal"><?php echo $p->opsi_e; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="soal">Kunci :</label>
                                                            <div id="soal"><?php echo $p->kunjaw; ?></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="soal">Waktu :</label>
                                                            <div id="soal"><?php echo $p->waktu; ?></div>
                                                        </div>
                                                      </table>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                <div class="modal-body">Select "Delete" below if you are ready to delete your current question.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{url('soal/'.$p->id)}}" method="POST">
                    <button class=" btn btn-danger">Delete</button>
                    @method('delete')
                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection