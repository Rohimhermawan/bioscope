@extends('layouts.user')
@section('content')
@foreach($test as $p)
<div class="modal fade" id="pop{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peraturan Test : {{$p->nama}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $p->peraturan; ?>
      </div>
    </div>
  </div>
</div>
@endforeach
<div class="container bg-white py-4" style="border-radius: 3px; margin-top: 100px; margin-bottom:171px;">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>	
					<td>No</td>
					<td>Nama Test</td>
					<td>Jumlah Soal</td>
					<td>Waktu Ujian (menit)</td>
					<td>Peraturan</td>
					<td></td>
				</tr>
			</thead>
		@foreach($test as $p)
			<tbody>
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$p->nama}}</td>
					<td>{{$p->soal}}</td>
					<td>{{$p->waktu}}</td>
					<td><a data-bs-target="#pop{{$p->id}}" data-bs-toggle="modal" class="btn btn-info badge rounded-pill p-2 px-3">Detail</a></td>
					<td>
						<form method="POST" action="{{url('exams/'.$p->id)}}" id="form">
							@csrf
							<button type="submit" class="btn btn-primary rounded-pill" id="button{{$loop->iteration}}"></button>
							<a href="#" class="badge btn bg-success" id="tombol{{$loop->iteration}}" hidden></a>
							<a href="#" class="badge btn bg-danger" id="tombol1{{$loop->iteration}}" hidden></a>
							<script type="text/javascript">
								var btn = document.getElementById('button{{$loop->iteration}}');
								var btn1 = document.getElementById('tombol{{$loop->iteration}}');
								var btn2 = document.getElementById('tombol1{{$loop->iteration}}');
								if ({{strtotime($p->tanggal)-60*60*7}} > {{strtotime(now())}}) {
									btn.setAttribute('hidden', '');
									btn2.removeAttribute('hidden');
									btn2.innerHTML = 'Anda Tidak Diizinkan';
								} else if ("{{$user->answer->where('exam_id',$p->id)->first()->hasil??''}}" != '') {
									btn.setAttribute('hidden', '');
									btn1.removeAttribute('hidden');
									btn1.innerHTML = 'Sudah Dikerjakan';
								} else if ( '{{last(explode('_', $p->nama))}}' == 'quiziz') {
										if ( '{{$user->pembayaran}}' !== 'Lolos' ) {
											btn.setAttribute('hidden', '');
											btn2.removeAttribute('hidden');
											btn2.innerHTML = 'Anda Tidak Diizinkan';
										} else {
											btn.innerHTML = 'Kerjakan';
										}
									} else {
										btn.innerHTML = 'Kerjakan';
								}
							</script>
						</form>
					</td>
				</tr>
			</tbody>
		@endforeach
		</table>
	</div>
</div>
@endsection