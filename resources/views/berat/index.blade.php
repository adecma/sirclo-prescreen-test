@extends('template.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Index Data

                    <div class="pull-right">
                        <a href="{{ route('berat.create') }}" class="btn btn-xs btn-success">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="table-index" class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Perbedaan</th>
                                    <th width="50px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>Rata-rata</th>
                                    <th>{{ $rataRata->avg_max }}</th>
                                    <th>{{ $rataRata->avg_min }}</th>
                                    <th colspan="2">{{ $rataRata->avg_perbedaan }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('add_js')
    <script>
        $(document).ready(function () {
            $('#table-index').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('src.berat') }}',
                columns: [
                    {
                        data: 'tanggal', name: 'tanggal'
                    },
                    {
                        data: 'max', name: 'max'
                    },
                    {
                        data: 'min', name: 'min'
                    },
                    {
                        data: 'perbedaan', name: 'perbedaan', searchable: false, orderable: true
                    },
                    {
                        data: 'aksi', name: 'aksi', searchable: false, orderable: false
                    },
                ]
            })
        });
    </script>
@endpush