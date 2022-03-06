@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (session('delete'))
                    <div class="alert alert-success">
                        {{ session('delete') }}
                    </div>
                    @endif
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Upload Pembayaran</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Cabang</th>
                                            <th>Bank</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Konfirmasi</th>
                                            <th>Tolak</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Cabang</th>
                                            <th>Bank</th>
                                            <th>Bukti Pembayaran</th>                                       
                                            <th>Konfirmasi</th>
                                            <th>Tolak</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($user as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->participant->first()->cabang}}</td>
                                            <td>dari <b>{{$p->participant->first()->pengirim}}</b> ke <b>{{$p->participant->first()->penerima}}</b></td>
                                            <td><a class="btn btn-info" href="" data-toggle="modal" data-target="#detail{{$p->id}}">Show</a>
                                            <td>
                                                <div class="form-switch">
                                                <form method="POST" action="{{url('confirm/'.$p->id)}}">
                                                  @csrf
                                                  <input class="form-check-input ml-2" type="checkbox" id="konfirm{{$loop->iteration}}" >
                                                    <button type="submit" class=" p-3" style="z-index: 2; margin-right: 30px; opacity: 0;"></button>
                                                </form>
                                                </div>
                                            </td>
                                            <td>
                                            <div class="form-switch">
                                                <form method="POST" action="{{url('reject/'.$p->id)}}">
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
                <!-- /.container-fluid -->
                <!-- modal -->
                @foreach ($user as $p)
                <div class="modal fade" id="detail{{$p->id}}" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel{{$p->id}}" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-scrollable" role="document" width="80%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran Peserta</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{asset('storage/pembayaran/'.$p->participant[0]->bukti)}}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
@endsection