
<form class="mb-2 form-inline" action="{{route('detail.storemulti')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id_regresi" id="id_regresi" class="form-control form-control-sm" value="{{$regresi->id}}">
    <div class="form-group col-6">
        <label for="file">Tambah data dengan file excel (.csv, .xlsx)</label>
        <input type="file" class="form-control-file" id="file" name="file" required rel="popover" data-placement="bottom" data-original-title="Contoh format excel" data-trigger="hover">
    </div>
    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
</form>      

<hr />
<ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="true">Tambah Data</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit Data</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="add-tab">
        <h4 class="m-3 text-success"><i class="fa fa-plus"></i> Tambah Data</h4>
        <form action="{{route('detail.store')}}" method="POST" >
            
            <input type="hidden" name="id_regresi" id="id_regresi" class="form-control form-control-sm" value="{{$regresi->id}}">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label col-form-label-lg" for="datax">Data X</label>
                <div class="col-sm-6">
                    <input type="number" name="datax" id="datax" class="form-control form-control-sm" placeholder="X" value="{{old('datax') ?? $regresi->datax}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label col-form-label-lg" for="datay">Data X</label>
                <div class="col-sm-6">
                    <input type="number" name="datay" id="datay" class="form-control form-control-sm" placeholder="Y" value="{{old('datay') ?? $regresi->datay}}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            @csrf
        </form>

    </div>

    <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
        <h4 class="m-3 text-primary"><i class="fa fa-edit"></i> Edit Data</h4>
        <form id="edit-form" action="" method="POST" >
            @method('PATCH')

            <input type="hidden" name="id_regresi" id="id_regresi" class="form-control form-control-sm" value="{{$regresi->id}}">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label col-form-label-lg" for="datax">Data X</label>
                <div class="col-sm-6">
                    <input type="number" name="datax" id="edit-datax" class="form-control form-control-sm" placeholder="X" value="{{old('datax') ?? $regresi->datax}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label col-form-label-lg" for="datay">Data X</label>
                <div class="col-sm-6">
                    <input type="number" name="datay" id="edit-datay" class="form-control form-control-sm" placeholder="Y" value="{{old('datay') ?? $regresi->datay}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

            @csrf
        </form>

    </div>
</div>