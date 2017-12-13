@extends('layout')

@section('title','Satu Data | Tentang')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h2>Halaman Tentang <small>Isi Menu Tentang di Frontend.</small></h2>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('about.update', base64_encode($about->id)) }}" class="btn btn-warning waves-effect pull-right"> <i class="zmdi zmdi-edit"></i> Ubah</a>
                    </div>
                </div>
            </div>

            <div class="card-body card-padding">
                <img src="{{ env('UPLOADED_URL').$about->image }}" style="width: 100%;margin-bottom: 20px;" alt="">
                <div class="about-content">
                    <h4>{{ $about->title }}</h4>
                    {!! $about->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection