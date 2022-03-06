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
                            <script>var id = []; var pembayaran = [];</script>
                                <table class="table table-bordered text-center table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Score</th>
                                            <th>Hasil</th>
                                            <th>Status</th>
                                            <th>Pass</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Score</th>
                                            <th>Hasil</th>
                                            <th>Status</th>
                                            <th>Pass</th>                      
                                    </tfoot>
                                    <tbody>
                                        @foreach ($user as $p)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->result->where('exam_id', $kode)->first()->score??'--'}}</td>
                                            <td>
                                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#detail{{$p->id}}">Show</a>
                                            </td>
                                            <td>
                                                <button id="status{{$loop->iteration}}" class="badge badge-info px-3 py-1 btn">{{$p->pembayaran}}</button>
                                            </td>
                                            <td>
                                                <div class="form-switch">
                                                    <form method="POST" action="{{url('pass/'.$p->id)}}">
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
               @foreach ($user as $p )
                <script>
                    pembayaran.push('{{$p->pembayaran}}');
                    id.push('{{$p->id}}');
                </script>
                                        <div class="modal fade" id="detail{{$p->id}}" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel{{$p->id}}" style="box-sizing: border-box;" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document" style="width: 800px !important">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hasil Peserta</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <table>
                                                        <tr>
                                                            <td>
                                                        @foreach($p->answer->where('exam_id', $kode)->sortBy('question_id') as $u)
                                                                <span class="mx-1" value="{{$u->hasil}}" id="jawaban{{$p->id}}{{$loop->iteration}}">{{$loop->iteration}}. {{$u->jawaban}}
                                                                </span>
                                                                @if($loop->iteration == $exams->soal)
                                                                 @break
                                                                @endif
                                                        @endforeach
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Soal terjawab</td>
                                                            <td>: {{$p->result->where('exam_id', $kode)->first()->dijawab??'--'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Benar</td>
                                                            <td>: {{$p->result->where('exam_id', $kode)->first()->benar??'--'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Salah</td>
                                                            <td>: {{$p->result->where('exam_id', $kode)->first()->salah??'--'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kosong</td>
                                                            <td>: {{$p->result->where('exam_id', $kode)->first()->kosong??'--'}}</td>
                                                        </tr>
                                                      </table>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            @endforeach

<script>
for (let j = 1; j <= Math.max.apply(Math, id); j++) {
    if (pembayaran[j-1] == 'Lolos') {
    var sudah = document.getElementById('status'+j);
    sudah.classList.add('badge-success');
    sudah.classList.remove('badge-info');
    var konfirm = document.getElementById('konfirm'+j);
    konfirm.setAttribute("checked","");
}
    for (let i = 1; i <= {{$exams->soal}}; i++) {
        var jawaban = document.getElementById('jawaban'+""+(id[j-1]+i));
        var nilai = jawaban.getAttribute('value');
            if (nilai == 'Benar') {
                jawaban.style.color = 'lightgreen';
            } else if (nilai == 'Kosong') {
                jawaban.style.color = 'yellow';
            } else  {
                jawaban.style.color = 'red';
            }    
    }
}
</script>                

@endsection