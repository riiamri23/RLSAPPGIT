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
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Nilai Alpha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alpha as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>

                                                    <a href="#" class="text-primary lead tabedit"  data-id="{{$item->id}}" data-nilai="{{$item->nilai}}" data-toggle="tooltip" data-placement="top" title="Edit Data Alpha"><i class="fa fa-edit"></i></a> |

                                                    <a href="{{route('alpha.delete', ['alpha'=>$item->id])}}" class="text-danger lead "data-toggle="tooltip" data-placement="top" title="Hapus Data Detail" OnClick="return confirm('Apa anda yakin ingin mendelete ini?');"><i class="fa fa-trash"></i></a>
                                                </td>
                                                <td>{{$item->nilai}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @include('contents.alpha.tabform')
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection