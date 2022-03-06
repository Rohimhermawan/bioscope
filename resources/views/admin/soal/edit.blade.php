@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Soal</h1>
                    <!-- DataTales Example -->
                        <div class="card-body">
                            <form method="POST" action="{{url('soal/'.$data->id)}}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="md-5">
                                    <div class="form-group">
                                        <label for="genre" class="form-label">Test</label>
                                        <select class="form-select" id="genre" aria-label="Default select example" name="exam_id">
                                          <option value="{{$data->exam_id}}">{{$nama}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <img src="{{url('storage/gambar/.$data->gambar')}}"><br>
                                        <label for="gambar">Gambar</label>
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="$data->gambar">
                                    </div>
                                    <div class="form-group">
                                        <label for="soal">Soal</label>
                                        <textarea type="number" class="form-control @error('soal') is-invalid @enderror" name="soal" id="soal">
                                    </div>{{$data->soal}}</textarea>
                                    <div class="form-group">
                                        <label for="pilihana">Pilihan A</label>
                                        <textarea type="text" class="form-control @error('pilihana') is-invalid @enderror" name="opsi_a" id="pilihana">{{$data->opsi_a}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihanb">Pilihan B</label>
                                        <textarea type="text" class="form-control @error('pilihanb') is-invalid @enderror" name="opsi_b" id="pilihanb">{{$data->opsi_b}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihanc">Pilihan C</label>
                                        <textarea type="text" class="form-control @error('pilihanc') is-invalid @enderror" name="opsi_c" id="pilihanc">{{$data->opsi_c}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihand">Pilihan D</label>
                                        <textarea type="text" class="form-control @error('pilihand') is-invalid @enderror" name="opsi_d" id="pilihand">{{$data->opsi_d}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihane">Pilihan E</label>
                                        <textarea type="text" class="form-control @error('pilihane') is-invalid @enderror" name="opsi_e" id="pilihane">{{$data->opsi_e}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="kunci">Kunci</label>
                                        <input type="text" class="form-control @error('kunci') is-invalid @enderror" name="kunjaw" placeholder="masukkan kunci ujian" id="kunci" value="{{$data->kunjaw}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="waktusoal">Waktu Soal</label>
                                        <input type="number" class="form-control @error('waktusoal') is-invalid @enderror" name="waktu" placeholder="masukkan waktusoal ujian" id="waktusoal" value="{{$data->waktu}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Ganti</button>
                            </form>
                        </div>
                    </div>
                <!-- /.container-fluid -->
<script>
    var peraturan = document.getElementById('peraturan');
    CKEDITOR.replace(soal);
    CKEDITOR.replace(pilihana);
    CKEDITOR.replace(pilihanb);
    CKEDITOR.replace(pilihanc);
    CKEDITOR.replace(pilihand);
    CKEDITOR.replace(pilihane);
    CKEDITOR.config.allowedContent = true;
</script>
@endsection