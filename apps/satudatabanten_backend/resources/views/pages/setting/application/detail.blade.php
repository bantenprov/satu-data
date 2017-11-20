@extends('layout')

@section('title','Satu Data | Aplikasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Rincian Pengaturan Aplikasi <small>Rincian pengaturan aplikasi yang telah dibuat.</small></h2>
            </div>
            <div class="card-body card-padding">
                <table border="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Kode </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $app->setting_code }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Nama </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $app->setting_name }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Deskripsi </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {!! $app->setting_value !!}</td>
                    </tr>
                </table>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('application') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection