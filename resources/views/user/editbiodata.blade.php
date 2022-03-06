@extends('layouts.user')
@section('content')
<div class="container bg-white py-4" style="border-radius: 3px; margin-top: 100px; margin-bottom:140px;">
  <div>
  <p>Silakan isi biodata peserta lomba sesuai dengan jumlah anggota masing-masing kelompok. Apabila terdapat kolom berlebih dapat dikosongkan.</p>
  <p>Ketentuan jumlah anggota tiap cabang lomba:
    	<ul>Medical Olympiad: 3 anggota/tim</ul>
    	<ul>Public Poster: 1 anggota (individu) atau 2 anggota/tim</ul>
    	<ul>Scientific Essay: 2 anggota/tim</ul>
	<p>
  </div>	
  <div class="col-md-11" id="form" style="margin: auto;">
  		<form action="{{url('home/edit/'.$participant->id)}}" method="POST" enctype="multipart/form-data">
  		@csrf
		  <div class="form-group" >
                <ul>Cabang : {{$user->participant[0]->cabang}}</ul>
				<ul>Sekolah : {{$user->participant[0]->sekolah}}</ul>
				<ul>Guru pembimbing : {{$user->participant[0]->pembimbing}}</ul>
             </div>
  			 <div class="row justify-content-center">
	  			<div class="col-md-4 border-left">
	  				<div class="form-group">
	                    <label for="nama1">Nama Ketua</label>
	                    <input type="text" class="form-control @error('nama1') is-invalid @enderror" name="nama1" placeholder="Masukkan Nama Lengkap" id="nama1" value="{{$participant->nama1}}">
	                </div>
                  	@error('nama1')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="kelas1">Kelas</label>
	                    <input type="number" min="10" max="12" class="form-control @error('kelas1') is-invalid @enderror" name="kelas1" id="kelas1" value="{{$participant->kelas1}}">
	                </div>
	                @error('kelas1')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="alamat1">Alamat</label>
	                    <input type="text" class="form-control @error('alamat1') is-invalid @enderror" name="alamat1" placeholder="Masukkan Alamat lengkap" id="alamat1" value="{{$participant->alamat1}}">
	                </div>
	                @error('alamat1')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="telepon1">No. Handphone</label>
	                    <input type="text" class="form-control @error('telepon1') is-invalid @enderror" name="telepon1" placeholder="e.g : 08xxx" id="telepon1" value="{{$participant->telepon1}}">
	                </div>
                	@error('telepon1')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
                	
	                <div class="form-group">
	                    <label for="line1">Id Line</label>
	                    <input type="text" class="form-control @error('line1') is-invalid @enderror" name="line1" placeholder="Masukkan Id Line" id="line1" value="{{$participant->line1}}">
	                </div>
	                @error('line1')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="email1">Alamat Email</label>
	                    <input type="email" class="form-control @error('email1') is-invalid @enderror" name="email1" placeholder="e.g : example@mail.id" id="email1" value="{{$participant->email1}}">
	                </div>
                	@error('email1')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="domisili1">Domisili (Asal kota)</label>
	                    <input type="input" class="form-control @error('domisili1') is-invalid @enderror" name="domisili1" placeholder="e.g : Bandung" id="email1" value="{{$participant->domisili1}}">
	                </div>
	                @error('domisili1')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="foto1">Upload Foto Diri</label>
						<img src="{{url('storage/foto/'.$participant->foto1)}}" alt="" style="width: 50px; height:50px;">
	                    <input type="file" class="form-control @error('foto1') is-invalid @enderror" name="foto1" id="foto1">
	                </div>
	                @error('foto1')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="kartu1">Upload Kartu Pelajar</label>
						<img src="{{url('storage/kartu/'.$participant->kartu1)}}" alt="" style="width: 50px; height:50px;">
	                    <input type="file" class="form-control @error('kartu1') is-invalid @enderror" name="kartu1" id="kartu1">
	                </div>
	                @error('kartu1')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	  			</div>
	  			<div class="col-md-4 border-left">
	  				<div class="form-group">
	                    <label for="nama2">Nama Anggota</label>
	                    <input type="text" class="form-control @error('nama2') is-invalid @enderror" name="nama2" placeholder="Masukkan Nama Lengkap" id="nama2" value="{{$participant->nama2}}">
	                </div>
	                @error('nama2')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="kelas2">Kelas</label>
	                    <input type="number" min="10" max="12" class="form-control @error('kelas2') is-invalid @enderror" name="kelas2" id="kelas2" value="{{$participant->kelas2}}">
	                </div>
	                @error('kelas2')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="alamat2">Alamat</label>
	                    <input type="text" class="form-control @error('alamat2') is-invalid @enderror" name="alamat2" placeholder="Masukkan Alamat lengkap" id="alamat2" value="{{$participant->alamat2}}">
	                </div>
	                @error('alamat2')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="telepon2">No. Handphone</label>
	                    <input type="text" class="form-control @error('telepon2') is-invalid @enderror" name="telepon2" placeholder="e.g : 08xxx" id="telepon2" value="{{$participant->telepon2}}">
	                </div>
	                @error('telepon2')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="line2">Id Line</label>
	                    <input type="text" class="form-control @error('line2') is-invalid @enderror" name="line2" placeholder="Masukkan Id line" id="line2" value="{{$participant->line2}}">
	                </div>
	                @error('line2')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="email2">Alamat Email</label>
	                    <input type="email" class="form-control @error('email2') is-invalid @enderror" name="email2" placeholder="e.g : example@mail.id" id="email2" value="{{$participant->email2}}">
	                </div>
                	@error('email2')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="domisili2">Domisili (Asal kota)</label>
	                    <input type="input" class="form-control @error('domisili2') is-invalid @enderror" name="domisili2" placeholder="e.g : Bandung" id="domisili2" value="{{$participant->domisili2}}">
	                </div>
	                @error('domisili2')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="foto2">Upload Foto Diri</label>
						<img src="{{url('storage/foto/'.$participant->foto2)}}" alt="" style="width: 50px; height:50px;">
	                    <input type="file" class="form-control @error('foto2') is-invalid @enderror" name="foto2" id="foto2">
	                </div>
                	@error('foto2')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="kartu2">Upload Kartu Pelajar</label>
						<img src="{{url('storage/kartu/'.$participant->kartu2)}}" alt="" style="width: 50px; height:50px;">
	                    <input type="file" class="form-control @error('kartu2') is-invalid @enderror" name="kartu2" id="kartu2">
	                </div>
	                @error('kartu2')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	  			</div>
	  			<div class="col-md-4 border-left">
	  				<div class="form-group">
	                    <label for="nama3">Nama Anggota</label>
	                    <input type="text" class="form-control @error('nama3') is-invalid @enderror" name="nama3" placeholder="Masukkan Nama Lengkap" id="nama3" value="{{$participant->nama3}}">
	                </div>
	                @error('nama3')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="kelas3">Kelas</label>
	                    <input type="number" min="10" max="12" class="form-control @error('kelas3') is-invalid @enderror" name="kelas3" id="kelas3" value="{{$participant->kelas3}}">
	                </div>
	                @error('kelas3')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="alamat3">Alamat</label>
	                    <input type="text" class="form-control @error('alamat3') is-invalid @enderror" name="alamat3" placeholder="Masukkan Alamat lengkap" id="alamat3" value="{{$participant->alamat3}}">
	                </div>
	                @error('alamat3')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="telepon3">No. Handphone</label>
	                    <input type="text" class="form-control @error('telepon3') is-invalid @enderror" name="telepon3" placeholder="e.g : 08xxx" id="telepon3" value="{{$participant->telepon3}}">
	                </div>
	                @error('telepon3')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="line3">Id Line</label>
	                    <input type="text" class="form-control @error('line3') is-invalid @enderror" name="line3" placeholder="Masukkan Id Line" id="line3" value="{{$participant->line3}}">
	                </div>
	                @error('line3')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="email3">Alamat Email</label>
	                    <input type="email" class="form-control @error('email3') is-invalid @enderror" name="email3" placeholder="e.g : example@mail.id" id="email3" value="{{$participant->email3}}">
	                </div>
	                @error('email3')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="domisili3">Domisili (Asal kota)</label>
	                    <input type="input" class="form-control @error('domisili3') is-invalid @enderror" name="domisili3" placeholder="e.g : Bandung" id="domisili3" value="{{$participant->domisili3}}">
	                </div>
	                @error('domisili3')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="foto3">Upload Foto Diri</label>
						<img src="{{url('storage/foto/'.$participant->foto3)}}" alt="" style="width: 50px; height:50px;">
	                    <input type="file" class="form-control @error('foto3') is-invalid @enderror" name="foto3" id="foto3">
	                </div>
                	@error('foto3')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	                <div class="form-group">
	                    <label for="kartu3">Upload Kartu Pelajar</label>
						<img src="{{url('storage/kartu/'.$participant->kartu3)}}" alt="" style="width: 50px; height:50px;">
	                    <input type="file" class="form-control @error('kartu3') is-invalid @enderror" name="kartu3" id="kartu3">
	                </div>
	                @error('kartu3')
                    <div class="alert alert-danger">{{ $message }}</div>
                	@enderror
	  			</div>
  			 </div>
  			 <button type="submit" class="badge btn bg-success mt-4 p-3">Change!</button>	
  		</form>
  	</div>			
@endsection
