
                    


                    <div id="accordion-one" class="accordion ">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa" aria-hidden="true"></i> Tabel Pembantu</h5>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion-one">
                                <div class="card-body">
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
                        </div>
                        
                        <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseGrafik" aria-expanded="false" aria-controls="collapseGrafik"><i class="fa" aria-hidden="true"></i> Grafik</h5>
                                </div>
                                <div id="collapseGrafik" class="collapse" data-parent="#accordion-one">
                                    <div class="card-body">

                                        <!-- prepare a DOM container with width and height -->
                                        <div id="container" style="width: 600px;height:400px;"></div>
                                    </div>
                                </div>
                            </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa" aria-hidden="true"></i>Regresi Linier Sederhana</h5>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion-one">
                                <div class="card-body">                    


                                <p>\[b = {n . \sum{XY} - \sum{X} . \sum{Y} \over n . \sum{X^2} - (\sum{X})^2} = {{$regresi->prediksiB()}} \]</p>
                                <p>\[ a = {\sum{Y} - b . \sum{X} \over n } = {{$regresi->konstantaA()}} \]</p>
                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="linieritas-tab" data-toggle="tab" href="#linieritas" role="tab" aria-controls="linieritas" aria-selected="false">Linieritas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="signifikansi-tab" data-toggle="tab" href="#signifikansi" role="tab" aria-controls="signifikansi" aria-selected="false">Signifikansi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="prediksi-tab" data-toggle="tab" href="#prediksi" role="tab" aria-controls="add" aria-selected="true">Prediksi</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="linieritas" role="tabpanel" aria-labelledby="linieritas-tab">
                                        <h4 class="text-secondary m-2">Linieritas</h4>
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
                                        <p>\[ JK_{E} = \sum_{k} 
                                            \{
                                                \sum{Y^2} - {(\sum{Y})^2 \over n}
                                            \} = {{$regresi->linierJKe()}} \] 
                                        </p>
                                        <p>\[ JK_{TC} = JK_{Res} - JK_{E} = {{$regresi->linierJKtc()}}\]
                                        </p>
                                        <p>\[ RJK_{TC} = {JK_{TC} \over k - 2 } = {{$regresi->linierRJKtc()}} \]
                                        </p>
                                        <p> \[ RJK_{E} = {JK_{E} \over n - k} = {{$regresi->linierRJKe()}} \]
                                        </p>
                                        <p>\[ F_{linier} = {RJK_{TC} \over RJK_{E}} = {{$regresi->linierF()}} \]
                                        </p>
                                        <p>\[ F_{tabel} = F_{(1 - \alpha)(df_{1} = k-2, df_{2} = n-k) } = F_{({{1 - $regresi->alpha->nilai}})(df_{1} = {{$regresi->linierK()-2}}, df_{2} = {{$regresi->countDetail()-$regresi->linierK()}}) } = {{$regresi->tabelF()}} \]
                                        </p>
                                                
                                        @if ($regresi->linierSimpulan())
                                            <p>Kesimpulan : Karna \( F_{hitung} \leq F_{tabel} \), atau <strong>{{$regresi->linierF()}}</strong> Lebih kecil atau sama dengan dari <strong>{{$regresi->tabelF()}}</strong>, maka <strong>terima H0</strong> yang berarti <strong>LINIER</strong><br>
                                            Dengan demikian metode regresi Y atas X <strong>LINIER</strong>
                                            </p>
                                        @else
                                        
                                            <p>Kesimpulan : Karna \( F_{hitung} \gt F_{tabel} \), atau <strong>{{$regresi->linierF()}}</strong> Lebih besar dari <strong>{{$regresi->tabelF()}}</strong>, maka <strong>terima H1</strong> yang berarti <strong>TIDAK LINIER</strong><br>
                                            Dengan demikian metode regresi Y atas X <strong>TIDAK  LINIER</strong>
                                            </p>
                                            
                                        @endif
                                            
                                    </div>
                                    
                                    <div class="tab-pane fade" id="signifikansi" role="tabpanel" aria-labelledby="signifikansi-tab">
                                        <h4 class="text-success m-2">Signifikansi</h4>
                                        
                                        <p>\[ JK_{Reg(a)} = {\sum{Y}^2 \over n} = {{$regresi->sigRJKa()}} \]</p>
                                        <p>\[ JK_{Reg(b|a)} = {b . (\sum{XY} - {\sum{X} . \sum{Y} \over n })} = {{$regresi->sigRJKb()}} \]</p>
                                        <p>\[ JK_{Res} = \sum{Y}^2 - JK_{Reg(b|a)} - JK_{Reg(a)} = {{$regresi->sigJKres()}} \]</p>
                                        <p>\[ RJK_{Reg(a)} = JK_{Reg(a)} = {{$regresi->sigRJKa()}} \]</p>
                                        <p>\[ RJK_{Reg(b|a)} = JK_{Reg(b|a)} = {{$regresi->sigRJKb()}} \]</p>
                                        <p>\[ RJK_{Res} = {JK_{Res} \over n - 2} = {{$regresi->sigRJKres()}} \]</p>
                                        <p>\[ F_{hitung} = {RJK_{reg(b|a)} \over RJK_{Res} } = {{$regresi->sigF()}} \]</p>
                                        
                                        <p>\[ F_{tabel} =  F_{(1-\alpha)(df_{1} = 1, df_{2} = n - 2)} = F_{({{1 - $regresi->alpha->nilai}})(df_{1} = 1, df_{2} = {{$regresi->countDetail()-2}})} = {{$regresi->sigFTabel()}} \]</p>
                                        
                                        @if($regresi->sigSimpulan())
                                            <p>Kesimpulan : Karna \( F_{hitung} \geq F_{tabel} \), atau {{$regresi->sigF()}} lebih besar atau sama dengan dari {{$regresi->sigFTabel()}} maka <strong>H1 diterima</strong>. Dengan demikian terdapat pengaruh yang signifikan antara <strong>{{$regresi->labelx}}</strong> terhadap <strong>{{$regresi->labely}}</strong>, dengan nilai {{$regresi->prediksiB() > 0 ?'Peningkatan':'Penurunan'}} adalah <strong>{{$regresi->prediksiB()}}</strong></p>
                                            <p>Hipotesis yang diterima (H1) : <strong>{{$regresi->h1}}</strong></p>
                                        @else
                                            <p>Kesimpulan : Karna \( F_{hitung} \lt F_{tabel} \), atau {{$regresi->sigF()}} lebih kecil dari {{$regresi->sigFTabel()}} maka <strong>H0 diterima</strong>. Dengan demikian tidak terdapat pengaruh yang signifikan antara <strong>{{$regresi->labelx}}</strong> terhadap <strong>{{$regresi->labely}}</strong>, dengan nilai {{$regresi->prediksiB() > 0 ?'Peningkatan':'Penurunan'}} adalah <strong>{{$regresi->prediksiB()}}</strong></p>
                                            <p>Hipotesis yang diterima (H0) : <strong>{{$regresi->h0}}</strong></p>
                                        @endif
                                    </div>
                                    
                                    <div class="tab-pane fade" id="prediksi" role="tabpanel" aria-labelledby="prediksi-tab">
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
                    </div>

                </div>