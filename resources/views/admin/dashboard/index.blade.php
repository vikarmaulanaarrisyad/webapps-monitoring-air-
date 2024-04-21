@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <h4 class="text-muted">SISTEM MONITORING KETINGGIAN AIR PADA MUARA</h4>
                </x-slot>
                <div class="row">
                    <div class="col-lg-12 col-12 col-sm-12 col-md-12">
                        <img src="{{ asset('images/logo/poltek.png') }}" alt="" class="text-center"
                            style="display:block; margin:auto;" width="40%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-12">
                        <h4 class="text-munted text-center">POLITEKNIK HARAPAN BERSAMA</h4>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Laporan Grafik Ketinggian Air <span class="text-sm text-red">Perminggu</span>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">

                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="revenue-chart-canvas" height="600"
                                style="height: 300px; display: block; width: 649px;" width="1298"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <canvas id="sales-chart-canvas" height="0" style="height: 0px; display: block; width: 0px;"
                                width="0" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.dashboard.scripts')
