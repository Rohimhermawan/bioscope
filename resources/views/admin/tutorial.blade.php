@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">How To</h1>
        </div>
        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#Login" aria-expanded="false" aria-controls="collapseExample">
                Login, Register, & guideline
            </button>
        </p>
        <div class="collapse" id="login">
            <div class="card card-body">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection