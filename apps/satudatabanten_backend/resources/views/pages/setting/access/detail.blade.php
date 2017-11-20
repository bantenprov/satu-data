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
                                <input type="text" name="accessName" class="form-control fg-input" disabled="disabled">
                            </div>
                            <label class="fg-label">Nama Akses</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="20%">Modul &amp; Menu</th>
                                <th width="80%">Izin</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menu)
                                <tr>
                                    <td style="@if($menu->menu_level == '2') {{ 'padding-left:50px;' }} @endif">
                                        @if($menu->menu_level == '1') {!!  '<b>' !!} @endif
                                        @if($menu->menu_level == '2') {!! '<i class="fa fa-chevron-circle-right"></i>' !!} @endif
                                        {{ $menu->menu_name }}
                                        @if($menu->menu_level == '1') {!! '</b>' !!} @endif
                                    </td>
                                    <td style="@if($menu->menu_level == '2') {{ 'padding-left:50px;' }} @endif" class="checkbox">
                                        <label>
                                            <input type="checkbox" value="{{ $menu->name }}" disabled="disabled">
                                            <i class="input-helper"></i>
                                            {{ $menu->name }}
                                        </label>
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