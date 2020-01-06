@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Aplikasi Regresi Linier Sederhana</h3>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Data Regresi</h3>
                    <div class="d-inline-block">
                        @if ($data['regresi'] > 0)
                        <h4 class="text-white">Jumlah Data : {{$data['regresi']}}</h4>
                        @else
                        <h4 class="text-white">Belum Ada riwayat Data</h4>
                        @endif
                        <a href="{{URL::to('/regresi')}}"><p class="text-white mb-0"><i class="fa fa-external-link"></i> Lihat Data Regresi</p></a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-file"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Analisis Data</h3>
                    <div class="d-inline-block">
                        @if ($data['regresi'] > 0)
                        <h4 class="text-white">Jumlah Data : {{$data['regresi']}}</h4>
                        @else
                        <h4 class="text-white">Belum Ada riwayat Data</h4>
                        @endif
                        <a href="{{URL::to('/regresi')}}"><p class="text-white mb-0"><i class="fa fa-external-link"></i> Lihat Analisis Data</p></a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-superscript"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Tutorial</h3>
                    <div class="d-inline-block">
                        <h4 class="text-white">Pelajari penggunaan aplikasi</h4>
                        <a href="{{URL::to('/tutorial')}}"><p class="text-white mb-0"><i class="fa fa-external-link"></i> Lihat Tutorial</p></a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-question"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Tentang Aplikasi</h3>
                    <div class="d-inline-block">
                        <h4 class="text-white">Mengenal aplikasi dan sumber daya aplikasi</h4>
                        <a href="{{URL::to('/tentang')}}"><p class="text-white mb-0"><i class="fa fa-external-link"></i> Lihat Tentang Aplikasi</p></a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-info"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
