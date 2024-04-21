@extends('layouts.app')

@section('title', 'Data Ketinggian Air Pada ' . tanggal_indonesia($day, true))
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ tanggal_indonesia($day, true) }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>

                <x-table>
                    <x-slot name="thead">
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th width="25%" style="text-align: left !important;">Ketinggian Air</th>
                        <th width="25%" style="text-align: left !important;">Status</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection

@includeIf('include.datatable')
@includeIf('include.datepicker')

@push('scripts')
    <script>
        let modal = '#modal-form';
        let table;

        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('perhari.data', compact('day')) }}'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'tanggal',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'ketinggian',
                    searchable: false,
                    sortable: false,
                },
                {
                    data: 'status',
                    searchable: false,
                    sortable: false,
                },
            ],
            paginate: false,
            searching: false,
            bInfo: false,
            order: []
        });
    </script>
@endpush
