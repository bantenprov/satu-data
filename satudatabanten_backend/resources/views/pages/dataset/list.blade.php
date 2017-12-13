@extends('layout')

@section('title','Satu Data | Dataset')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Daftar Dataset <small>Daftar dataset yang telah dibuat.</small></h2>
            </div>

            <div class="card-body card-padding">
                <div role="tabpanel">
                    <ul class="tab-nav" role="tablist" tabindex="1" style="overflow: hidden; outline: none;">
                        <li class="active"><a href="#public" aria-controls="public" role="tab" data-toggle="tab" aria-expanded="true">Publik</a></li>
                        <li class=""><a href="#private" aria-controls="private" role="tab" data-toggle="tab" aria-expanded="false">Privat</a></li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="public">
                            <table id="table1" class="table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Dibuat Pada</th>
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
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th style="width: 100px;">Aksi</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="private">
                            <table id="table2" class="table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Dibuat Pada</th>
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
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th style="width: 100px;">Aksi</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(function() {
                var tbl1 = $('#table1').DataTable({
                    "order": [[ 0, "desc" ]],
                    "aoColumns": [
                        { "sClass": "text-center" },
                        { "sClass": "text-left" },
                        { "sClass": "text-left" },
                        { "sClass": "text-left" },
                        { "sClass": "text-left" },
                        { "sClass": "text-left" },
                        { "sClass": "text-center", "bSortable": false }
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{!! route('dataset.list.public') !!}",
                    "fnServerData": function( sUrl, aoData, fnCallback, oSettings ) {
                        oSettings.jqXHR = $.ajax({
                            "url": sUrl,
                            "data": aoData,
                            "success": fnCallback,
                            "dataType": "jsonp",
                            "cache": false
                        });
                    },
                    "fnDrawCallback": function (e) {
                        $('[data-toggle="tooltip"]').tooltip();
                    }
                });

                var tbl2 = $('#table2').DataTable({
                    "order": [[ 0, "desc" ]],
                    "aoColumns": [
                        { "sClass": "text-center" },
                        { "sClass": "text-left" },
                        { "sClass": "text-left" },
                        { "sClass": "text-left" },
                        { "sClass": "text-left" },
                        { "sClass": "text-left" },
                        { "sClass": "text-center", "bSortable": false }
                    ],
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": "{!! route('dataset.list.private') !!}",
                    "fnServerData": function( sUrl, aoData, fnCallback, oSettings ) {
                        oSettings.jqXHR = $.ajax({
                            "url": sUrl,
                            "data": aoData,
                            "success": fnCallback,
                            "dataType": "jsonp",
                            "cache": false
                        });
                    },
                    "oLanguage": {
                        "sEmptyTable":     "333My Custom Message On Empty Table"
                    },
                    "fnDrawCallback": function (e) {
                        $('[data-toggle="tooltip"]').tooltip();
                    }
                });

                $('#table1 tbody, #table2 tbody').on( 'click', '.update-btn', function (e) {
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
                $('#table1 tbody, #table2 tbody').on( 'click', '.unactivate-btn', function (e) {
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
                                        tbl1.ajax.reload();
                                        tbl2.ajax.reload();
                                        swal("Dinon-aktifkan!", "Data telah dinon-aktifkan.", "success");
                                    }
                                }
                            });
                        });
                });
                $('#table1 tbody, #table2 tbody').on( 'click', '.activate-btn', function (e) {
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
                                        tbl1.ajax.reload();
                                        tbl2.ajax.reload();
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