
<div class="row m-2">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title m-b-40">Data {{$regresi->nama_kasus}}</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aksi</th>
                                        <th>{{$regresi->labelx}} (X)</th>
                                        <th>{{$regresi->labely}} (Y)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="#edit" class="text-primary lead tabedit" data-id="{{$item->id}}" data-datax="{{$item->datax}}" data-datay="{{$item->datay}}" data-toggle="tooltip" data-placement="top" title="Edit Data Detail"><i class="fa fa-edit"></i></a> |
                                            
                                            <a href="{{route('detail.delete', ['detail'=>$item->id])}}" class="text-danger lead "data-toggle="tooltip" data-placement="top" title="Hapus Data Detail" OnClick="return confirm('Apa anda yakin ingin mendelete ini?');"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td>{{$item->datax}}</td>
                                        <td>{{$item->datay}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $detail->links() }}
                    </div>
                    <div class="col-lg-6">
                        @include('contents.regresi.detail.tabform')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>