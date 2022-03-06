@extends('layouts.panel')
@section('content')
<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-2 ml-3 text-gray-800">Admin Controllers</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
        <a data-bs-toggle="modal" data-bs-target="#generate1" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate certificate of elimination
        </a>
        <a data-bs-toggle="modal" data-bs-target="#generate2" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate certificate of semifinal
        </a>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Id Control</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->Nama}}</td>
                        <td>
                            <div class="form-switch">
                                <form method="POST" action="{{url('admin/controllers/'.$d->id)}}">
                                @method('put')    
                                @csrf
                                @if ($d->type == 'var')
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="{{$d->nilai}}" name="{{$d->id}}">
                                    <button class="btn btn-success" type="submit" id="button-addon2">Submit</button>
                                </div>
                                @else
                                    <button type="submit" class="btn p-3">
                                        <span class="badge badge-info p-2">@if($d->nilai == 2) {{'Panitia'}} @elseif ($d->nilai == 3) {{'Peserta'}} @else {{$d->nilai}} @endif</span>
                                    </button>
                                @endif
                                </form>
                            </div>
                        </td>
                        <td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="generate1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Yaqueen?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Cukup tekan tombol ini ketika memang sudah waktunya, sayang <b class="text-decoration-line-through">Kamu</b> tampilan databasenya jadi jelek :D
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a  href="{{url('admin/certificate/create1')}}" class="btn btn-primary">alright</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="generate2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Yaqueen?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Cukup tekan tombol ini ketika memang sudah waktunya, sayang <b class="text-decoration-line-through">Kamu</b> tampilan databasenya jadi jelek :D
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a  href="{{url('admin/certificate/create2')}}" class="btn btn-primary">Alright</a>
      </div>
    </div>
  </div>
</div>
@endsection