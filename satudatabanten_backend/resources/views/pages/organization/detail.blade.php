@extends('layout')

@section('title','Satu Data | Aplikasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Rincian Organisasi <small>Rincian organisasi yang telah dibuat.</small></h2>
            </div>
            <div class="card-body card-padding">
                <table border="0" cellpadding="0" width="100%">
                    <tr>
                        <td colspan="2" style="padding-bottom: 25px;">
                            <img src="{{ $datas->organization_image_url }}" alt="" style="height: 150px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>ID </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->organization_id }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Nama </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->organization_name }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Judul </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->organization_title }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Deskripsi </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->organization_description }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Dibuat pada </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->organization_created }}</td>
                    </tr>
                    <tr>
                        <td width="20%" style="padding-bottom: 15px;"><strong>Status </strong></td>
                        <td width="80%" style="padding-bottom: 15px;">:
                            @if($datas->organization_state == "active")
                                <span class="badge bgm-lightgreen">Aktif</span>
                            @else
                                <span class="badge bgm-red">Non-Aktif</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;" valign="top"><strong>Organisasi Tambahan </strong></td>
                        <td width="85%" style="padding-bottom: 15px;" valign="top">
                            <table border="0" cellpadding="0" width="100%">
                            @for($i=0;$i<count($datas->organization_additional);$i++)
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>ID </strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->organization_additional[$i]->id }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>Group ID</strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->organization_additional[$i]->organization_id }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>Key </strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->organization_additional[$i]->key }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>Value </strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->organization_additional[$i]->value }}</td>
                                    </tr>
                            @endfor
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('organization') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection