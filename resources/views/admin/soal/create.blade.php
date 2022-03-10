@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Soal</h1>
                    <!-- DataTales Example -->
                        <div class="card-body">
                            <form method="POST" action="{{url('soal/store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="md-5">
                                    <div class="form-group">
                                        <label for="genre" class="form-label">Test</label>
                                        <select class="form-select" id="genre" aria-label="Default select example" name="exam_id">
                                          <option selected>Open this select Test</option>
                                          @foreach ($genre as $g)
                                          <option value="{{$g->id}}">{{$g->nama}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        @error('gambar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" placeholder="masukkan gambar ujian" id="gambar">
                                    </div>
                                    <div class="form-group">
                                        <label for="soal">Soal</label>
                                        @error('soal')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea type="number" class="form-control @error('soal') is-invalid @enderror" name="soal" id="soal" value="">{{old('soal')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihana">Pilihan A</label>
                                        @error('opsi_a')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea type="text" class="form-control @error('opsi_a') is-invalid @enderror" name="opsi_a" id="pilihana" value="">{{old('opsi_a')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihanb">Pilihan B</label>
                                        @error('opsi_b')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea type="text" class="form-control @error('opsi_b') is-invalid @enderror" name="opsi_b" id="pilihanb" value="">{{old('opsi_b')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihanc">Pilihan C</label>
                                        @error('opsi_c')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea type="text" class="form-control @error('opsi_c') is-invalid @enderror" name="opsi_c" id="pilihanc" value="">{{old('opsi_c')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihand">Pilihan D</label>
                                        @error('opsi_d')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea type="text" class="form-control @error('opsi_d') is-invalid @enderror" name="opsi_d" id="pilihand" value="">{{old('opsi_d')}}</textarea>
                                    <div class="form-group">
                                        <label for="pilihane">Pilihan E</label>
                                        @error('opsi_e')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea type="text" class="form-control @error('opsi_e') is-invalid @enderror" name="opsi_e" id="pilihane" value="">{{old('opsi_e')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="kunci">Kunci</label>
                                        @error('kunci')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" class="form-control @error('kunjaw') is-invalid @enderror" name="kunjaw" placeholder="masukkan kunci ujian" id="kunci" value="{{old('kunci')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="waktusoal">Waktu Soal (Quiziz)</label>
                                        @error('waktusoal')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="number" class="form-control @error('waktusoal') is-invalid @enderror" name="waktusoal" placeholder="masukkan waktu soal ujian (detik)" id="waktusoal" value="{{old('waktusoal')}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </form>
                        </div>
                    </div>
                <!-- /.container-fluid -->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
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