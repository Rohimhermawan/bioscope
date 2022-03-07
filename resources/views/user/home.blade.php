@extends('layouts.user')
@section('content')
<div class="container bg-white py-4" style="border-radius: 3px; margin-top: 100px;margin-bottom:140px;">
  <div>
	<p>Silakan isi biodata peserta lomba sesuai dengan jumlah anggota masing-masing kelompok. Apabila terdapat kolom berlebih dapat dikosongkan.</p>
	<p>Ketentuan jumlah anggota tiap cabang lomba:
    	<ul>Medical Olympiad: 3 anggota/tim</ul>
    	<ul>Public Poster: 1 anggota (individu) atau 2 anggota/tim</ul>
    	<ul>Scientific Essay: 2 anggota/tim</ul>
	<p>
  </div>	
  <div class="col-md-11" id="form" style="margin: auto;">
  		<form action="{{url('home/check/'.$user->first()->participant->id)}}" method="POST" enctype="multipart/form-data">
  		@csrf
  			<div class="form-group" >
                <ul>Cabang : {{$user->first()->participant->cabang}}</ul>
				<ul>Sekolah : {{$user->first()->participant->sekolah}}</ul>
				<ul>Guru pembimbing : {{$user->first()->participant->pembimbing}}</ul>
             </div>
  			 <div class="row justify-content-center">
	  			<div class="col-md-4 border-left">
	  				<div class="form-group">
	                    <label for="nama1">Nama Ketua</label>
						@error('nama1')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('nama1') is-invalid @enderror" name="nama1" placeholder="Masukkan Nama Lengkap" id="nama1" value="{{old('nama1',$user->first()->name)}}">
	                </div>
	                <div class="form-group">
	                    <label for="kelas1">Kelas</label>
						@error('kelas1')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="number" min="10" max="12" class="form-control @error('kelas1') is-invalid @enderror" name="kelas1" id="kelas1" value="{{old('kelas1')}}">
	                </div>
	                <div class="form-group">
	                    <label for="alamat1">Alamat</label>
						@error('alamat1')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('alamat1') is-invalid @enderror" name="alamat1" placeholder="Masukkan Alamat lengkap" id="alamat1" value="{{old('alamat1')}}">
	                </div>
	                <div class="form-group">
	                    <label for="telepon1">No. Handphone</label>
						@error('telepon1')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('telepon1') is-invalid @enderror" name="telepon1" placeholder="e.g : 08xxx" id="telepon1" value="{{old('telepon1')}}">
	                </div>
	                <div class="form-group">
	                    <label for="line1">Id Line</label>
						@error('line1')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('line1') is-invalid @enderror" name="line1" placeholder="Masukkan Id Line" id="line1" value="{{old('line1')}}">
	                </div>
	                <div class="form-group">
	                    <label for="email1">Alamat Email</label>
						@error('email1')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="email" class="form-control @error('email1') is-invalid @enderror" name="email1" placeholder="e.g : example@mail.id" id="email1" value="{{old('email1')}}">
	                </div>
	                <div class="form-group">
	                    <label for="domisili1">Domisili (Asal kota)</label>
						@error('domisili1')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="input" class="form-control @error('domisili1') is-invalid @enderror" name="domisili1" placeholder="e.g : Bandung" id="email1" value="{{old('domisili1')}}">
	                </div>
	                <div class="form-group">
	                    <label for="foto1">Upload Foto Diri</label>
						@error('foto1')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="file" class="form-control @error('foto1') is-invalid @enderror" name="foto1" id="foto1" >
	                </div>
	                <div class="form-group">
	                    <label for="kartu1">Upload Kartu Pelajar</label>
						@error('kartu1')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="file" class="form-control @error('kartu1') is-invalid @enderror" name="kartu1" id="kartu1">
	                </div>
	  			</div>
	  			<div class="col-md-4 border-left">
	  				<div class="form-group">
	                    <label for="nama2">Nama Anggota</label>
						@error('nama2')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('nama2') is-invalid @enderror" name="nama2" placeholder="Masukkan Nama Lengkap" id="nama2" value="{{old('nama2')}}">
	                </div>
	                <div class="form-group">
	                    <label for="kelas2">Kelas</label>
						@error('kelas2')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="number" min="10" max="12" class="form-control @error('kelas2') is-invalid @enderror" name="kelas2" id="kelas2" value="{{old('kelas2')}}">
	                </div>
	                <div class="form-group">
	                    <label for="alamat2">Alamat</label>
						@error('alamat2')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('alamat2') is-invalid @enderror" name="alamat2" placeholder="Masukkan Alamat lengkap" id="alamat2" value="{{old('alamat2')}}">
	                </div>
	                <div class="form-group">
	                    <label for="telepon2">No. Handphone</label>
						@error('telepon2')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('telepon2') is-invalid @enderror" name="telepon2" placeholder="e.g : 08xxx" id="telepon2" value="{{old('telepon2')}}">
	                </div>
	                <div class="form-group">
	                    <label for="line2">Id Line</label>
						@error('line2')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('line2') is-invalid @enderror" name="line2" placeholder="Masukkan Id line" id="line2" value="{{old('line2')}}">
	                </div>
	                <div class="form-group">
	                    <label for="email2">Alamat Email</label>
						@error('email2')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="email" class="form-control @error('email2') is-invalid @enderror" name="email2" placeholder="e.g : example@mail.id" id="email2" value="{{old('email2')}}">
	                </div>
	                <div class="form-group">
	                    <label for="domisili2">Domisili (Asal kota)</label>
						@error('domisili2')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="input" class="form-control @error('domisili2') is-invalid @enderror" name="domisili2" placeholder="e.g : Bandung" id="domisili2" value="{{old('domisili2')}}">
	                </div>
	                <div class="form-group">
	                    <label for="foto2">Upload Foto Diri</label>
						@error('foto2')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="file" class="form-control @error('foto2') is-invalid @enderror" name="foto2" id="foto2">
	                </div>
	                <div class="form-group">
	                    <label for="kartu2">Upload Kartu Pelajar</label>
						@error('kartu2')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="file" class="form-control @error('kartu2') is-invalid @enderror" name="kartu2" id="kartu2">
	                </div>
	  			</div>
	  			<div class="col-md-4 border-left">
	  				<div class="form-group">
	                    <label for="nama3">Nama Anggota</label>
						@error('nama3')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('nama3') is-invalid @enderror" name="nama3" placeholder="Masukkan Nama Lengkap" id="nama3" value="{{old('nama3')}}">
	                </div>
	                <div class="form-group">
	                    <label for="kelas3">Kelas</label>
						@error('kelas3')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="number" min="10" max="12" class="form-control @error('kelas3') is-invalid @enderror" name="kelas3" id="kelas3" value="{{old('kelas3')}}">
	                </div>
	                <div class="form-group">
	                    <label for="alamat3">Alamat</label>
						@error('alamat3')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('alamat3') is-invalid @enderror" name="alamat3" placeholder="Masukkan Alamat lengkap" id="alamat3" value="{{old('alamat3')}}">
	                </div>
	                <div class="form-group">
	                    <label for="telepon3">No. Handphone</label>
						@error('telepon3')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('telepon3') is-invalid @enderror" name="telepon3" placeholder="e.g : 08xxx" id="telepon3" value="{{old('telepon3')}}">
	                </div>
	                <div class="form-group">
	                    <label for="line3">Id Line</label>
						@error('line3')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="text" class="form-control @error('line3') is-invalid @enderror" name="line3" placeholder="Masukkan Id Line" id="line3" value="{{old('line3')}}">
	                </div>
	                <div class="form-group">
	                    <label for="email3">Alamat Email</label>
						@error('email3')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="email" class="form-control @error('email3') is-invalid @enderror" name="email3" placeholder="e.g : example@mail.id" id="email3" value="{{old('email3')}}">
	                </div>
	                <div class="form-group">
	                    <label for="domisili3">Domisili (Asal kota)</label>
						@error('domisili3')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="input" class="form-control @error('domisili3') is-invalid @enderror" name="domisili3" placeholder="e.g : Bandung" id="domisili3" value="{{old('domisili3')}}">
	                </div>
	                <div class="form-group">
	                    <label for="foto3">Upload Foto Diri</label>
						@error('foto3')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="file" class="form-control @error('foto3') is-invalid @enderror" name="foto3" id="foto3">
	                </div>
	                <div class="form-group">
	                    <label for="kartu3">Upload Kartu Pelajar</label>
						@error('kartu3')
						<div class="alert alert-danger">{{ $message }}</div>
						@enderror
	                    <input type="file" class="form-control @error('kartu3') is-invalid @enderror" name="kartu3" id="kartu3">
	                </div>
	  			</div>
  			 </div>
  			 <button type="submit" class="badge btn bg-success mt-4 p-3">Submit!</button>	
  		</form>
  	</div>			
@endsection
