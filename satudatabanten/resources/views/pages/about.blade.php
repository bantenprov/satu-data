@extends('layout')

@section('title', 'Satu Data Banten | Beranda')

@section('content')
    <style>
        .overlay{
            background-image: url({{ asset('assets/images/'.$about->image) }});
            background-size: cover;
            filter: brightness(80%);
            -webkit-filter: brightness(80%);
        }
    </style>
    <!-- Site content -->
    <div id="site-content">
        <section class="flat-row flat-video video-bg bg-playvideo">
            <div class="overlay"></div>
            <div class="video" style="height: 200px;"></div>
        </section>
        
        <div id="page-body">
            <div class="flat-row pad-bottom90px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="color:#129c0b;">{{ $about->title }}</h4>
                            {!! $about->content !!}
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.flat-row -->
        </div><!-- /.page-body -->
    </div><!-- /#site-content -->
@endsection