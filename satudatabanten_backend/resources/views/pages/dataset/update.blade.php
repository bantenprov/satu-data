@extends('layout')

@section('title','Satu Data | Aplikasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Ubah Dataset <small>Ubah dataset yang anda butuhkan dengan mengisi form di bawah.</small></h2>
            </div>
            <div class="card-body card-padding">
                <form id="formValidate" action="{{ route('dataset.update.save')  }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="title" class="form-control fg-input" name="title" value="" type="text">
                                </div>
                                <label class="fg-label">Judul</label>
                                <span class="help-block">eg. A descriptive title</span>
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
                                <span class="help-block">eg. my-dataset</span>
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
                                <span class="help-block">eg. Some useful notes about the data</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="tag" class="form-control fg-input" name="tag" value="" type="text">
                                </div>
                                <label class="fg-label">Tag</label>
                                <span class="help-block">eg. economy, mental health, government</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="fg-label">Lisensi</label>
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <select class="tag-select" name="license" data-placeholder="Choose a Country...">
                                        <option value="cc-by">Creative Commons Attribution</option>
                                        <option value="cc-by-sa">Creative Commons Attribution Share-Alike</option>
                                        <option value="cc-zero">Creative Commons CCZero</option>
                                        <option value="cc-nc">Creative Commons Non-Commercial (Any)</option>
                                        <option value="gfdl">GNU Free Documentation License</option>
                                        <option value="other-at">Lainnya (Attribution)</option>
                                        <option value="other-pd">Lainnya (Domain Publik)</option>
                                        <option value="other-nc">Lainnya (Non-Commercial)</option>
                                        <option value="other-closed">Lainnya (Not Open)</option>
                                        <option value="other-open">Lainnya (Open)</option>
                                        <option value="notspecified">License not specified</option>
                                        <option value="odc-by">Open Data Commons Attribution License</option>
                                        <option value="odc-odbl">Open Data Commons Open Database License (ODbL)</option>
                                        <option value="odc-pddl">Open Data Commons Public Domain Dedication and License (PDDL)</option>
                                        <option value="uk-ogl">UK Open Government Licence (OGL)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="fg-label">Organisasi</label>
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <select name="organization" class="tag-select" data-placeholder="Choose a Country...">
                                        <option value="45008fdf-6931-4f90-aa79-3bb14c6da66e" selected="selected">Asisten Pemerintahan dan Kesejahteraan Rakyat</option>
                                        <option value="0daad512-2b3c-4e2c-b40b-b6c896c983a0">Biro Pemerintahan</option>
                                        <option value="db925ffe-1bb1-4e03-b929-9f39139a6aff">Sekretariat Daerah</option>
                                        <option value="1234d512-2b3c-4e2c-b40b-b6c896c983a2">Test Organisasi</option>
                                        <option value="x1261e55-0c11-47f6-b336-4fdde3fad2e4">Test Organisasi Lagi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="fg-label">Visibility</label>
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <select name="visibilty" class="selectpicker bs-select-hidden">
                                        <option>Privat</option>
                                        <option>Publik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="source" class="form-control fg-input" name="source" value="" type="text">
                                </div>
                                <label class="fg-label">Sumber</label>
                                <span class="help-block">ex. : http://example.com/dataset.json</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="version" class="form-control fg-input" name="version" value="" type="text">
                                </div>
                                <label class="fg-label">Versi</label>
                                <span class="help-block">ex. : 1.0</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="author" class="form-control fg-input" name="author" value="" type="text">
                                </div>
                                <label class="fg-label">Pembuat</label>
                                <span class="help-block">ex. : Joe Bloggs</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="author" class="form-control fg-input" name="author" value="" type="text">
                                </div>
                                <label class="fg-label">Pembuat</label>
                                <span class="help-block">ex. : Joe Bloggs</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="author_email" class="form-control fg-input" name="author_email" value="" type="text">
                                </div>
                                <label class="fg-label">Author Email</label>
                                <span class="help-block">ex. : joe@example.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="maintainer" class="form-control fg-input" name="maintainer" value="" type="text">
                                </div>
                                <label class="fg-label">Pemelihara</label>
                                <span class="help-block">ex. : Joe Bloggs</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="maintainer_email" class="form-control fg-input" name="maintainer_email" value="" type="text">
                                </div>
                                <label class="fg-label">Maintainer Email</label>
                                <span class="help-block">ex. : joe@example.com</span>
                            </div>
                        </div>
                    </div>
                    <label for="" class="fg-label">Custom Field</label>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="field_extra_key" class="form-control fg-input" name="field_extra_key" value="" type="text">
                                </div>
                                <label class="fg-label">Key</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="field_extra_value" class="form-control fg-input" name="field_extra_value" value="" type="text">
                                </div>
                                <label class="fg-label">Value</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="field_extra_key" class="form-control fg-input" name="field_extra_key" value="" type="text">
                                </div>
                                <label class="fg-label">Key</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="field_extra_value" class="form-control fg-input" name="field_extra_value" value="" type="text">
                                </div>
                                <label class="fg-label">Value</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="field_extra_key" class="form-control fg-input" name="field_extra_key" value="" type="text">
                                </div>
                                <label class="fg-label">Key</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input id="field_extra_value" class="form-control fg-input" name="field_extra_value" value="" type="text">
                                </div>
                                <label class="fg-label">Value</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a href="{{ route('dataset') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary btn-icon-text waves-effect"><i class="zmdi zmdi-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        var $ = jQuery;

        $(".all").click(function(){
            var ref = $(this).val();
            var dataparent = $(this).attr('data-parent');
            var action = false;
            if(this.checked){
                action = true;
            }
            $(".child"+ref).each(function(){
                if($(this).attr('data-parent') == ref){
                    $(this).prop('checked', action);
                }
            });
            $('#read_'+ref).prop('checked', action);
            $('#create_'+ref).prop('checked', action);
            $('#update_'+ref).prop('checked', action);
            $('#delete_'+ref).prop('checked', action);
            $('#approve_'+ref).prop('checked', action);
            $('#print_'+ref).prop('checked', action);
            var count = $(".child"+ref).length;
            if(count == 0){
                var countcek = 0;
                var countall = $(".child"+dataparent).length;
                $(".child"+dataparent).each(function(){
                    if(this.checked){
                        countcek++;
                    }
                });
                if(countcek>0){
                    $('#all_'+dataparent).prop('checked',true);
                    $('#read_'+dataparent).prop('checked', true);
                    $('#create_'+dataparent).prop('checked', true);
                    $('#update_'+dataparent).prop('checked', true);
                    $('#delete_'+dataparent).prop('checked', true);
                    $('#approve_'+dataparent).prop('checked', true);
                    $('#print_'+dataparent).prop('checked', true);
                }else{
                    $('#all_'+dataparent).prop('checked',false);
                    $('#read_'+dataparent).prop('checked', false);
                    $('#create_'+dataparent).prop('checked', false);
                    $('#update_'+dataparent).prop('checked', false);
                    $('#delete_'+dataparent).prop('checked', false);
                    $('#approve_'+dataparent).prop('checked', false);
                    $('#print_'+dataparent).prop('checked', false);
                }
            }
        });

        $('.cekbox').click(function(){
            var ref = $(this).val();
            var dataparent = $(this).attr('data-parent');
            var type = $(this).attr('data-type');
            var action = false;
            if(this.checked){
                action = true;
            }
            $("."+type+ref).each(function(){
                if($(this).attr('data-parent') == ref){
                    $(this).prop('checked', action);
                }
            });
            if(this.checked){
                action = true;
                $("#"+type+'_'+dataparent).prop('checked', true);
                if(type!='read'){
                    $("#read_"+ref).prop('checked', true);
                    $("#read_"+dataparent).prop('checked', true);
                    $(".read"+ref).each(function(){
                        if($(this).attr('data-parent') == ref){
                            $(this).prop('checked', action);
                        }
                    });
                }
            }else{
                var n = 0;
                $("."+type+dataparent).each(function(){
                    if(this.checked){
                        n++;
                    }
                });
                if(n==0){
                    $("#"+type+'_'+dataparent).prop('checked', false);
                }
            }
            cekuncekheader(ref,dataparent);
        });

        $(function() {
            $("#formValidate").validate({
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                rules: {
                    roleName: "required",
                    roleDesc: "required"
                },
                //For custom messages
                messages: {
                    roleName: "Masukkan Nama Peran",
                    roleDesc: "Masukkan Deskripsi"
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

        function cekuncekheader(ref,dataparent){
            var n = 0;
            $(".ck"+ref).each(function(){
                if(this.checked){
                    n++;
                }
            });
            if(n<6){
                $('#all_'+ref).prop('checked',false);
                $(".all").each(function(){
                    if($(this).attr('data-parent') == ref){
                        $(this).prop('checked', false);
                    }
                });
            }else{
                $('#all_'+ref).prop('checked',true);
                $(".all").each(function(){
                    if($(this).attr('data-parent') == ref){
                        $(this).prop('checked', true);
                    }
                });

            }
            var m = 0;
            $(".ck"+dataparent).each(function(){
                if(this.checked){
                    m++;
                }
            });
            if(m<6){
                $('#all_'+dataparent).prop('checked',false);
            }else{
                $('#all_'+dataparent).prop('checked',true);
            }
        }
    </script>
@endpush