@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Test</h1>
                    <!-- DataTales Example -->
                        <div class="card-body">
                            <form method="POST" action="{{url('test/store')}}">
                                @csrf
                                <div class="md-5">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="masukkan nama ujian" id="nama" value="{{old('nama')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu">Durasi</label>
                                        @error('waktu')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="number" class="form-control @error('waktu') is-invalid @enderror" name="waktu" placeholder="masukkan waktu ujian (menit)" id="waktu" value="{{old('waktu')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="soal">Jumlah Soal</label>
                                        @error('soal')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" class="form-control @error('soal') is-invalid @enderror" name="soal" placeholder="masukkan jumlah soal ujian" id="soal" value="{{old('soal')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="peraturan">Peraturan</label>
                                        @error('peraturan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea type="text" class="form-control @error('peraturan') is-invalid @enderror" name="peraturan" placeholder="masukkan peraturan ujian" id="peraturan">{{old('peraturan')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Waktu Ujian</label>
                                        @error('tanggal')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        {{old('tanggal')}}
                                       <input type='datetime-local' class="form-control @error('time') is-invalid @enderror" name="tanggal" id="time">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Buat</button>
                            </form>
                        </div>
                    </div>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    var peraturan = document.getElementById('peraturan');
    CKEDITOR.replace(peraturan);
    CKEDITOR.config.allowedContent = true;
</script>
@endsection