@extends('layout')

@section('title','Satu Data | Pengguna')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Rincian Pengaturan Pengguna <small>Rincian pengaturan pengguna yang telah dibuat.</small></h2>
            </div>
            <div class="card-body card-padding">
                <table border="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="20%" style="padding-bottom: 15px;"><strong>No. Induk Kependudukan </strong></td>
                        <td width="80%" style="padding-bottom: 15px;">: {{ $user->nik }}</td>
                    </tr>
                    <tr>
                        <td width="20%" style="padding-bottom: 15px;"><strong>Nama </strong></td>
                        <td width="80%" style="padding-bottom: 15px;">: {{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td width="20%" style="padding-bottom: 15px;"><strong>Email </strong></td>
                        <td width="80%" style="padding-bottom: 15px;">: {{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td width="20%" style="padding-bottom: 15px;"><strong>Dibuat Pada </strong></td>
                        <td width="80%" style="padding-bottom: 15px;">: {{ dateEnToId($user->created_at,'d M Y') }}</td>
                    </tr>
                    <tr>
                        <td width="20%" style="padding-bottom: 15px;"><strong>Status </strong></td>
                        <td width="80%" style="padding-bottom: 15px;">:
                            @if($user->status > 0)
                            <span class="badge bgm-lightgreen">Aktif</span>
                            @else
                            <span class="badge bgm-red">Non-Aktif</span>
                            @endif
                        </td>
                    </tr>
                </table>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('user') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection