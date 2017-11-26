@extends('layout')

@section('title','Satu Data | Aplikasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Ubah Pengaturan Pengguna <small>Ubah pengaturan pengguna yang anda butuhkan dengan mengisi form di bawah.</small></h2>
            </div>
            <div class="card-body card-padding">
                <form id="formValidate" action="{{ route('user.update.save', base64_encode($roleUser->id))  }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="fg-label">Peran</label>
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <select class="tag-select" name="userRole" data-placeholder="Choose a Country...">
                                        <option value="">[Pilih Peran]</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($role->id == $roleUser->role_id ? 'selected' : '') }}>{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="userNIK" class="form-control fg-input" name="userNIK" value="{{ $roleUser->nik }}" type="text">
                                </div>
                                <label class="fg-label">Nomor Induk Kependudukan*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="userName" class="form-control fg-input" name="userName" value="{{ $roleUser->name }}" type="text">
                                </div>
                                <label class="fg-label">Nama*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="userEmail" class="form-control fg-input" name="userEmail" value="{{ $roleUser->email }}" type="email">
                                </div>
                                <label class="fg-label">Email*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="userPassword" class="form-control fg-input" name="userPassword" value="" type="password">
                                </div>
                                <label class="fg-label">Password*</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="userPasswordConfirm" class="form-control fg-input" name="userPasswordConfirm" value="" type="password">
                                </div>
                                <label class="fg-label">Konfirmasi Password*</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a href="{{ route('user') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
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
                    userNIK: "required",
                    userName: "required",
                    userEmail: {
                        required: true,
                        email: true
                    },
                    userPassword : {
                        minlength : 5
                    },
                    UserPasswordConfirm : {
                        minlength : 5,
                        equalTo : "#userPassword"
                    }
                },
                //For custom messages
                messages: {
                    userNIK: "Masukkan Nomor Induk Kependudukan",
                    userName: "Masukkan nama",
                    userEmail: {
                        required: "Masukkan email",
                        email: "Masukkan email yang valid"
                    },
                    userPassword: {
                        minlength: jQuery.validator.format("Masukkan minimal {0} karakter")
                    },
                    userPasswordConfirm: {
                        minlength: jQuery.validator.format("Masukkan minimal {0} karakter")
                    }
                },
                errorElement : 'div',
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
                    var data = $(form).serialize();
                    $.ajax({
                        type:'POST',
                        url: url,
                        data: data,
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