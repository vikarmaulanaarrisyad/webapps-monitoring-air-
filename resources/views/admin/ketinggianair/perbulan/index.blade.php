@extends('layouts.app')

@section('title', 'Data Ketinggian Air Pada Bulan ' . tanggal_indonesia($month))
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ tanggal_indonesia($month) }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter_tahun">Filter Tahun:</label>
                                <select class="form-control filter_tahun" id="filter_tahun"
                                    onchange="filterByYear(this.value)" name="filter_tahun">
                                    <option value="">Semua Tahun</option>
                                    @for ($tahun = date('Y'); $tahun >= 2020; $tahun--)
                                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="filter_bulan">Filter Bulan:</label>
                                <select class="form-control" id="filter_bulan" name="filter_bulan"
                                    onchange="filterByMonth(this.value)">
                                    <option value="">Semua Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </x-slot>
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
                url: '{{ route('perbulan.data') }}',
                data: function(d) {
                    d.bulan = $('[name=filter_bulan]').val();
                    d.tahun = $('[name=filter_tahun]').val();
                }
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

    <script>
        $(document).ready(function() {
            // Disable bulan saat halaman pertama dimuat
            $('#filter_bulan').prop('disabled', true);

            $('#filter_tahun').change(function() {
                var selectedYear = $(this).val();

                // Enable bulan jika tahun dipilih
                if (selectedYear !== '') {
                    $('#filter_bulan').prop('disabled', false);
                } else {
                    $('#filter_bulan').prop('disabled', true);
                    $('#filter_bulan').val('');

                }
            });
        });

        function filterByYear(tahun) {
            table.ajax.reload();
        }

        function filterByMonth(bulan) {
            table.ajax.reload();
        }
    </script>
@endpush
