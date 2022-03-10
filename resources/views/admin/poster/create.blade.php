@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Test</h1>
                    <!-- DataTales Example -->
                        <div class="card-body">
                            <form method="POST" action="{{url('poster/store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="md-5">
                                    <div class="form-group">
                                    <label for="nama" class="form-label">Nama Ketua</label>
                                    @error('user_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                        <select class="form-select" id="nama" aria-label="Default select example" name="user_id">
                                          <option selected>Open this select Test</option>
                                          @foreach ($data as $g)
                                          <option value="{{$g->user_id}}">{{$g->nama1}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <input type="text" name="namaUser" value="" hidden id="namaUser">
                                    <div class="form-group">
                                        <label for="Poster">Poster</label>
                                        @error('poster')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="file" class="form-control @error('Poster') is-invalid @enderror" name="poster" placeholder="masukkan Poster ujian" id="Poster" value="{{old('poster')}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Buat</button>
                            </form>
                        </div>
                    </div>
                    <script>
                        const opsi = document.querySelector('#nama');
                        const nama = document.querySelector('#namaUser');
                        opsi.addEventListener('change', function(){
                            fetch('/fetch/poster/'+opsi.value)
                                .then(response => response.json())
                                .then(e => nama.value = e)
                        });
                    </script>
@endsection