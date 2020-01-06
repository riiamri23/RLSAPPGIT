@extends('layouts.app')

@section('content')
    <div class="row m-2">
        <!-- /# column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <span class="text-primary">{{$title}}</span> 
                        <a href="{{route('regresi.create')}}" class="btn mb-1 btn-outline-info"><i class="fa fa-plus"></i> Tambah Baru</a>
                    </div>
                    @if (!$regresis->isEmpty())
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>Nama Kasus</th>
                                    <th>Label X <br />
                                        Label Y
                                    </th>
                                    <th>Alpha <br>
                                        Jumlah Data
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regresis as $item)
                                    <tr class="clickable-row" data-toggle="tooltip" data-placement="top" title="Click Untuk Lihat Data" data-href="{{route('regresi.show', ['regresi'=>$item->id])}}">
                                        <td>{{$item->nama_kasus}}</td>
                                        <td>{{$item->labelx}}<hr />
                                            {{$item->labely}}
                                        </td>
                                        <td>{{$item->alpha->nilai}} <hr>{{$item->countDetail($item->id)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $regresis->links() }}
                    @else
                    
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>Nama Kasus</th>
                                    <th>Label X <br />
                                        Label Y
                                    </th>
                                    <th>Alpha <br>
                                        Jumlah Data
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <div class="alert alert-warning">Belum ada data, klik Link berikut untuk menambah data 
                                        <a href="{{route('regresi.create')}}" class="text-info">Tambah Baru</a></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif

                        
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection