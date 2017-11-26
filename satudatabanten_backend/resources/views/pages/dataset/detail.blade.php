@extends('layout')

@section('title','Satu Data | Aplikasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Rincian Dataset <small>Rincian dataset yang telah dibuat.</small></h2>
            </div>
            <div class="card-body card-padding">
                <table border="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>ID </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_id }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Nama </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_name }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Judul </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_title }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Deskripsi </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_notes }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Dibuat pada </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ dateEnToId($datas->dataset_created,'d M Y') }}</td>
                    </tr>
                    <tr>
                        <td width="20%" style="padding-bottom: 15px;"><strong>Status </strong></td>
                        <td width="80%" style="padding-bottom: 15px;">:
                            @if($datas->dataset_state == "active")
                                <span class="badge bgm-lightgreen">Aktif</span>
                            @else
                                <span class="badge bgm-red">Non-Aktif</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Kode Lisensi </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_license_id }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Sumber </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_source }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Versi </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_version }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Privasi </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_private }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Pembuat </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_author }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Email Pembuat</strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_author_email }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Pemelihara </strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_maintainer }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Email Pemelihara</strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_maintainer_email }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>ID Organisasi Dataset</strong></td>
                        <td width="85%" style="padding-bottom: 15px;">: {{ $datas->dataset_organization_id }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;" valign="top"><strong>Dataset Tambahan </strong></td>
                        <td width="85%" style="padding-bottom: 15px;" valign="top">
                            <table border="0" cellpadding="0" width="100%">
                                @for($i=0;$i<count($datas->dataset_additional);$i++)
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>ID </strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->dataset_additional[$i]->id }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>Package ID</strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->dataset_additional[$i]->package_id }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>Key </strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->dataset_additional[$i]->key }}</td>
                                    </tr>
                                    <tr>
                                        <td width="10%" style="padding-bottom: 15px;"><strong>Value </strong></td>
                                        <td width="90%" style="padding-bottom: 15px;">: {{ $datas->dataset_additional[$i]->value }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><hr></td>
                                    </tr>
                                @endfor
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="15%" style="padding-bottom: 15px;"><strong>Tag Dataset</strong></td>
                        <td width="85%" style="padding-bottom: 15px;">:
                            @for($i=0;$i<count($datas->dataset_tag);$i++)
                                <span class="badge bgm-lightblue">{{ $datas->dataset_tag[$i] }}</span>
                            @endfor
                        </td>
                    </tr>
                </table>
                <br>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('dataset') }}" class="btn btn-default btn-icon-text waves-effect"><i class="zmdi zmdi-arrow-back"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection