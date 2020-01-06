<p>1) \( H_{a} \) dan \( H_{0} \) dalam bentuk kalimat:<br>
    <span class="ml-3">\( H_{a} \) : {{$regresi->h1}}</span><br>
    <span class="ml-3">\( H_{0} \) : {{$regresi->h0}}</span><br>
</p>
<p>2) \( H_{a} \) dan \( H_{0} \) dalam bentuk statistik:<br>
    <span class="ml-3">\( H_{a} \) : r \( \ne \) 0</span><br>
    <span class="ml-3">\( H_{0} \) : r = 0</span>
</p>
<p>3) tabel penolong menghitung angka statistik
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
                    <div class="table-responsive">
                        
                            <caption>Tabel Ringkasan Anova</caption>
                            <table class="table verticle-middle" >
                                <thead>
                                    <tr>
                                        <th scope="col">Sumber Variasi</th>
                                        <th>Derajat bebas (db)</th>
                                        <th>Jumlah Kuadrat</th>
                                        <th>Rata-rata Jumlah Kuadrat (RJK)</th>
                                        <th> \( F_{hitung} \)</th>
                                        <th>\( F_{tabel} \) </th>
                                    </tr>
                                </thead>
                                <tbody align="middle">
                                    <tr>
                                        <td scope="col">Total</td>
                                        <td>{{($regresi->linierK()-2)+($regresi->countDetail()-$regresi->linierK())}}</td>
                                        <td>{{$regresi->linierJKtc()+$regresi->linierJKe()}}</td>
                                        <td>{{$regresi->linierRJKe()+$regresi->linierRJKtc()}}</td>
                                        <td>{{$regresi->linierF()}}</td>
                                        <td>{{$regresi->tabelF()}}</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">
                                            Tuna Cocok (TC)
                                        </td>
                                        <td>
                                            {{$regresi->linierK()-2}}
                                        </td>
                                        <td>
                                            {{$regresi->linierJKtc()}}
                                        </td>
                                        <td>
                                            {{$regresi->linierRJKtc()}}
                                        </td>
                                        <td colspan="2" rowspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col">Kesalahan (Error)</td>
                                        <td>{{$regresi->countDetail()-$regresi->linierK()}}</td>
                                        <td>{{$regresi->linierJKe()}}</td>
                                        <td>{{$regresi->linierRJKe()}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @if ($regresi->linierSimpulan())
                                <p>Kesimpulan : Karna \( F_{hitung} \leq F_{tabel} \), atau <strong>{{$regresi->linierF()}}</strong> Lebih kecil atau sama dengan <strong>{{$regresi->tabelF()}}</strong>, maka <strong>terima H0</strong> yang berarti <strong>LINIER</strong> Dengan demikian metode regresi Y atas X adalah <strong>LINIER</strong>
                                </p>
                            @else
                            
                                <p>Kesimpulan : Karna \( F_{hitung} \gt F_{tabel} \), atau <strong>{{$regresi->linierF()}}</strong> Lebih besar <strong>{{$regresi->tabelF()}}</strong>, maka <strong>terima H1</strong> yang berarti <strong>TIDAK LINIER</strong><br>
                                Dengan demikian metode regresi Y atas X adalah  <strong>TIDAK  LINIER</strong>
                                </p>
                                
                            @endif
                        </div>
                </div>
                <div id="v-pills-signifikansi" class="tab-pane fade">
                    
                    <h4 class="text-success m-2">Signifikansi</h4>
                    <caption>Tabel Ringkasan Anova</caption>
                    <table class="table verticle-middle" >
                        <thead>
                            <tr>
                                <th scope="col">Sumber Variasi</th>
                                <th>Derajat bebas (db)</th>
                                <th>Jumlah Kuadrat</th>
                                <th>Rata-rata Jumlah Kuadrat (RJK)</th>
                                <th> \( F_{hitung} \)</th>
                                <th>\( F_{tabel} \) </th>
                            </tr>
                        </thead>
                        <tbody align="middle">
                            <tr>
                                <td scope="col">Total</td>
                                <td>{{$regresi->countDetail()}}</td>
                                <td>{{$regresi->sigRJKa()+$regresi->sigRJKb()+$regresi->sigJKres()}}</td>
                                <td>{{$regresi->sigRJKa()+$regresi->sigRJKb()+$regresi->sigJKres()}}</td>
                                <td>{{$regresi->sigF()}}</td>
                                <td>{{$regresi->sigFTabel()}}</td>
                            </tr>
                            <tr>
                                <td scope="col">
                                    Regresi (a)
                                </td>
                                <td>
                                    1
                                </td>
                                <td>
                                    {{$regresi->sigRJKa()}}
                                <td>
                                    {{$regresi->sigRJKa()}}
                                </td>
                                <td colspan="2" rowspan="3">
                                </td>
                            </tr>
                            <tr>
                                <td scope="col">Regresi (b|a)</td>
                                <td>1</td>
                                <td>{{$regresi->sigRJKb()}}</td>
                                <td>{{$regresi->sigRJKb()}}</td>
                            </tr>
                            <tr>
                                <td scope="col">Residu</td>
                                <td>{{$regresi->countDetail()-2}}</td>
                                <td>{{$regresi->sigJKres()}}</td>
                                <td>{{$regresi->sigJKres()}}</td>
                            </tr>
                        </tbody>
                    </table>
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