@extends('layout')

@section('title','Satu Data | Aktifitas')

@section('content')
    <div class="container">
        {!! $header !!}
        <div class="card">
            <div class="card-header">
                <h2>Daftar Aktivitas <small>Daftar aktivitas hingga saat ini.</small></h2>
            </div>

            <div class="card-body card-padding">
                <table id="table1" class="table table-bordered table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tautan</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Tautan</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
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
            var tbl = $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('activities.list') !!}',
                columns: [
                    { data: 'rownum', name: 'rownum' },
                    { data: 'activity_link', name: 'activity_link' },
                    { data: 'activity_description', name: 'activity_description' },
                    { data: 'activity_date', name: 'activity_date' },
                    { data: 'activity_status_name', name: 'activity_status_name' }
                ],
                fnRowCallback: function( row, data, iDisplayIndex ) {
                    var info = tbl.page.info();
                    var page = info.page;
                    var length = info.length;
                    var index = (page * length + (iDisplayIndex +1));
                    $('td:eq(0)', row).html(index);
                }
            });
        });
    </script>
@endpush