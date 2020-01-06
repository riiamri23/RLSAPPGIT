@extends('layouts.app')

@section('content')
    <div class="row m-2">
        <!-- /# column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                
                    <h4 class="card-title">Tambah {{$title}} Form</h4>
                    <div class="basic-form">
                        <form action="{{route('regresi.store')}}" method="POST" >
                            
                            @include('contents.regresi.form')
                            <button type="submit" class="btn btn-primary">Submit</button>

                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection