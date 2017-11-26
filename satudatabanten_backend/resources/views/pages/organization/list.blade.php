@extends('layout')

@section('title','Satu Data | Organisasi')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Daftar Organisasi <small>Daftar organisasi yang telah dibuat.</small></h2>
            </div>

            <div class="card-body card-padding">
                <table id="table1" class="table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>URL Gambar</th>
                        <th>Status</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>URL Gambar</th>
                        <th>Status</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                var tbl = $('#table1').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('organization.list') !!}',
                    columns: [
                        { data: 'rownum', name: 'rownum', className: 'text-center' },
                        { data: 'id', name: 'id', className: 'text-left' },
                        { data: 'name', name: 'name', className: 'text-left' },
                        { data: 'title', name: 'title', className: 'text-left' },
                        { data: 'image_url', name: 'image_url', className: 'text-left' },
                        { data: 'state', name: 'state', className: 'text-center' },
                        { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
                    ],
                    fnDrawCallback: function (e) {
                        $('[data-toggle="tooltip"]').tooltip({delay: 50, position: 'top'});
                    },
                    fnRowCallback: function( row, data, iDisplayIndex ) {
                        var info = tbl.page.info();
                        var page = info.page;
                        var length = info.length;
                        var index = (page * length + (iDisplayIndex +1));
                        $('td:eq(0)', row).html(index);
                    }
                });
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