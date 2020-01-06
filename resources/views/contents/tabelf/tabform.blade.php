                        
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
            <form action="{{route('tabelf.store')}}" method="POST" >
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-lg" for="alpha">Alpha</label>
                    <div class="col-sm-6">
                        <select id="alpha" name="id_alpha" class="form-control">
                            @foreach ($alpha as $item)
                                <option value="{{$item->id}}" {{1 == $item->id ? 'selected': '' }}>{{$item->nilai}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('alpha')}}</span>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-lg" for="pembilang">Pembilang</label>
                    <div class="col-sm-6">
                        <input type="text" name="pembilang" id="pembilang" class="form-control form-control-sm" placeholder="Pembilang" value="{{old('pembilang') ?? '1'}}">
                        <span class="text-danger">{{ $errors->first('pembilang')}}</span>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-lg" for="penyebut">Penyebut</label>
                    <div class="col-sm-6">
                        <input type="text" name="penyebut" id="penyebut" class="form-control form-control-sm" placeholder="Penyebut" value="{{old('penyebut')}} ">
                        <span class="text-danger">{{ $errors->first('penyebut')}}</span>
                    </div>
                </div>
                
                <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-lg" for="nilai">Nilai</label>
                        <div class="col-sm-6">
                            <input type="text" name="nilai" id="nilai" class="form-control form-control-sm" placeholder="Nilai" value="{{old('nilai')}}">
                            <span class="text-danger">{{ $errors->first('nilai')}}</span>
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
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-lg" for="edit-alpha">Alpha</label>
                    <div class="col-sm-6">
                        <select id="edit-alpha" name="id_alpha" class="form-control">
                            @foreach ($alpha as $item)
                                <option value="{{$item->id}}" {{1 == $item->id ? 'selected': '' }}>{{$item->nilai}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('alpha')}}</span>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-lg" for="pembilang">Pembilang</label>
                    <div class="col-sm-6">
                        <input type="text" name="pembilang" id="edit-pembilang" class="form-control form-control-sm" placeholder="Pembilang" value="{{old('pembilang') ?? '1'}}">
                        <span class="text-danger">{{ $errors->first('pembilang')}}</span>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label col-form-label-lg" for="penyebut">Penyebut</label>
                    <div class="col-sm-6">
                        <input type="text" name="penyebut" id="edit-penyebut" class="form-control form-control-sm" placeholder="Penyebut" value="{{old('penyebut')}} ">
                        <span class="text-danger">{{ $errors->first('penyebut')}}</span>
                    </div>
                </div>
                
                <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-lg" for="nilai">Nilai</label>
                        <div class="col-sm-6">
                            <input type="text" name="nilai" id="edit-nilai" class="form-control form-control-sm" placeholder="Nilai" value="{{old('nilai')}}">
                            <span class="text-danger">{{ $errors->first('nilai')}}</span>
                        </div>
                    </div>
                
    
                <button type="submit" class="btn btn-primary">Submit</button>
    
                @csrf
            </form>
    
        </div>
    </div>