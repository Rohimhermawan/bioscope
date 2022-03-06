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
  <div>
    <a href="{{url('home/kartu-peserta/'.$user->id)}}" target="_blank" class="btn badge bg-warning text-align-right">Cetak Kartu Peserta</a>
    <a href="{{url('home/identitas/'.$user->id)}}" class="btn badge bg-info text-align-right">Edit Biodata</a>
  </div>
  	<div class="col-md-11" id="data" style="margin: auto;">
  		<div class="table-responsive">
	<table class="table">
		<tr>
			<td >Cabang</td>
			<td >: {{$user->cabang}}</td>
		</tr>
		<tr>
			<td >Sekolah</td>
			<td >: {{$user->sekolah}}</td>
		</tr>
		<tr>
			<td >Guru Pembimbing</td>
			<td >: {{$user->pembimbing}}</td>
		</tr>
          <tr>
            <td >Sekolah</td>
            <td >: {{$user->sekolah}}</td>
          </tr>
  				<tr>
  					<td>Nama Ketua</td>
  					<td>: {{$user->nama1}}</td>
  					<td>Nama Anggota</td>
  					<td>: {{$user->nama2}}</td>
  					<td>Nama Anggota</td>
  					<td>: {{$user->nama3}}</td>
  				</tr>
  				<tr>
  					<td>Domisili (Asal Kota)</td>
  					<td>: {{$user->domisili1}}</td>
  					<td>Domisili (Asal Kota)</td>
  					<td>: {{$user->domisili2}}</td>
  					<td>Domisili (Asal Kota)</td>
  					<td>: {{$user->domisili3}}</td>
  				</tr>
  				<tr>
  					<td>Kelas</td>
  					<td>: {{$user->kelas1}}</td>
  					<td>Kelas</td>
  					<td>: {{$user->kelas2}}</td>
  					<td>Kelas</td>
  					<td>: {{$user->kelas3}}</td>
  				</tr>
  				<tr>
  					<td>Alamat</td>
  					<td>: {{$user->alamat1}}</td>
  					<td>Alamat</td>
  					<td>: {{$user->alamat2}}</td>
  					<td>Alamat</td>
  					<td>: {{$user->alamat3}}</td>
  				</tr>
  				<tr>
  					<td>No. Handphone</td>
  					<td>{{$user->telepon1}}</td>
  					<td>No. Handphone</td>
  					<td>{{$user->telepon2}}</td>
  					<td>No. Handphone</td>
  					<td>{{$user->telepon3}}</td>
  				</tr>
  				<tr>
  					<td>Id Line</td>
  					<td>{{$user->line1}}</td>
  					<td>Id Line</td>
  					<td>{{$user->line2}}</td>
  					<td>Id Line</td>
  					<td>{{$user->line3}}</td>
  				</tr>
  				<tr>
  					<td>Email</td>
  					<td>{{$user->email1}}</td>
  					<td>Email</td>
  					<td>{{$user->email2}}</td>
  					<td>Email</td>
  					<td>{{$user->email3}}</td>
  				</tr>
  				<tr>
  					<td>Foto Diri</td>
  					<td><img src="{{asset('storage/foto/'.$user->foto1)}}" alt="{{$user->foto1}}" style="width: 300px; height: 400px;"></td>
  					<td>Foto Diri</td>
  					<td><img src="{{url('storage/foto/'.$user->foto2)}}" alt="{{$user->foto2}}" style="width: 300px; height: 400px;"></td>
  					<td>Foto Diri</td>
  					<td><img src="{{url('storage/foto/'.$user->foto3)}}" alt="{{$user->foto3}}" style="width: 300px; height: 400px;"></td>
  				</tr>
  				<tr>
  					<td>Kartu Pelajar</td>
  					<td><img src="{{url('storage/kartu/'.$user->kartu1)}}" alt="{{$user->kartu1}}" style="width: 400px; height: 300px;"></td>
  					<td>kartu pelajar</td>
  					<td><img src="{{url('storage/kartu/'.$user->kartu2)}}" alt="{{$user->kartu2}}" style="width: 400px; height: 300px;"></td>
  					<td>kartu pelajar</td>
  					<td><img src="{{url('storage/kartu/'.$user->kartu3)}}" alt="{{$user->kartu3}}" style="width: 400px; height: 300px;"></td>
  				</tr>
  			</table>
  		</div>
  	</div>
  </div>
@endsection