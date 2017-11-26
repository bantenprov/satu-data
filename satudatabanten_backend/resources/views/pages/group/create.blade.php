@extends('layout')

@section('title','Satu Data | Aplikasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Tambah Grup <small>Tambah grup yang anda butuhkan dengan mengisi form di bawah.</small></h2>
            </div>
            <div class="card-body card-padding">
                <form id="formValidate" action="{{ route('group.create.save')  }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="name" class="form-control fg-input" name="name" value="" type="text">
                                </div>
                                <label class="fg-label">Nama</label>
                                <span class="help-block">ex. My Group</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="url" class="form-control fg-input" name="url" value="" type="text">
                                </div>
                                <label class="fg-label">URL*</label>
                                <span class="help-block">eg. my-group</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <textarea class="form-control fg-input" name="description" id="description" rows="5"></textarea>
                                </div>
                                <label class="fg-label">Deskripsi</label>
                                <span class="help-block">eg. A little information about my group</span>
                            </div>
                        </div>
                    </div>
                    <label class="fg-line">Gambar</label>
                    <div class="row file-field">
                        <div class="col-sm-8">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                <div>
                                    <span class="btn btn-info btn-file waves-effect">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="...">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists waves-effect" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row link-field">
                        <div class="col-sm-6">
                            <a href="" class="btn btn-primary" id="link-btn"><i class="fa fa-link"></i> Link</a>
                            <div class="form-group link">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="zmdi zmdi-link"></i></span>
                                    <div class="fg-line">
                                        <input id="image_link" class="form-control fg-input" name="image_link" value="" placeholder="eg. http://example.com/my-image.jpg" type="text">
                                    </div>
                                    <a href="" class="input-group-addon last" id="link-close"><i class="zmdi zmdi-close"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a href="{{ route('group') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
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
        $(function(){
            $('#link-btn').on('click',function (e) {
                e.preventDefault();
                $('.link').show();
                $('.file-field').hide();
                $(this).hide();
            });
            $('#link-close').on('click',function (e) {
                e.preventDefault();
                $('#link-btn').show();
                $('.file-field').show();
                $(this).hide();
                $('.link').hide();
            });
        });
    </script>
@endpush