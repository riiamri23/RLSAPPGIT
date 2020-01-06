@extends('layouts.app')

@section('content')
<div class="row m-2">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-40">{{$regresi->nama_kasus}}</h4>
                
                <a href="{{route('regresi.edit', ['regresi'=>$regresi->id])}}" class="btn mb-1 btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-edit"></i></a>
                <a href="{{route('regresi.delete', ['regresi'=>$regresi->id])}}" class="btn mb-1 btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                <div role="group" class="btn-group">
                    <button data-toggle="dropdown" class="btn mb-1 btn-outline-secondary dropdown-toggle"><i class="fa fa-calculator"></i>Analisis Data</button>
                    <div class="dropdown-menu">
                        <a href="{{route('perhitungan.show', ['regresi'=>$regresi->id])}}" class="dropdown-item">Secara Deskriptif</a>
                        <a href="{{route('perhitungan.showTable', ['regresi'=>$regresi->id])}}" class="dropdown-item">Secara Tabel</a>
                    </div>
                </div>
                <hr />
                <p>H0 Kalimat : {{$regresi->h0}}</p>
                <p>H1 Kalimat : {{$regresi->h1}}</p>
                <p>Alpha : {{$regresi->alpha->nilai}}</p>
            </div>
        </div>
    </div>
</div>
@include('contents.regresi.detail.index')
@endsection