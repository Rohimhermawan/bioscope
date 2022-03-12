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
    <a href="{{url('home/kartu-peserta/'.$participant->id)}}" target="_blank" class="btn badge bg-warning text-align-right">Cetak Kartu Peserta</a>
    <a href="{{url('home/identitas/'.$participant->id)}}" class="btn badge bg-info text-align-right">Edit Biodata</a>
  </div>
  	<div class="col-md-11" id="data" style="margin: auto;">
  		<div class="table-responsive">
	<table class="table">
		<tr>
			<td >Cabang</td>
			<td >: {{$participant->cabang}}</td>
		</tr>
		<tr>
			<td >Sekolah</td>
			<td >: {{$participant->sekolah}}</td>
		</tr>
		<tr>
			<td >Guru Pembimbing</td>
			<td >: {{$participant->pembimbing}}</td>
		</tr>
          <tr>
            <td >Sekolah</td>
            <td >: {{$participant->sekolah}}</td>
          </tr>
  				<tr>
  					<td>Nama Ketua</td>
  					<td>: {{$participant->nama1}}</td>
  					<td>Nama Anggota</td>
  					<td>: {{$participant->nama2}}</td>
  					<td>Nama Anggota</td>
  					<td>: {{$participant->nama3}}</td>
  				</tr>
  				<tr>
  					<td>Domisili (Asal Kota)</td>
  					<td>: {{$participant->domisili1}}</td>
  					<td>Domisili (Asal Kota)</td>
  					<td>: {{$participant->domisili2}}</td>
  					<td>Domisili (Asal Kota)</td>
  					<td>: {{$participant->domisili3}}</td>
  				</tr>
  				<tr>
  					<td>Kelas</td>
  					<td>: {{$participant->kelas1}}</td>
  					<td>Kelas</td>
  					<td>: {{$participant->kelas2}}</td>
  					<td>Kelas</td>
  					<td>: {{$participant->kelas3}}</td>
  				</tr>
  				<tr>
  					<td>Alamat</td>
  					<td>: {{$participant->alamat1}}</td>
  					<td>Alamat</td>
  					<td>: {{$participant->alamat2}}</td>
  					<td>Alamat</td>
  					<td>: {{$participant->alamat3}}</td>
  				</tr>
  				<tr>
  					<td>No. Handphone</td>
  					<td>{{$participant->telepon1}}</td>
  					<td>No. Handphone</td>
  					<td>{{$participant->telepon2}}</td>
  					<td>No. Handphone</td>
  					<td>{{$participant->telepon3}}</td>
  				</tr>
  				<tr>
  					<td>Id Line</td>
  					<td>{{$participant->line1}}</td>
  					<td>Id Line</td>
  					<td>{{$participant->line2}}</td>
  					<td>Id Line</td>
  					<td>{{$participant->line3}}</td>
  				</tr>
  				<tr>
  					<td>Email</td>
  					<td>{{$participant->email1}}</td>
  					<td>Email</td>
  					<td>{{$participant->email2}}</td>
  					<td>Email</td>
  					<td>{{$participant->email3}}</td>
  				</tr>
  				<tr>
  					<td>Foto Diri</td>
  					<td><img src="{{asset('storage/identitas/foto/'.$participant->foto1)}}" alt="{{$participant->foto1}}" style="width: 300px; height: 400px;" onerror="this.style.display= 'none'"></td>
  					<td>Foto Diri</td>
  					<td><img src="{{url('storage/identitas/foto/'.$participant->foto2)}}" alt="{{$participant->foto2}}" style="width: 300px; height: 400px;" onerror="this.style.display= 'none'"></td>
  					<td>Foto Diri</td>
  					<td><img src="{{url('storage/identitas/foto/'.$participant->foto3)}}" alt="{{$participant->foto3}}" style="width: 300px; height: 400px;" onerror="this.style.display= 'none'"></td>
  				</tr>
  				<tr>
  					<td>Kartu Pelajar</td>
  					<td><img src="{{url('storage/identitas/kartu/'.$participant->kartu1)}}" alt="{{$participant->kartu1}}" style="width: 400px; height: 300px;" onerror="this.style.display= 'none'"></td>
  					<td>kartu pelajar</td>
  					<td><img src="{{url('storage/identitas/kartu/'.$participant->kartu2)}}" alt="{{$participant->kartu2}}" style="width: 400px; height: 300px;" onerror="this.style.display= 'none'"></td>
  					<td>kartu pelajar</td>
  					<td><img src="{{url('storage/identitas/kartu/'.$participant->kartu3)}}" alt="{{$participant->kartu3}}" style="width: 400px; height: 300px;" onerror="this.style.display= 'none'"></td>
  				</tr>
  			</table>
  		</div>
  	</div>
  </div>
@endsection