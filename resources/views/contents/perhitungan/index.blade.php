@extends('layouts.app')

@section('content')
    
<div class="row m-2">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <span class="text-primary">{{$title}}</span> 
                    <a href="{{route($export, ['regresi'=>$regresi->id])}}" class="btn mb-1 btn-outline-info"><i class="fa fa-print"></i> Export PDF</a>
                </div>
                
                @include($content)
            </div>
        </div>
    </div>
</div>
                                
@endsection
