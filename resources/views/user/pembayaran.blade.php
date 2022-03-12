@extends('layouts.user')
@section('content')
<style>
.toast-container {
	top:10%; 
	right:0;
}
}
</style>
<div class="container bg-white py-4" style="border-radius: 3px; margin-top: 100px; margin-bottom:110px;">
	<div aria-live="polite" aria-atomic="true" class="position-relative">
	  <div class="toast-container position-fixed" style="">
		<div class="toast t1 show" role="alert" aria-live="assertive" aria-atomic="true">
		  <div class="toast-header">
			<img src="{{asset('files/Logo.png')}}" class="rounded me-2" alt="Bioscope" style="width: 10%;">
			<strong class="me-auto">Bioscope</strong>
			<small class="text-muted">just now</small>
			<button type="button" class="btn-close btn1" data-bs-dismiss="toast" aria-label="Close"></button>
		  </div>
		  <div class="toast-body">
			Jumlah user yang sedang login pada akun ini adalah <b>{{$user->restrict->jumlah}}</b> dari {{$batas}} users. Jangan lupa untuk menekan tombol <i>logout</i> jika sudah selesai ya :)
		  </div>
		</div>
	
		<div class="toast t2 show" role="alert" aria-live="assertive" aria-atomic="true">
		  <div class="toast-header">
			<img src="{{asset('files/Logo.png')}}" class="rounded me-2" alt="Bioscope" style="width: 10%;">
			<strong class="me-auto">Bioscope</strong>
			<small class="text-muted">1 seconds ago</small>
			<button type="button" class="btn-close btn2" data-bs-dismiss="toast" aria-label="Close"></button>
		  </div>
		  <div class="toast-body">
			Status kamu sekarang <b>{{$user->pembayaran}}</b>, Yuk lanjut ke tahapan selanjutnya.
		  </div>
		</div>
	  </div>
	</div>
	<div>
		Selamat datang di Website Bioscope <script>document.write(new Date().getFullYear());</script>! Silakan mengikuti instruksi yang ada untuk melakukan pendaftaran. Terimakasih! 
	</div>
	<div class="col-md-10 pt-5" style="margin: auto;" id="bayar">
		<form method="POST" action="{{url('home/'.$user->id)}}">
			@csrf
			<div class="form-group">
                <label for="email1">Alamat Email</label>
    			@error('email1')
    			<div class="alert alert-danger">{{ $message }}</div>
    			@enderror
                <input type="email" class="form-control @error('email1') is-invalid @enderror" name="email1" placeholder="e.g : example@mail.id" id="email1" value="{{old('email1')}}">
            </div>
			<div class="form-group">
				<label for="sekolah">Asal Sekolah</label>
			@error('sekolah')
		    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
				<input type="text" class="form-control @error('sekolah') is-invalid @enderror" name="sekolah" placeholder="e.g : SMAN X Bandung" id="sekolah1" value="{{old('sekolah')}}">
			</div>
			<div class="form-group">
				<label for="pembimbing">Guru Pembimbing (boleh dikosongkan)</label>
			@error('pembimbing')
		    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
				<input type="text" class="form-control @error('pembimbing') is-invalid @enderror" name="pembimbing" id="pembimbing" value="{{old('pembimbing')}}" >
			</div>
			<div class="form-group" >
                <label for="genre" class="form-label">Cabang Lomba</label>
                    <select class="form-select" id="genre" aria-label="Default select example" name="cabang">
                        <option selected>Pilih Jenis Lomba</option>
                        <option value="Poster">Public Poster</option>
                        <option value="Essay">Scientific Essay</option>
                        <option value="Olimpiade">Olympiad</option>
                    </select>
             </div>
			@error('cabang')
		    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
             <div class="form-group">
                <label for="pengirim">Bank Pengirim</label>
	            <input type="input" class="form-control @error('pengirim') is-invalid @enderror" name="pengirim" id="pengirim">
	        </div>
			@error('pengirim')
		    <div class="alert alert-danger">{{ $message }}</div>
			@enderror				
	        <div class="form-group" >
                <label for="banktujuan" class="form-label">Bank Tujuan</label>
                    <select class="form-select" id="genre" aria-label="Default select example" name="penerima">
                        <option selected>Pilih Jenis Bank</option>
                        <option value="BCA - 0661624433 an Firda Hanan">BCA</option>
                        <option value="Gopay - 085260376963 an Cut Farah Fadhilah">Gopay</option>
                        <option value="Dana - 085260376963 an Cut Farah Fadhilah">Dana</option>
                    </select>
             </div>
	        <button type="submit" class="btn btn-success mt-3">Upload</button>
		</form>
	</div>
	<div id="uploadBukti" hidden>
		<p>
		<ul>Nama : {{$user->name??'--'}}</ul>
		<ul>Sekolah : {{$user->participant->sekolah??'--'}}</ul>  
		<ul>Cabang : {{$user->participant->cabang??'--'}}</ul>
		<ul>Guru Pembimbing : {{$user->participant->pembimbing??'--'}}</ul>
		<br>lakukan pembayaran dari bank <i>{{$user->participant->pengirim??'--'}}</i> ke <i>{{$user->participant->penerima??'--'}}</i> sebanyak <b id="early">Rp 135.000</b> <b id="late" hidden>Rp 150.000</b> <b id="essay" hidden>Rp 80.000</b> <b id="Poster" hidden>Rp 80.000</b>

		<form action="{{url('home/upload/'.$user->id)}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
            <label for="bukti">Masukkan Bukti Pembayaran</label>
	        <input type="file" class="form-control @error('bukti') is-invalid @enderror" name="bukti" id="bukti">
			@error('bukti')
		    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
	    </div>
		<button type="submit" class="btn btn-success mt-3">Upload</button>
		</form>
		</p>
	</div>
	<div class="col-md-10" style="margin: auto;" id="sukses" hidden>
		<h3>Bukti Pembayaran Berhasil Diupload</h3>
		<p>Terimakasih, bukti pembayaran sedang kami proses. Mohon tunggu validasi akun selambat-lambatnya 3x24 jam. Validasi akun akan diberitahukan melalui email yang terdaftar pada website. Apabila lebih dari 3x24 jam, akun peserta belum tervalidasi, peserta dapat menghubungi narahubung di bawah ini :</p>
	</div>
	<div class="col-md-10" style="margin: auto;" id="konfirm" hidden>
		<h3>Bukti Pembayaran Berhasil Diupload</h3>
		<p>Terimakasih, bukti pembayaran sudah kami proses. Silakan melengkapi melanjutkan ke tahap selanjutnya sesuai dengan timeline yang telah ditentukan</p>
		<p>Segala surat keperluan yang wajib diunduh sebagai persayarat dapat diunduh <a href="">disini</a></p>
		<p>Kepada peserta yang belum bergabung ke grup Line, silakan klik tautan <a href="https://line.me/R/ti/g/FTufoHN5IB" target="_blank">disini</a> atau scan QR Code dibawah ini untuk bergabung ke grup peserta BIOSCOPE 2021.</p>
		<img src="{{asset('files/qrcode.jpg')}}" alt="QR Code Grup Bioscope" class="d-block mx-auto">

	</div>
	<div class="col-md-10 mx-auto" id="lulus" hidden>
	<h3>Selamat, Anda dinyatakan lulus</h3>
	<p>Untuk melanjutkan ke tahap selanjutnya, silakan isi form pendaftaran ulang dengan klik tombol dibawah ini.</p>
	<a class="btn btn-warning container-fluid rounded-pill" data-bs-toggle="modal" data-bs-target="#formulirPendaftaran">Formulir daftar ulang</a>
	</div>
</div>
<!-- modal -->
    <!-- logo -->
    <div class="modal fade" id="formulirPendaftaran" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Formulir Daftar Ulang</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
			   <form name="formulir">
			   <div class="alert alert-success berhasil d-none" role="alert">
				Data telah berhasil dikirim.
				</div>
				<div class="form-group d-none">
					<label for="Email">Email</label>
					<input type="input" class="form-control @error('email') is-invalid @enderror" name="Email" id="email" value="{{$user->participant->email1??'--'}}">
				</div>
				<div class="form-group">
					<label for="Nama Ketua">Nama Ketua</label>
					<input type="input" class="form-control @error('Nama Ketua') is-invalid @enderror" name="Nama Ketua" id="Nama Ketua" value="{{$user->participant->nama1??'--'}}">
				</div>
				<div class="form-group">
					<label for="Nama Anggota 1">Nama Anggota 1</label>
					<input type="input" class="form-control @error('Nama Anggota 1') is-invalid @enderror" name="Nama Anggota 1" id="Nama Anggota 1" value="{{$user->participant->nama2??'--'}}">
				</div>
				<div class="form-group">
					<label for="Nama Anggota 2">Nama Anggota 2</label>
					<input type="input" class="form-control @error('Nama Anggota 2') is-invalid @enderror" name="Nama Anggota 2" id="Nama Anggota 2" value="{{$user->participant->nama3??'--'}}">
				</div>
				<div class="form-group d-none">
					<label for="Asal Sekolah">Asal Sekolah</label>
					<input type="input" class="form-control @error('Asal Sekolah') is-invalid @enderror" name="Asal Sekolah" id="Asal Sekolah" value="{{$user->participant->sekolah??'--'}}">
				</div>
				<div class="form-group d-none">
					<label for="Cabang Lomba">Cabang Lomba</label>
					<input type="input" class="form-control @error('Cabang Lomba') is-invalid @enderror" name="Cabang Lomba" id="Cabang Lomba" value="{{$user->participant->cabang??'--'}}">
				</div>
				<div class="form-group d-none">
					<label for="Nomor Hp">Nomor Hp</label>
					<input type="input" class="form-control @error('Nomor Hp') is-invalid @enderror" name="Nomor Hp" id="Nomor Hp" value="{{$user->participant->telepon1??'--'}}">
				</div>
				<div class="form-group d-none">
					<label for="Id Line">Id Line</label>
					<input type="input" class="form-control @error('Id Line') is-invalid @enderror" name="Id Line" id="Id Line" value="{{$user->participant->line1??'--'}}">
				</div>
				<div class="form-check">
				  <div>
					<input class="form-check-input" type="radio" name="Keterangan" value="Bersedia Hadir" id="bersedia">
					<label class="form-check-label" for="bersedia">
						Saya <b>bersedia</b> hadir untuk kegiatan lomba selanjutnya (Semifinal Medical Olympiad 30 October 2021, Final Public Poster 2021, Final Scientific Essay 31 October 2021).
					</label>
				  </div>
				  <div>
					<input class="form-check-input" type="radio" name="Keterangan" value="Tidak Bersedia hadir" id="tidakBersedia">
					<label class="form-check-label" for="tidak Bersedia">
						Saya <b>tidak bersedia</b> hadir untuk kegiatan lomba selanjutnya.
					</label>
				</div>
				<button type="submit" class="mt-5 btn btn-success rounded-pill formSubmit">Submit!</button>
				<button class="btn btn-success d-none load" type="button" disabled>
				<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
				Loading...
				</button>
			  </form>
            </div>
          </div>
        </div>
    </div>
<script type="text/javascript">
	const scriptURL = 'https://script.google.com/macros/s/AKfycbx0wx87YN1624wgR6w7n8fcnPBHJ9xNtzQ3Y2DxYFs-p3gdlM5ktZdChcTMNseAf1xt/exec'
	const form = document.forms['formulir'];
	const load = document.querySelector('.load');
	const formSubmit = document.querySelector('.formSubmit');
	const berhasil = document.querySelector('.berhasil');

	form.addEventListener('submit', e => {
		e.preventDefault();
		load.classList.toggle('d-none');
		formSubmit.classList.toggle('d-none');
		fetch(scriptURL, { method: 'POST', body: new FormData(form)})
		.then(response => {
		load.classList.toggle('d-none');
		formSubmit.classList.toggle('d-none');
		berhasil.classList.toggle('d-none');
			console.log('Success!', response);
		})
		.catch(error => console.error('Error!', error.message))
	})

var	bayar = document.getElementById('bayar');
	var sukses = document.getElementById('sukses');
	var konfirm = document.getElementById('konfirm');
	var early = document.getElementById("early");
	var late = document.getElementById('late');
	var essay = document.getElementById('essay');
	var poster = document.getElementById('Poster');
	var upload = document.getElementById('uploadBukti')
	var lulus = document.getElementById('lulus')
	if ('{{isset($user->participant->cabang)}}') {
		upload.removeAttribute("hidden");
		bayar.setAttribute("hidden", "");
		sukses.setAttribute("hidden", "");
		konfirm.setAttribute("hidden", "");
	}
	lateDate = new Date('{{$tanggal}}').getTime();
	now = new Date().getTime();
	if (now >= lateDate) {
		early.setAttribute("hidden", "");
		poster.setAttribute("hidden", "");
		essay.setAttribute("hidden", "");
		late.removeAttribute("hidden");
	}
	if ('{{$user->participant->cabang??false}}' == 'Essay') {
		early.setAttribute("hidden", "");
		poster.setAttribute("hidden", "");
		late.setAttribute("hidden", "");
		essay.removeAttribute("hidden");
	}
	if ('{{$user->participant->cabang??false}}' == 'Poster') {
		early.setAttribute("hidden", "");
		late.setAttribute("hidden", "");
		essay.setAttribute("hidden", "");
		poster.removeAttribute("hidden");
	}
	if ('{{$user->pembayaran}}' == 'Menunggu konfirmasi') {
		bayar.setAttribute("hidden", "");
		upload.setAttribute("hidden", "");
		sukses.removeAttribute("hidden");
	}
	
	if ('{{$user->pembayaran}}' == 'Sudah Bayar') {
		bayar.setAttribute("hidden", "");
		sukses.setAttribute("hidden", "");
		upload.setAttribute("hidden", "");
		konfirm.removeAttribute("hidden");
	}
	if ('{{$user->pembayaran}}' == 'Lolos') {
		bayar.setAttribute("hidden", "");
		sukses.setAttribute("hidden", "");
		upload.setAttribute("hidden", "");
		lulus.removeAttribute("hidden");
	}
	var toast1 = document.querySelector(".t1");
	var toast2 = document.querySelector(".t2");
	var btn1 = document.querySelector(".btn1");
	var btn2 = document.querySelector(".btn2");

	btn1.addEventListener('click', function() {toast1.classList.remove("show")});
	btn2.addEventListener('click', function() {toast2.classList.remove("show")});
</script>
@endsection