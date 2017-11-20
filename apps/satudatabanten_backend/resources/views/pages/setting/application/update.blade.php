@extends('layout')

@section('title','Satu Data | Aplikasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Ubah Pengaturan Aplikasi <small>Ubah pengaturan aplikasi yang anda butuhkan dengan mengisi form di bawah.</small></h2>
            </div>
            <div class="card-body card-padding">
                <form id="formValidate" action="{{ route('application.update.save',base64_encode($app->setting_id))  }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="settingCode" class="form-control fg-input" name="settingCode" type="text" value="{{ $app->setting_code }}" data-error=".errorTxt1">
                                </div>
                                <label class="fg-label">Kode*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="settingName" class="form-control fg-input" name="settingName" value="{{ $app->setting_name }}" type="text" data-error=".errorTxt2">
                                </div>
                                <label class="fg-label">Nama*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <textarea id="settingValue" class="form-control fg-input" name="settingValue" class="materialize-textarea validate" data-error=".errorTxt3">{{ $app->setting_value }}</textarea>
                                </div>
                                <label class="fg-label">Deskripsi*</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a href="{{ route('application') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
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
                    settingCode: "required",
                    settingName: "required",
                    settingValue: "required"
                },
                //For custom messages
                messages: {
                    settingCode: "Masukkan kode pengaturan",
                    settingName: "Masukkan nama pengaturan",
                    settingValue: "Masukkan deskripsi pengaturan"
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    var placement = $(element).data('error');
                    if (placement) {
                        $(placement).append(error)
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    var url = $(form).attr('action');
                    var data = $(form).serialize();
                    $.ajax({
                        type:'POST',
                        url: url,
                        data: data,
                        success:function(response){
                            location.href = response.redirect;
                            Materialize.toast(response.message, 4000);
                        }
                    });
                }

            });
        });
    </script>
@endpush