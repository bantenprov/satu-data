@extends('layout')

@section('title','Satu Data | Akses')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Rincian Akses <small>Rincian akses yang anda butuhkan dengan mengisi form di bawah.</small></h2>
            </div>
            <div class="card-body card-padding">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group fg-float">
                            <div class="fg-line">
                                <input type="text" name="roleName" class="form-control fg-input" value="{{ $role->name }}" disabled>
                            </div>
                            <label class="fg-label">Nama Akses</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group fg-float">
                            <div class="fg-line">
                                <textarea name="roleDesc" class="form-control fg-input" rows="3" disabled>{{ $role->description }}</textarea>
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

                                @php
                                $checkedCreate = '';
                                $checkedRead = '';
                                $checkedUpdate = '';
                                $checkedDelete = '';
                                @endphp

                                @foreach($permissions as $permission)
                                    @if($permission->permission_id == $menu->can_create_id)
                                        @php $checkedCreate = 'checked'; @endphp
                                    @endif
                                    @if($permission->permission_id == $menu->can_read_id)
                                        @php $checkedRead = 'checked'; @endphp
                                    @endif
                                    @if($permission->permission_id == $menu->can_update_id)
                                        @php $checkedUpdate = 'checked'; @endphp
                                    @endif
                                    @if($permission->permission_id == $menu->can_delete_id)
                                        @php $checkedDelete = 'checked'; @endphp
                                    @endif
                                @endforeach
                                <tr>
                                    <td style="@if($menu->menu_level == '2') {{ 'padding-left:50px;' }} @endif">
                                        <div class="checkbox">
                                            <label>
                                                @if($menu->menu_level == '1') {!!  '<b>' !!} @endif
                                                <input type="checkbox" class="all child{{ $menu->menu_parent_id }}" id="all_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->menu_id }}" {{ $checkedRead }} disabled>
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
                                                <input type="checkbox" name="permission[]" class="child{{ $menu->menu_parent_id }} create{{ $menu->menu_parent_id }} ck{{ $menu->menu_id }} cekbox" data-type="create" id="create_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->can_create_id }}" {{ $checkedCreate }} disabled>
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
                                                <input type="checkbox" name="permission[]" class="child{{ $menu->menu_parent_id }} read{{ $menu->menu_parent_id }} ck{{ $menu->menu_id }} cekbox" data-type="read" id="read_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->can_read_id }}" {{ $checkedRead }} disabled>
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
                                                <input type="checkbox" name="permission[]" class="child{{ $menu->menu_parent_id }} update{{ $menu->menu_parent_id }} ck{{ $menu->menu_id }} cekbox" data-type="update" id="update_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->can_update_id }}" {{ $checkedUpdate }} disabled>
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
                                                <input type="checkbox" name="permission[]" class="child{{ $menu->menu_parent_id }} delete{{ $menu->menu_parent_id }} ck{{ $menu->menu_id }} cekbox" data-type="delete" id="delete_{{ $menu->menu_id }}" data-parent="{{ $menu->menu_parent_id }}" value="{{ $menu->can_delete_id }}" {{ $checkedDelete }} disabled>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush