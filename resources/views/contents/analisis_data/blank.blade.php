@extends('layouts.app')

@section('content')
    <div class="row m-2">
        <!-- /# column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <span class="text-primary">{{$title}}</span>
                    </div>
                        
                    <div class="alert alert-warning">Belum ada data, klik Link berikut untuk menambah data 
                    <a href="{{route('regresi.create')}}" class="text-info">Tambah Baru</a></div>
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection