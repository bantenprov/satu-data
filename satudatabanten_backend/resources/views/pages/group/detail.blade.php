@extends('layout')

@section('title','Satu Data | Aplikasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Rincian Grup <small>Rincian grup yang telah dibuat.</small></h2>
            </div>
            <div class="card-body card-padding">
                <table border="0" cellpadding="0" width="100%">
                    <tr>
                        <td colspan="2" style="padding-bottom: 25px;">
                            <img src="{{ $datas->group_image_url }}" alt="" style="height: 150px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>ID </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->group_id }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Nama </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->group_name }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Judul </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->group_title }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Deskripsi </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->group_description }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Dibuat pada </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ dateEnToId($datas->group_created,'d M Y') }}</td>
                    </tr>
                    <tr>
                        <td width="20%" style="padding-bottom: 15px;"><strong>Status </strong></td>
                        <td width="80%" style="padding-bottom: 15px;">:
                            @if($datas->group_state == "active")
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
                                @for($i=0;$i<count($datas->group_additional);$i++)
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>ID </strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->group_additional[$i]->id }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>Group ID</strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->group_additional[$i]->group_id }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>Key </strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->group_additional[$i]->key }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>Value </strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->group_additional[$i]->value }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><hr></td>
                                    </tr>
                                @endfor
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('group') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection