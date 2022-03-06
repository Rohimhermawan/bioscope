<?php 
use Illuminate\Support\Facades\Auth;
use App\Models\participant;

$user = auth::user();
$d = participant::where('user_id', $user->id)->get();
$data = $d[0];
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bioscope</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/fonts/icomoon/style.css')}}">
    
  <style type="text/css">
    .sembunyi{
      display:none;
    }
  </style>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style=" background-color: #ededed"onload="time()">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top mb-5" style="background-color: #555555 ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Bioscope</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
         
          <span class="mr-2 text-light small" style="position: absolute; right: 1%; top: 30%">{{$user->name}}</span>
        </div>
      </div>
    </div>
  </nav>
<div class="container bg-white p-3" style="margin-top: 100px; border-radius: 3px;">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
					  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
					  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
					</svg><h6>Sisa Waktu</h6><hr>
					<div class="badge btn bg-warning" id="timer"></div>
				</div>
				<div class="col-md-10">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
					  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
					  <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/><h6>Daftar Soal</h6></svg><hr>
					<div>
            @if ($_COOKIE['time']??'')
            
            <form action="{{url('exam/'.$ujian->id.'?nomer='.$nomor.'&id='.$id)}}" method="POST">
              @csrf
              <button class="btn btn-success" type="submit">Lanjutkan</button>
            </form>
            @else
            <form action="{{url('exam/'.$soal[0]->exam_id.'?nomer=1&id='.$soal[0]->id)}}" method="POST">
              @csrf
              <button class="btn btn-warning" type="submit">Mulai</button>
            </form>
            @endif
          </div>  
          <div class="nomor d-none">

						@foreach($ujian->question as $s)
						<form action="{{url('exam/'.$s->exam_id)}}" method="GET">
							<input type="input" name="nomer" value="{{$loop->iteration}}" hidden>
							<input type="input" name="id" value="{{$s->id}}" hidden>
						<button type="input" class="badge btn" id="soal{{$s->id}}" style="border-radius: 50%; background-color: blue" value="{{$loop->iteration}}">{{$loop->iteration}}</button>
						</form>
						@endforeach
					</div>
				</div>	
			</div>
		</div>
		<hr class="mt-2"><hr>
    
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
  <script type="text/javascript">
  	const container = document.querySelector('.nomor');
	document.querySelector('.soal1').classList.remove('.sembunyi')
    var upload = document.getElementById('upload');
    var sertif = document.getElementById('sertif');
    if ({{$data->id}}) {
      upload.classList.remove("disabled");
    } 

    if ('{{$user->pembayaran}}' == 'Sudah Bayar') {
    var test = document.getElementById('test');
      test.classList.remove("disabled");
    }

  // Get today's date and time
	  // var now = new Date().getTime();
	  // sessionStorage.setItem('time', now);
    function time() {
    // Set the date we're counting down to
var countDownDate = new Date().getTime() + 1000*60*<?php echo $ujian->waktu; ?>;

// Update the count down every 1 second
var x = setInterval(function() {

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.querySelector('#timer').innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById('tombol').click();
  }
}, 1000);
};

const data = document.getElementsByTagName('input').length;
console.log(data);
const url = window.location.search;
const params = new URLSearchParams(url);

const taget = params.get('nomer');
			const soal = document.querySelector('.soal'+taget);
			soal.classList.remove("sembunyi");
			const pecah = taget.split('')
			document.getElementById('jumlah').innerHTML= pecah[4] + ' dari ' + {{$ujian->soal}} + ' soal'
  </script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>