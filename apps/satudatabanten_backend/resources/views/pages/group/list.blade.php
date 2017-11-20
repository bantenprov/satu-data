@extends('layout')

@section('title','Satu Data | Organisasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Daftar Grup <small>Daftar grup yang telah dibuat.</small></h2>
            </div>

            <div class="card-body card-padding">
                <table id="table1" class="table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Deksripsi</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Deksripsi</th>
                        <Aksi></Aksi>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(1)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(1)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(1)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(2)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(2)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(2)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(3)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(3)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(3)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(4)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(4)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(4)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(5)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(5)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(5)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(6)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(6)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(6)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(7)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(7)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(7)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(8)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(8)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(8)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(9)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(9)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(9)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Grup</td>
                        <td>This group has no description</td>
                        <td>
                            <a href="{{ route('group.detail',base64_encode(10)) }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-original-title="Detil" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-format-subject"></i></a>
                            &nbsp;<a href="{{ route('group.update',base64_encode(10)) }}" class="btn btn-warning waves-effect update-btn" data-toggle="tooltip" data-original-title="Ubah" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-edit"></i></a>
                            &nbsp;<a href="{{ route('group.unactivate',base64_encode(10)) }}" class="btn btn-danger waves-effect unactivate-btn" data-toggle="tooltip" data-original-title="Non-Aktifkan" data-placement="top" style="padding: 3px 8px;"><i class="zmdi zmdi-close"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                $('#table1').DataTable();
                $('#table1 tbody').on( 'click', '.update-btn', function (e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    swal({  title: "Anda yakin?",
                            text: "Kamu akan mengubah data ini!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Ya, Ubah data ini!",
                            cancelButtonText: "Tidak, Saya Ragu!",
                            closeOnConfirm: false },
                        function(){
                            location.href = url;
                        });
                });
                $('#table1 tbody').on( 'click', '.unactivate-btn', function (e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    swal({  title: "Anda yakin?",
                            text: "Kamu akan menon-aktifkan data ini!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Ya, Non-Aktifkan!",
                            cancelButtonText: "Tidak, Saya Ragu!",
                            closeOnConfirm: false },
                        function(){
                            $.ajax({
                                type:'GET',
                                url: url,
                                data:'_token = {{  csrf_token() }}',
                                success:function(response){
                                    if(response.status > 0){
                                        tbl.ajax.reload();
                                        swal("Dinon-aktifkan!", "Data telah dinon-aktifkan.", "success");
                                    }
                                }
                            });
                        });
                });
                $('#table1 tbody').on( 'click', '.activate-btn', function (e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    swal({  title: "Anda yakin?",
                            text: "Kamu akan mengaktikan data ini!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Ya, Aktfikan!",
                            cancelButtonText: "Tidak, Saya Ragu!",
                            closeOnConfirm: false },
                        function(){
                            $.ajax({
                                type:'GET',
                                url: url,
                                data:'_token = {{  csrf_token() }}',
                                success:function(response){
                                    if(response.status > 0){
                                        tbl.ajax.reload();
                                        swal("Diaktifkan!", "Data telah diaktifkan.", "success");
                                    }
                                }
                            });
                        });
                });
            });
        });
    </script>
@endpush