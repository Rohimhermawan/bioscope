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
                                            <th>Jumlah Likes</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jumlah Likes</th>
                                            <th>Status</th>                      
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->user->name}}</td>
                                            <td>{{$p->likes}}</td>
                                            <td> 
                                                <span id="status{{$loop->iteration}}" class="btn badge">{{$p->user->pembayaran}}</span>
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
                    if (pembayaran[i-1] == 'Belum Bayar') {
                        var belum = document.getElementById('status'+i);
                        belum.classList.add('badge-danger');
                    } else if (pembayaran[i-1] == 'Sudah Bayar') {
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