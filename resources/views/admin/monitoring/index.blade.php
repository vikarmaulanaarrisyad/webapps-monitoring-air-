@extends('layouts.app')

@section('title', 'Monitoring')

@section('title', 'Monitoring')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Monitoring</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-9">
            <x-card>
                <canvas id="barchart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </x-card>
        </div>

        <div class="col-lg-3">
            <x-card>
                <x-table>
                    <x-slot name="thead">
                        <tr>
                            <th>Jarak</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <td> > 80</td>
                            <td>
                                <span class="badge badge-danger">Bahaya</span>
                            </td>
                        </tr>
                        <tr>
                            <td> 50 - 79</td>
                            <td>
                                <span class="badge badge-warning">Siaga</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                < 49</td>
                            <td>
                                <span class="badge badge-success">Aman</span>
                            </td>
                        </tr>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection

@include('admin.monitoring.scripts')
