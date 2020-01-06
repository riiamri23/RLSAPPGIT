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
                    @if (!empty($regresi))
                    <div class="row">
                        <div class="col-lg-12 col-sm-6">
                            <div class="card">
                                <div class="chart-wrapper mb-4">
                                    <div class="card-body pb-0 d-flex justify-content-between">
                                        <div>
                                            <h4 class="mb-1">Ringkasan</h4>
                                            <div class="form-group">
                                                <select id="regresi" name="regresi" class="selectpicker" data-container="body" data-live-search="true" >
                                                    <option value="">Pilih Regresi</option>
                                                    @foreach ($regresis as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_kasus}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('id_alpha')}}</span>
                                            </div>
                                            <h4 class="text-primary">{{$regresi[0]['nama_kasus']??$regresi->nama_kasus}}</h4>
                                            <p >Variabel X : {{$regresi[0]['labelx']??$regresi->labelx}}</p>
                                            <p >Variabel Y : {{$regresi[0]['labely']??$regresi->labely}}</p>
                                            <p>Jumlah Data : {{$data['detail']}}</p>
                                            <p></p>
                                            
                                            <div role="group" class="btn-group">
                                                <button data-toggle="dropdown" class="btn mb-1 btn-outline-secondary dropdown-toggle"><i class="fa fa-calculator"></i>Analisis Data</button>
                                                <div class="dropdown-menu">
                                                    <a href="{{route('perhitungan.show', ['regresi'=>$regresi[0]['id']??$regresi->id])}}" class="dropdown-item">Secara Deskriptif</a>
                                                    <a href="{{route('perhitungan.showTable', ['regresi'=>$regresi[0]['id']??$regresi->id])}}" class="dropdown-item">Secara Tabel</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- prepare a DOM container with width and height -->
                                        <div id="container" style="width: 600px;height:400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    @endif
                    
                        
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection