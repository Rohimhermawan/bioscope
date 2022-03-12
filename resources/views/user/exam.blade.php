<?php 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\participant;
use Illuminate\Http\Request;
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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('files/Logo.png')}}"/>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/fonts/icomoon/style.css')}}">
    <script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };
</script>
  <style type="text/css">
    .sembunyi{
      display:none;
    }
  </style>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style=" background-color: #ededed"onload="time()">
    <!-- Modal -->
	<div class="modal fade" id="injury" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
			</div>
			<div class="modal-body">
				<strong>Waktu yang tersedia tersisa kurang dari 5 menit lagi.</strong> 
			</div>
			<div class="modal-footer">
			</div>
			</div>
		</div>
	</div>
	<a href="#"></a>
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
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#injury" id="alerting" hidden>alert</button>
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
					  <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/><h6>Daftar Soal</h6></svg>
					  <hr>
					<div class="nomor ">
						@foreach($soall as $s)
						<form class="d-inline" action="{{url('exam/'.$s->exam_id.'?nomer='.$loop->iteration.'&id='.$s->id)}}" method="POST">
							@csrf
						<button type="input" class="badge btn" id="soal{{$s->id}}" style="border-radius: 50%; background-color: #ece6cd; color: black;">{{$loop->iteration}}</button>
						</form>
						@endforeach
					</div>
				</div>	
			</div>
		</div>
		<hr class="mt-2"><hr>	
	</div>
	<div id="jumlah" style="right: 125px; top: 139px; position: absolute; font-weight: bolder"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<form action="{{url('exam/store/'.$soal->exam_id)}}" method="POST">
					@method('put')
				<div class="col-md-11">
					@csrf
						<div class="soal{{$soal->id}} pertanyaan">
							<input type="text" id="user_id" value="{{$user->id}}" style="display: none">
							<input type="text" id="exam_id" value="{{$soal->exam_id}}" style="display: none">
							<input type="text" id="question_id" value="{{$soal->id}}" style="display: none">
							<div>
								<div class="row">
									<div class="col-md-4">
										<img src="{{asset('storage/gambar/soal/'.$soal->exam_id.'/'.$soal->gambar)}}" id="img" onerror="this.style.display= 'none'" style="width: 600px; height: 400px">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<?php echo $soal->soal; ?>
									</div>
								</div>
							</div>
							<div>
								 <input class="form-check-input" type="radio" class = "data" name="pilihan" id="pilihan1" value="A">
								 <label class="form-check-label" for="pilihan1">
								    <?php echo $soal->opsi_a; ?>
								 </label>
							</div>
							<div>
								 <input class="form-check-input" type="radio" class = "data" name="pilihan" id="pilihan2" value="B">
								 <label class="form-check-label" for="pilihan2">
								    <?php echo $soal->opsi_b; ?>
								 </label>
							</div>
							<div>
								 <input class="form-check-input" type="radio" class = "data" name="pilihan" id="pilihan3" value="C">
								 <label class="form-check-label" for="pilihan3">
								    <?php echo $soal->opsi_c; ?>
								 </label>
							</div>
							<div>
								 <input class="form-check-input" type="radio" class = "data" name="pilihan" id="pilihan4" value="D">
								 <label class="form-check-label" for="pilihan4">
								    <?php echo $soal->opsi_d; ?>
								 </label>
							</div>
							<div>
								 <input class="form-check-input" type="radio" class = "data" name="pilihan" id="pilihan5" value="E">
								 <label class="form-check-label" for="pilihan5">
								    <?php echo $soal->opsi_e; ?>
								 </label>
							</div>
							<span id="hapus" class=" btn badge bg-danger my-2 p-1">Hapus Jawaban</span>
						</div>
					<a data-target="#submitconfirm" data-toggle="modal" class="btn btn-success btn-pill mt-2 d-none" id="submitAkhir">Submit</a>
<!-- Logout Modal-->
    <div class="modal fade" id="submitconfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to submit the test?</h5>
                </div>
                <div class="modal-body">Select "Sure" below if you are ready to submit your test.</div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" id="submit" type="submit">Sure!</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div>
	<i class="btn me-3 mt-3 soal{{$_GET['nomer']-1}}" style="border-radius:50%; background-color:#ece6cd;" id="prev{{$_GET['nomer']-1}}" value=""><</i>
	<i class="btn ms-3 mt-3 soal{{$_GET['nomer']+1}}" style="border-radius:50%; background-color:#ece6cd;" id="next{{$_GET['nomer']+1}}" value="">></i>
</div>
</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
  <script type="text/javascript">
    function time() {
    var times = {{$time}}*1000;
    // Set the date we're counting down to
	var countDownDate = times + 1000*60*{{$ujian->waktu}}

	// Update the count down every 1 second
	var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.querySelector('#timer').innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
   // If the count down is 5 minutes again, write some text
   if (distance < 5*60*1000 && distance > 5*60*1000-1000) {
    document.getElementById('alerting').click();
  }
  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById('submit').click();
  }
}, 1000);
};

// If the count down is finished by admin, write some text
if ("{{$ujian->keterangan}}" == "Tidak Aktif") {
    document.getElementById("submit").click();
  }
// nomer
@php function hapus($nama){session()->put($nama, null);}@endphp
function getCookie(name) {
    var cookieArr = document.cookie.split(";");
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        if(name == cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}
let dataJson = JSON.parse('{!!$answers!!}');
let Json = {};
dataJson.forEach(e => {
Json[e.question_id] = e;
		const sudah = document.getElementById('soal'+e.question_id);
		sudah.style.backgroundColor= '#3a3f58';
		sudah.style.color= 'white';
});
if ("{{$_GET['id']}}") {
	document.getElementById("{{'soal'.$_GET['id']}}").style.backgroundColor= '#f9ac67';
};

let prev = document.getElementById("prev{{$_GET['nomer']-1}}");
let next = document.getElementById("next{{$_GET['nomer']+1}}");
prev.addEventListener("click", function (e) { split = e.target.className.split(" ");document.getElementById(split[3]).click();})
next.addEventListener("click", function (e) { split = e.target.className.split(" ");;document.getElementById(split[3]).click();})
if ("{{$_GET['nomer']}}" == 1) {
	prev.classList.toggle("d-none");
};
if ("{{$_GET['nomer']}}" == "{{$ujian->soal}}") {
	document.getElementById("submitAkhir").classList.toggle("d-none");
	next.classList.toggle("d-none");
};

// cookies
  var now = new Date();
  var waktu = now.getTime();
  var expireTime = waktu + 1000*60*60*24;
  now.setTime(expireTime);
	document.cookie = 'prev = {{$_GET["nomer"]}}; expires = ' + now.toUTCString();
	document.cookie = 'prevId = {{$_GET["id"]}}; expires = ' + now.toUTCString();
var kunci = document.getElementsByName('pilihan');
for (var i = 0; i < kunci.length; i++) {
	kunci[i].addEventListener('click', function (e) {
	var jawaban = e.target.value;
	document.cookie = 'jawaban = {{$_GET["id"]}},' + jawaban +'; expires = ' + now.toUTCString();
	});
}
// hapus jawaban
document.getElementById('hapus').addEventListener('click', function () {
	document.cookie = 'jawaban = {{$_GET["id"]}},; expires = ' + now.toUTCString();
	document.getElementById("{{'soal'.$_GET['id']}}").click()
});
// ceklis jawaban
	if (typeof Json[@php echo $_GET['id'] @endphp].jawaban !== 'undefined' && Json[@php echo $_GET['id'] @endphp].jawaban == 'A') {
	document.getElementById('pilihan1').setAttribute('checked', '');
	}
	if (typeof Json[@php echo $_GET['id'] @endphp].jawaban !== 'undefined' && Json[@php echo $_GET['id'] @endphp].jawaban == 'B') {
		document.getElementById('pilihan2').setAttribute('checked', '');
	}
	if (typeof Json[@php echo $_GET['id'] @endphp].jawaban !== 'undefined' && Json[@php echo $_GET['id'] @endphp].jawaban == 'C') {
		document.getElementById('pilihan3').setAttribute('checked', '');
	}
	if (typeof Json[@php echo $_GET['id'] @endphp].jawaban !== 'undefined' && Json[@php echo $_GET['id'] @endphp].jawaban == 'D') {
		document.getElementById('pilihan4').setAttribute('checked', '');
	}
	if (typeof Json[@php echo $_GET['id'] @endphp].jawaban !== 'undefined' && Json[@php echo $_GET['id'] @endphp].jawaban == 'E') {
		document.getElementById('pilihan5').setAttribute('checked', '');
	}
// soal yang sedang dikerjakan
const url = window.location.search;
const params = new URLSearchParams(url);
const target = params.get('nomer');
document.getElementById('jumlah').innerHTML= target + ' dari ' + {{$ujian->soal}} + ' soal';
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>