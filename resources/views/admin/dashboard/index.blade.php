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
                        <img src="{{ asset('images/logo/poltek.png') }}" alt="" class="text-center" style="display:block; margin:auto;" width="40%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-12">
                        <h4 class="text-munted text-center" >POLITEKNIK HARAPAN BERSAMA</h4>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
@endsection
