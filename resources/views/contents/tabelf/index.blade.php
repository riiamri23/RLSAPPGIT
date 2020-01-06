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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Pembilang</th>
                                            <th>Penyebut</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tabelf as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <a href="#" class="text-primary lead tabedit"  data-id="{{$item->id}}" data-alpha="{{$item->id_alpha}}"data-pembilang="{{$item->pembilang}}" data-penyebut="{{$item->penyebut}}" data-nilai="{{$item->nilai}}" data-toggle="tooltip" data-placement="top" title="Edit Data Alpha"><i class="fa fa-edit"></i></a> |
                                                    
                                                    <a href="{{route('tabelf.delete', ['tabelf'=>$item->id])}}" class="text-danger lead "data-toggle="tooltip" data-placement="top" title="Hapus Data" OnClick="return confirm('Apa anda yakin ingin mendelete ini?');"><i class="fa fa-trash"></i></a>
                                                </td>
                                                <td>{{$item->pembilang}}</td>
                                                <td>{{$item->penyebut}}</td>
                                                <td>{{$item->nilai}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $tabelf->onEachSide(3)->links() }}
                        </div>
                        <div class="col-lg-6">
                            @include('contents.tabelf.tabform')
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection