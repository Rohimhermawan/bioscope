// const container = document.querySelector('.nomor');
	// const soal = document.querySelector('.soal');
	// document.querySelector('.soal1').classList.remove('.sembunyi')
	// container.addEventListener('click', function (e) {
	// 		var divs = document.querySelectorAll('.pertanyaan');
	// 		for (var i = 0; i < divs.length; i++) {
	// 		    divs[i].classList.add('sembunyi');
	// 		};
	// 		const taget = e.target.id;
	// 		const soal = document.querySelector('.'+taget);
	// 		soal.classList.remove("sembunyi");
	// 		const pecah = taget.split('')
	// 		console.log(pecah);
	// 		document.getElementById('jumlah').innerHTML= pecah[4] + ' dari ' + <?php $ujian->soal; ?> + ' soal'
	// });
    function time() {
    var times = new Date().getTime();
    // Set the date we're counting down to
	var countDownDate = times + 1000* <?php echo $soal->waktu; ?>;

	// Update the count down every 1 second
	var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  console.log(times, now, countDownDate);
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
    if ('<?php ($ujian->soal)+1; ?>' == '<?php $_GET["nomer"]; ?>') {
    	document.getElementById('submit').click();
    }
    document.getElementById('soal'+<?php $_GET['nomer']+1; ?>).click();
  }
}, 1000);
};

// nomer
<?php 
$n = 'nomor'; 
for ($i = 1; $i <= $ujian->soal ; $i++) {
	$z[] = session('nomor'.$i);
// if ($z[$i-1]['jawaban']?? null) {
// 	echo "document.getElementById('soal".$i."').style.backgroundColor= '#3a3f58';";
// }
}
foreach ($ujian as $u) {
	
}
for ($i = 1; $i <= $ujian->soal; $i++) {
	$userid = $_COOKIE['userid'.$i]??$user->id;
	$examid = $_COOKIE['examid'.$i]??$soal->exam_id;
	$questionid = $_COOKIE['questionid'.$i]??$soal->id;
	$jawaban = $_COOKIE['jawaban'.$i]??null;
	$data = [
	'userid' => $userid,
	'examid' => $examid,
	'questionid' => $questionid,
	'jawaban' => $jawaban,
	];
session([
	'nomor'.$i => $data
	]);  
}

function hapus($nama)
{           
	session()->put($nama, null); 
}
?>
function getCookie(name) {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        
        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }
    
    // Return null if not found
    return null;
}
for (var i = 1; i <= <?php $ujian->soal; ?>; i++) {	

console.log(getCookie('jawaban'+[i])); 
if (getCookie('jawaban'+[i])) {
	const sudah = document.getElementById('soal'+i);
	sudah.style.backgroundColor= '#3a3f58';
	sudah.style.color= 'white';
}
}
if (<?php $_GET['nomer']; ?>) {
	document.getElementById("<?php 'soal'.$_GET['nomer']; ?>").style.backgroundColor= '#f9ac67';
};
// cookies
  var now = new Date();
  var waktu = now.getTime();
  var expireTime = waktu + 1000*60*60*24;
  now.setTime(expireTime);
document.querySelector('.nomor').addEventListener('click', function (e) {
var userid = document.getElementById('user_id').value;
var examid = document.getElementById('exam_id').value;
var questionid = document.getElementById('question_id').value;
	document.cookie = 'userid<?php $_GET["nomer"]; ?> = ' + userid +'; expires = ' + now.toUTCString();
	document.cookie = 'examid<?php $_GET["nomer"]; ?> = ' + examid +'; expires = ' + now.toUTCString();
	document.cookie = 'questionid<?php $_GET["nomer"]; ?> = ' + questionid +'; expires = ' + now.toUTCString();
}) 
var kunci = document.getElementsByName('pilihan');
for (var i = 0; i < kunci.length; i++) {
	kunci[i].addEventListener('click', function (e) {
	var jawaban = e.target.value;
	document.cookie = 'jawaban<?php $_GET["nomer"]; ?> = ' + jawaban +'; expires = ' + now.toUTCString();
		console.log(e.target);
});
}
// hapus jawaban
document.getElementById('hapus').addEventListener('click', function () {
	document.cookie = 'jawaban<?php $_GET["nomer"]; ?> = '+ null +' ; expires = ' + now.toUTCString();
	<?php hapus("nomor".$_GET['nomer'].".jawaban"); ?>
	location.reload();
});
// ceklis jawaban
if ('<?php $_COOKIE["jawaban".$_GET["nomer"]]??null; ?>' == 'A') {
	document.getElementById('pilihan1').setAttribute('checked', '');
}
if ('<?php $_COOKIE["jawaban".$_GET["nomer"]]??null; ?>' == 'B') {
	document.getElementById('pilihan2').setAttribute('checked', '');
}
if ('<?php $_COOKIE["jawaban".$_GET["nomer"]]??null; ?>' == 'C') {
	document.getElementById('pilihan3').setAttribute('checked', '');
}
if ('<?php $_COOKIE["jawaban".$_GET["nomer"]]??null; ?>' == 'D') {
	document.getElementById('pilihan4').setAttribute('checked', '');
}
if ('<?php $_COOKIE["jawaban".$_GET["nomer"]]??null; ?>' == 'E') {
	document.getElementById('pilihan5').setAttribute('checked', '');
}
// soal yang sedang dikerjakan
const url = window.location.search;
const params = new URLSearchParams(url);
const target = params.get('nomer');
document.getElementById('jumlah').innerHTML= target + ' dari ' + <?php $ujian->soal; ?> + ' soal';