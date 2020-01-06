<p>1) \( H_{a} \) dan \( H_{0} \) dalam bentuk kalimat:<br>
    <span class="ml-3">\( H_{a} \) : {{$regresi->h1}}</span><br>
    <span class="ml-3">\( H_{0} \) : {{$regresi->h0}}</span><br>
</p>
<p>2) \( H_{a} \) dan \( H_{0} \) dalam bentuk statistik:<br>
    <span class="ml-3">\( H_{a} \) : r \( \ne \) 0</span><br>
    <span class="ml-3">\( H_{0} \) : r = 0</span>
</p>

<p>3) Tabel penolong menghitung angka statistik
</p>
<a class="btn btn-primary" data-toggle="collapse" href="#collapseTabel" role="button" aria-expanded="false" aria-controls="collapseTabel">Lihat Tabel Penolong</a>
<div class="collapse multi-collapse" id="collapseTabel">
    <div class="card card-body">
        
        <div class="table-responsive">
            <table class="table table-bordered verticle-middle">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">\[ X \]</th>
                        <th scope="col">\[ Y \]</th>
                        <th scope="col">\[ X^2 \]</th>
                        <th scope="col">\[ Y^2 \]</th>
                        <th scope="col"> \[ XY \]</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->datax}}</td>
                        <td>{{$item->datay}}</td>
                        <td>{{$item->powX2()}}</td>
                        <td>{{$item->powY2()}}</td>
                        <td>{{$item->XY()}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>\[ n \]</th>
                        <th>\[ \sum{X} \]</th>
                        <th>\[ \sum{Y} \]</th>
                        <th>\[ \sum{X^2} \]</th>
                        <th>\[ \sum{Y^2} \]</th>
                        <th>\[ \sum{XY} \]</th>
                    </tr>
                    <tr align="center">
                        <th>{{$regresi->countDetail()}}</th>
                        <th>{{$regresi->countX()}}</th>
                        <th>{{$regresi->countY()}}</th>
                        <th>{{$regresi->countPowX2()}}</th>
                        <th>{{$regresi->countPowY2()}}</th>
                        <th>{{$regresi->countXY()}}</th>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>
<p>4) Masukkan angka statistik dan buat persamaan regresi<br>
    <span class="ml-3">(a) Menghitung b<br>
        \( b = {n . \sum{XY} - \sum{X} . \sum{Y} \over n . \sum{X^2} - (\sum{X})^2} = {{$regresi->prediksiB()}} \)     
    </span><br>
    <span class="ml-3">(b) Menghitung a<br>
        \( a = {\sum{Y} - b . \sum{X} \over n } = {{$regresi->konstantaA()}} \)
    </span><br>
    <span class="ml-3">(c) Persamaan regresi sederhana<br>
        \( \hat{Y} = a +b(X) = {{$regresi->konstantaA()}} + {{$regresi->prediksiB()}}(X) \)
    </span><br>
</p>
<a class="btn btn-primary" data-toggle="collapse" href="#collapseGrafik" role="button" aria-expanded="false" aria-controls="collapseGrafik">Lihat Grafik</a>
<div class="collapse multi-collapse" id="collapseGrafik">
    <div class="card card-body">
        <div id="container" style="width: 600px;height:400px;"></div>
    </div>
</div>

<div class="row align-items-center mt-3">
    <div class="col-md-4 col-lg-3">
        <div class="nav flex-column nav-pills">
            
            <a href="#v-pills-linieritas" data-toggle="pill" class="nav-link active show">Linieritas</a> 
            <a href="#v-pills-signifikansi" data-toggle="pill" class="nav-link">Signifikansi</a> 
            <a href="#v-pills-prediksi" data-toggle="pill" class="nav-link">Prediksi</a>
        </div>
    </div>
    <div class="col-md-8 col-lg-9">
        <div class="tab-content">
            <div id="v-pills-linieritas" class="tab-pane fade active show">
                <h4 class="text-secondary m-2">Linieritas</h4>
                <p>1) Menghitung jumlah Kuadrat Error (kesalahan) \( JK_{E} \)<br>
                    <span class="ml-3">Sebelum menghitung \( JK_{E} \), urutkan data X mulai dari data yang paling kecil sampai data yang paling besar disertai pasangannya.</span>
                </p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseTblJke" role="button" aria-expanded="false" aria-controls="collapseTblJke">Lihat Tabel Kelompok</a>
                <div class="collapse multi-collapse" id="collapseTblJke">
                    <div class="card card-body">
                            <div align="middle">
                                <caption>Tabel Kelompok</caption>
                                <table class="table col-4">
                                    <thead>
                                        <th>X</th>
                                        <th>k</th>
                                        <th>Y</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $datax = 0;
                                            $k = 0;
                                        @endphp
                                        @foreach ($detailOrder as $item)
                                        <tr>
                                            <td>{{$item->datax}}</td>
                                            <td>
                                                @if ($item->datax != $datax)
                                                    @php
                                                        $k++;   
                                                    @endphp
                                                    k{{$k}}
                                                @endif
                                            </td>
                                            <td>{{$item->datay}}</td>
                                            @php
                                                $datax = $item->datax;
                                            @endphp
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <caption>Total n = {{$regresi->countDetail()}}, k = {{$k}}</caption>
                            </div>
                    </div>
                </div>
                <p>\( JK_{E} = \sum_{k} 
                        \{ \sum{Y^2} - {(\sum{Y})^2 \over n} \} = {{$regresi->linierJKe()}} \)</p>
                <p>2) Hitung Jumlah Kuadrat Tuna Cocok \( JK_{TC} \) <br>
                <span>\( JK_{TC} = JK_{Res} - JK_{E} = {{$regresi->linierJKtc()}} \)</span></p>
                <p>3) Hitung Rata-rata Jumlah Kuadrat Tuna Cocok \( RJK_{TC} \) <br> \( RJK_{TC} = {JK_{TC} \over k - 2 } = {{$regresi->linierRJKtc()}} \)</p>
                <p>4) Hitung Rata-rata Jumalh Kuadrat Error \( RJK_{E} \) <br>
                \( RJK_{E} = {JK_{E} \over n - k} = {{$regresi->linierRJKe()}} \)
                </p>
                <p>5) Hitung \( F_{hitung} \) <br>
                \( F_{hitung} = {RJK_{TC} \over RJK_{E}} = {{$regresi->linierF()}} \)</p>
                <p>6) Mencari nilai \( F_{tabel} \) <br>
                    \( F_{tabel} = F_{(1 - \alpha)(df_{1} = k-2, df_{2} = n-k) }  \\ = F_{({{1 - $regresi->alpha->nilai}})(df_{1} = {{$regresi->linierK()-2}}, df_{2} = {{$regresi->countDetail()-$regresi->linierK()}}) } = {{$regresi->tabelF()}} \)
                </p>
                <p>7) Perbandingan dan kesimpulan</p>
                @if ($regresi->linierSimpulan())
                    <p>Kesimpulan : Karna \( F_{hitung} \leq F_{tabel} \), atau <strong>{{$regresi->linierF()}}</strong> Lebih kecil atau sama dengan <strong>{{$regresi->tabelF()}}</strong>, maka <strong>terima H0</strong> yang berarti <strong>LINIER</strong> Dengan demikian metode regresi Y atas X adalah <strong>LINIER</strong>
                    </p>
                @else
                
                    <p>Kesimpulan : Karna \( F_{hitung} \gt F_{tabel} \), atau <strong>{{$regresi->linierF()}}</strong> Lebih besar <strong>{{$regresi->tabelF()}}</strong>, maka <strong>terima H1</strong> yang berarti <strong>TIDAK LINIER</strong><br>
                    Dengan demikian metode regresi Y atas X adalah  <strong>TIDAK  LINIER</strong>
                    </p>
                    
                @endif
            </div>
            <div id="v-pills-signifikansi" class="tab-pane fade">
                
                <h4 class="text-success m-2">Signifikansi</h4>

                <p>1) Hitung Jumlah Kuadrat Regresi (a) \( JK_{Reg(a)} \) <br>
                    \( JK_{Reg(a)} = {\sum{Y}^2 \over n} = {{$regresi->sigRJKa()}} \)
                </p>
                <p>2) Hitung Jumlah Kuadrat (b|a) \( JK_{Reg(b|a)} \)<br>
                    \( JK_{Reg(b|a)} = {b . (\sum{XY} - {\sum{X} . \sum{Y} \over n })} = {{$regresi->sigRJKb()}} \)
                </p>
                <p>3) Hitung jumlah Kuadrat Residu \( JK_{Res} \)<br>
                    \( JK_{Res} = \sum{Y}^2 - JK_{Reg(b|a)} - JK_{Reg(a)} = {{$regresi->sigJKres()}} \)
                </p>
                <p>4) Hitung Rata-rata Jumlah Kuadrat Regresi (a) \( RJK_{Reg(a)} \)<br>
                    \(  RJK_{Reg(a)} = JK_{Reg(a)} = {{$regresi->sigRJKa()}} \)
                </p>
                <p>5) Hitung Rata-rata Jumlah Kuadrat Regresi (b|a) \( RJK_{Reg(b|a)} \)<br>
                    \( RJK_{Reg(b|a)} = JK_{Reg(b|a)} = {{$regresi->sigRJKb()}} \)
                </p>
                <p>6) Hitung Rata-rata Jumlah Kuadrat Residu \( RJK_{Res} \)<br>
                    \( RJK_{Res} = {JK_{Res} \over n - 2} = {{$regresi->sigRJKres()}} \)
                </p>
                <p>7) Hitung \( F_{hitung} \)<br>
                    \( F_{hitung} = {RJK_{reg(b|a)} \over RJK_{Res} } = {{$regresi->sigF()}} \)
                </p>
                <p>8) Mencari nilai \( F_{tabel} \)<br>
                    \( F_{tabel} =  F_{(1-\alpha)(df_{1} = 1, df_{2} = n - 2)} \\= F_{({{1 - $regresi->alpha->nilai}})(df_{1} = 1, df_{2} = {{$regresi->countDetail()-2}})} = {{$regresi->sigFTabel()}} \)
                </p>
                <p>9) Perbandingan dan kesimpulan</p>
                @if($regresi->sigSimpulan())
                    <p>Kesimpulan : Karna \( F_{hitung} \geq F_{tabel} \), atau {{$regresi->sigF()}} lebih besar atau sama dengan dari {{$regresi->sigFTabel()}} maka <strong>H1 diterima</strong>. Dengan demikian terdapat pengaruh yang signifikan antara <strong>{{$regresi->labelx}}</strong> terhadap <strong>{{$regresi->labely}}</strong>, dengan nilai {{$regresi->prediksiB() > 0 ?'Peningkatan':'Penurunan'}} adalah <strong>{{$regresi->prediksiB()}}</strong></p>
                    <p>Hipotesis yang diterima (H1) : <strong>{{$regresi->h1}}</strong></p>
                @else
                    <p>Kesimpulan : Karna \( F_{hitung} \lt F_{tabel} \), atau {{$regresi->sigF()}} lebih kecil dari {{$regresi->sigFTabel()}} maka <strong>H0 diterima</strong>. Dengan demikian tidak terdapat pengaruh yang signifikan antara <strong>{{$regresi->labelx}}</strong> terhadap <strong>{{$regresi->labely}}</strong>, dengan nilai {{$regresi->prediksiB() > 0 ?'Peningkatan':'Penurunan'}} adalah <strong>{{$regresi->prediksiB()}}</strong></p>
                    <p>Hipotesis yang diterima (H0) : <strong>{{$regresi->h0}}</strong></p>
                @endif
            </div>
            <div id="v-pills-prediksi" class="tab-pane fade">
                <h4 class="text-primary m-2">Prediksi</h4>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label col-form-label-lg" for="nilaix">Data X</label>
                    <div class="col-sm-4">
                        <input type="number" id="nilaix" class="form-control form-control-sm" placeholder="X" value="" data-a="{{$regresi->konstantaA()}}" data-b="{{$regresi->prediksiB()}}">
                    </div>
                </div>
                
                <p align="center">Persamaan Regresi</p>
                <p>\[ \hat{Y} = a +bX \]<span id="hasily">\[ \]</span></p>
            </div>
        </div>
    </div>
</div>