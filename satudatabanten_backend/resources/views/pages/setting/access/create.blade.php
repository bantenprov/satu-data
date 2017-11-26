@extends('layout')

@section('title','Satu Data | Akses')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Tambah Akses <small>Tambah akses yang anda butuhkan dengan mengisi form di bawah.</small></h2>
            </div>
            <div class="card-body card-padding">
                <form id="formValidate" action="{{ route('access.create.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <input type="text" name="roleName" class="form-control fg-input">
                                </div>
                                <label class="fg-label">Nama Akses</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group fg-float">
                                <div class="fg-line">
                                    <textarea name="roleDesc" class="form-control fg-input" rows="3"></textarea>
                                </div>
                                <label class="fg-label">Deksripsi</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="20%">Modul &amp; Menu</th>
                                    <th width="20%" style="text-align: center;">Create</th>
                                    <th width="20%" style="text-align: center;">Read</th>
                                    <th width="20%" style="text-align: center;">Update</th>
                                    <th width="20%" style="text-align: center;">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menus as $menu)
                                    <tr>
                                        <td style="@if($menu->menu_level == '2') {{ 'padding-left:50px;' }} @endif">
                                            <div class="checkbox">
                                                <label>
                                                    @if($menu->menu_level == '1') {!!  '<b>' !!} @endif
                                                    <input type="checkbox" class="all child{{ $menu->menu_parent_id }}" id="all_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->menu_id }}">
                                                        <i class="input-helper"></i>
                                                        {{ $menu->menu_name }}
                                                    @if($menu->menu_level == '1') {!! '</b>' !!} @endif
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox">
                                                <?php if($menu->can_create){ ?>
                                                <label>
                                                    <input type="checkbox" name="permission[]" class="child{{ $menu->menu_parent_id }} create{{ $menu->menu_parent_id }} ck{{ $menu->menu_id }} cekbox" data-type="create" id="create_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->can_create_id }}">
                                                    <i class="input-helper"></i>
                                                    {{ $menu->can_create }}
                                                </label>
                                                <?php }else{ ?>
                                                    <center>
                                                    <i class="fa fa-minus"></i>
                                                    </center>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox">
                                                <?php if($menu->can_read){ ?>
                                                <label>
                                                    <input type="checkbox" name="permission[]" class="child{{ $menu->menu_parent_id }} read{{ $menu->menu_parent_id }} ck{{ $menu->menu_id }} cekbox" data-type="read" id="read_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->can_read_id }}">
                                                    <i class="input-helper"></i>
                                                    {{ $menu->can_read }}
                                                </label>
                                                <?php }else{ ?>
                                                    <center>
                                                    <i class="fa fa-minus"></i>
                                                    </center>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox">
                                                <?php if($menu->can_update){ ?>
                                                <label>
                                                    <input type="checkbox" name="permission[]" class="child{{ $menu->menu_parent_id }} update{{ $menu->menu_parent_id }} ck{{ $menu->menu_id }} cekbox" data-type="update" id="update_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->can_update_id }}">
                                                    <i class="input-helper"></i>
                                                    {{ $menu->can_update }}
                                                </label>
                                                <?php }else{ ?>
                                                    <center>
                                                    <i class="fa fa-minus"></i>
                                                    </center>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox">
                                                <?php if($menu->can_delete){ ?>
                                                <label>
                                                    <input type="checkbox" name="permission[]" class="child{{ $menu->menu_parent_id }} delete{{ $menu->menu_parent_id }} ck{{ $menu->menu_id }} cekbox" data-type="delete" id="delete_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->can_delete_id }}">
                                                    <i class="input-helper"></i>
                                                    {{ $menu->can_delete }}
                                                </label>
                                                <?php }else{ ?>
                                                    <center>
                                                    <i class="fa fa-minus"></i>
                                                    </center>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a href="{{ route('access') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
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