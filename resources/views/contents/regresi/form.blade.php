
<div class="form-group">
    <label>Nama Kasus</label>
    <input type="text" name="nama_kasus" class="form-control input-flat" placeholder="Contoh : Pengaruh pengalaman kerja terhadap penjualan barang" value="{{old('nama_kasus') ?? $regresi->nama_kasus}}">
    <span class="text-danger">{{ $errors->first('nama_kasus')}}</span>
</div>
<div class="form-group">
    <label for="alpha">Alpha</label>
    <select id="alpha" name="id_alpha" class="form-control">
        @foreach ($alpha as $item)
        <option value="{{$item->id}}" {{$item->nilai==0.05?'selected':''}}>{{$item->nilai}}</option>
        @endforeach
    </select>
    <span class="text-danger">{{ $errors->first('id_alpha')}}</span>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Variabel X</label>
        <input type="text" class="form-control" id="labelx" name="labelx" placeholder="contoh : Pengalaman Kerja" value="{{old('labelx') ?? $regresi->labelx}}">
        <span class="text-danger">{{ $errors->first('labelx')}}</span>
    </div>
    <div class="form-group col-md-6">
        <label>Variabel Y</label>
        <input type="text" class="form-control" id="labely" name="labely"  placeholder="contoh : Penjualan Barang" value="{{old('labely') ?? $regresi->labely}}">
        <span class="text-danger">{{ $errors->first('labely')}}</span>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="h0" class="ml-4">
            <input type="checkbox" id="edit-h0" class="form-check-input" value="" data-toggle="tooltip" data-placement="top" title="Edit Hipotesis Nol"> 
            Hipotesis Nol</label>
        <textarea class="form-control h-150px" rows="6" name="h0" id="h0" readonly>{{old('h0') ?? $regresi->h0}}</textarea>
        <span class="text-danger">{{ $errors->first('h0')}}</span>
    </div>
    <div class="form-group col-md-6">
        <label for="h1" class="ml-4">
            <input type="checkbox" id="edit-h1" class="form-check-input" value="" data-toggle="tooltip" data-placement="top" title="Edit Hipotesis Alternatif">
            Hipotesis Alternatif </label>
        <textarea class="form-control h-150px" rows="6" name="h1" id="h1" readonly>{{old('h1') ?? $regresi->h1}}</textarea>
        <span class="text-danger">{{ $errors->first('h1')}}</span>
    </div>
</div>