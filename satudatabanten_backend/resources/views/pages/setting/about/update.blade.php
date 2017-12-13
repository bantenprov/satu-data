@extends('layout')

@section('title','Satu Data | Aplikasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Ubah Halaman Tentang <small>Ubah isi halaman tentang di frontend.</small></h2>
            </div>
            <div class="card-body card-padding">
                <form id="formValidate" action="{{ route('about.update.save',base64_encode($about->id))  }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="fg-label">Judul*</label>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input id="aboutTitle" class="form-control fg-input" name="aboutTitle" value="{{ $about->title }}" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Isi Halaman*</label>
                            <br><br>
                            <div class="form-group">
                                <textarea name="aboutContent" id="aboutContent" class="html-editor" rows="5">{{ $about->content }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row col-sm-12">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-primary btn-file m-r-10 waves-effect">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="aboutImage">
                                        </span>
                            <span class="fileinput-filename"></span>
                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput">×</a>
                        </div>
                        <input type="hidden" name="aboutOldImage" value="{{ $about->image }}">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a href="{{ route('about') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary btn-icon-text waves-effect"><i class="zmdi zmdi-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $("#formValidate").validate({
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                rules: {
                    aboutTitle: "required",
                    aboutContent: "required"
                },
                //For custom messages
                messages: {
                    aboutTitle: "Masukkan Judul.",
                    aboutContent: "Masukkan Isi."
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element.closest('.fg-line'));
                    }
                },
                submitHandler: function(form) {
                    var url = $(form).attr('action');
                    var data = new FormData($(form)[0]);
                    $.ajax({
                        type:'POST',
                        url: url,
                        data: data,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success:function(response){
                            location.href = response.redirect;
                            notify(response.status, response.title, response.message);
                        }
                    });
                }

            });
        });
    </script>
@endpush