@extends('layouts.user')
@section('content')
<div class="container bg-white py-4" style="border-radius: 3px; margin-top: 100px; margin-bottom:140px;">
	<div class="row">
	  <div class="col-md-12">
		<p>Silakan mengunggah karya yang telah dibuat dengan menekan tombol dibawah ini sesuai cabang lomba yang Anda Ikuti.</p>
	  </div>
	  <div class="col-md-12 d-flex justify-content-center">
		@if (isset($data->find(15)->nilai))
		<a href="{{$data->find(15)->nilai}}" class="btn btn-warning rounded-pill">Upload Poster</a>
		@elseif (isset($data->find(16)->nilai)
		<a href="{{$data->find(16)->nilai}}" class="btn btn-warning rounded-pill">Upload Essay</a>
		@endif  
	</div>
	</div>	
</div>
@endsection