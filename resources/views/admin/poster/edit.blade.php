@extends ('layouts.panel') 
@section ('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ubah Test</h1>
                    <!-- DataTales Example -->
                        <div class="card-body">
                            <form method="POST" action="{{url('poster/edit/'.$data->id)}}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="md-5">
                                    <div class="form-group">
                                        Nama : {{$data->user->name}}
                                    </div>
                                    <input type="text" value="{{$data->poster}}" name="riwayat" hidden>
                                    <div class="form-group">
                                        <label for="Poster">Poster</label>
                                        @error('poster')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="file" class="form-control @error('Poster') is-invalid @enderror" name="poster" placeholder="masukkan Poster ujian" id="Poster" value="{{old('poster')}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Ubah</button>
                            </form>
                        </div>
                    </div>
                <!-- /.container-fluid -->
<script>
    var peraturan = document.getElementById('peraturan');
    CKEDITOR.replace(peraturan);
    CKEDITOR.config.allowedContent = true;
</script>
@endsection