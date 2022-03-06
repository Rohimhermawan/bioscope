@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Peserta bioscope</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Region</th>
                                            <th>Email</th>
                                            <th>No. Handphone</th>
                                            <th>Detail</th>
                                            <th>Pass</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Region</th>
                                            <th>Email</th>
                                            <th>No. Handphone</th>
                                            <th>Detail</th>
                                            <th>Pass</th>                                       
                                    </tfoot>
                                    <tbody>
                                        @foreach ($participants as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->user->name}}</td>
                                            <td> <button id="status{{$loop->iteration}}" class="badge btn px-3 py-1">{{$p->user->pembayaran}}</button></td>
                                            <td>{{$p->cabang}}</td>
                                            <td>{{$p->email1}}</td>
                                            <td>{{$p->telepon1}}</td>
                                            <td>
                                                <a class="btn btn-info" href="" data-toggle="modal" data-target="#detail{{$p->id}}">
                                                Show
                                                </a>
                                            </td>
                                            <td>
                                                <div class="form-switch">
                                                    <form method="POST" action="{{url('pass/'.$p->user->id)}}">
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
                <!-- detaile -->
                @foreach ($participants as $p)
                                        <div class="modal fade" id="detail{{$p->id}}" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel{{$p->id}}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document" width="80%">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Biodata Peserta</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <table>
                                                        <tr>
                                                            <td>Sekolah</td>
                                                            <td>: {{$p->sekolah}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cabang Lomba</td>
                                                            <td>: {{$p->cabang}}</td>
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td>Nama Ketua</td>
                                                            <td>: {{$p->nama1}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kelas</td>
                                                            <td>: {{$p->kelas1}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>: {{$p->alamat1}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>telepon</td>
                                                            <td>: {{$p->telepon1}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>line</td>
                                                            <td>: {{$p->line1}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>email</td>
                                                            <td>: {{$p->email1}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>foto</td>
                                                            <td>: <img src="{{asset('storage/foto/'.$p->foto1)}}" width="300px"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>kartu</td>
                                                            <td>: <img src="{{asset('storage/kartu/'.$p->kartu1)}}" width="300px"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama anggota</td>
                                                            <td>: {{$p->nama2}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sekolah</td>
                                                            <td>: {{$p->sekolah2}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kelas</td>
                                                            <td>: {{$p->kelas2}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>: {{$p->alamat2}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>telepon</td>
                                                            <td>: {{$p->telepon2}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>line</td>
                                                            <td>: {{$p->line2}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>email</td>
                                                            <td>: {{$p->email2}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>foto</td>
                                                            <td>: <img src="{{asset('storage/foto/'.$p->foto2)}}" width="300px"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>kartu</td>
                                                            <td>: <img src="{{asset('storage/kartu/'.$p->kartu2)}}" width="300px"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama anggota</td>
                                                            <td>: {{$p->nama3}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sekolah</td>
                                                            <td>: {{$p->sekolah3}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kelas</td>
                                                            <td>: {{$p->kelas3}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>: {{$p->alamat3}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>telepon</td>
                                                            <td>: {{$p->telepon3}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>line</td>
                                                            <td>: {{$p->line3}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>email</td>
                                                            <td>: {{$p->email3}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>foto</td>
                                                            <td>: <img src="{{asset('storage/foto/'.$p->foto3)}}" width="300px"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>kartu</td>
                                                            <td>: <img src="{{asset('storage/kartu/'.$p->kartu3)}}" width="300px"></td>
                                                        </tr>
                                                      </table>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                @endforeach
                <script type="text/javascript">
                    let id = [{{implode(",", $id)}}];
                    let pembayaran = [<?php
                    $ids = [];
                        foreach($pembayaran as $i) {
                            $ids[] = "'".$i."'";
                        }
                        echo implode(',', $ids);
                        ?>];
                    for (let i = 1; i <= Math.max.apply(Math, id); i++) {    
                        if (pembayaran[i-1] == 'Sudah Bayar') {
                            var sudah = document.getElementById('status'+i);
                            sudah.classList.add('badge-info');
                        } else if (pembayaran[i-1] == 'Lolos') {
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
                </script>
@endsection
