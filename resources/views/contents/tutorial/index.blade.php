@extends('layouts.app')

@section('content')
    <div class="row m-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <div class="card-title">
                            <span class="text-primary">{{$title}}</span>
                        </div>
                    <div class="row align-items-center">
                        <div class="col-md-4 col-lg-3">
                            <div class="nav flex-column nav-pills"><a href="#v-pills-home" data-toggle="pill" class="nav-link active show">Data Regresi</a> <a href="#v-pills-profile" data-toggle="pill" class="nav-link">Rumus</a> <a href="#v-pills-messages" data-toggle="pill" class="nav-link">Kriteria Pengujian</a>
                            <a href="#v-pills-settings" data-toggle="pill" class="nav-link">F Tabel</a>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div id="v-pills-home" class="tab-pane fade active show">
                                    <div class="p-t-15">
                                        <h4>Data yang perlu diisi</h4>
                                        <p>Untuk menambah bisa mengklik link berikut <a href="{{route('regresi.create')}}" class="text-primary">tambah data</a><br>Ada beberapa data yang perlu diisi pada form tambah dan edit diantaranya:
                                            <ul >
                                                <li><i class="fa fa-check"></i> Nama kasus</li>
                                                <li><i class="fa fa-check"></i> Alpha</li>
                                                <li><i class="fa fa-check"></i> Variabel X dan Y</li> 
                                                <li><i class="fa fa-check"></i> Hipotesis Nol dan Alternatif</li>
                                                <li><i class="fa fa-check"></i> Detail data regresi (yang terdapat pada tampilan show data regresi)</li>
                                            </ul>
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="p-t-15">
                                        <h4>Fitur yang ada pada regresi</h4>
                                        <p>
                                                <ul >
                                                    <li><i class="fa fa-check"></i> List</li>
                                                    <li><i class="fa fa-check"></i> Form Tambah dan Edit</li>
                                                    <li><i class="fa fa-check"></i> Lihat</li> 
                                                    <li><i class="fa fa-check"></i> Perhitungan</li>
                                                </ul>
                                        </p>
                                    </div>
                                </div>
                                <div id="v-pills-profile" class="tab-pane fade">
                                    
                                    <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Rumus Tab</h4>
                                                    <ul class="nav nav-pills mb-3">
                                                        <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Linieritas</a>
                                                        </li>
                                                        <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Signifikansi</a>
                                                        </li>
                                                        <li class="nav-item"><a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Prediksi</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content br-n pn">
                                                        <div id="navpills-1" class="tab-pane active">
                                                            <h5 class="mb-2">Linieritas digunakan untuk menentukan apakah model dari perhitungan tersebut linier atau tidak. Berikut ada beberapa rumus penting yang perlu diketahui.</h5>
                                                            <div class="row">
                                                                <div class="card col-sm-6 mb-3">
                                                                    <div class="card-body">

                                                                        <p>\[ JK_{E} = \sum_{k} \{\sum{Y^2} - {(\sum{Y})^2 \over n}\}\] 
                                                                            </p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 mb-3">
                                                                    <h5>Keterangan : </h5>
                                                                    <p>adalah digunakan untuk mencari Kuadrat <em>Error</em> (Kesalahan) <br>
                                                                    Sebelum menghitung ini. urutkan data X mulai dari data yang paling kecil sampai data yang paling besar berikut disertai pasangannya, seperti pada tabel contoh.</p>
                                                                    
                                                                    <button type="button" id="contohJKe" class="btn btn-info" rel="popover" data-placement="top" data-original-title="Contoh tabel kelompok" data-trigger="hover" >Lihat Contoh</button>
                                                                </div>
                                                                
                                                                <div class="card col-sm-6 mb-3">
                                                                    <div class="card-body">

                                                                        <p>\[ F_{tabel} = F_{(1 - \alpha)(df_{1} = k-2,  df_{2} = n-k) }\] </p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 mb-3">
                                                                    <h5>Keterangan: </h5>
                                                                    <p>Berikut adalah rumus untuk mencari F Tabel, cara menentukan:
                                                                    <ul>
                                                                        <li>- Tentukan Alpha</li>
                                                                        <li>- Cari Baris di F tabel menggunakan df1</li>
                                                                        <li>- Cari Kolom di F tabel menggunakan df2</li>
                                                                    </ul>
                                                                        
                                                                    <button type="button" id="TabelF" class="btn btn-info" rel="popover" data-placement="top" data-original-title="Contoh Mencari Nilai Tabel F" data-trigger="hover" >Lihat Contoh</button>
                                                                    </p>
                                                                </div>
                                                                    
                                                            </div>

                                                        </div>
                                                        <div id="navpills-2" class="tab-pane">
                                                            <div class="row align-items-center">

                                                                <h5 class="mb-2">Signifikansi digunakan untuk mengetahui pengaruh antara kedua variabel.</h5>
                                                                <div class="row">
                                                                <div class="card col-sm-6 mb-3">
                                                                        <div class="card-body">
    
                                                                            <p>\[ F_{tabel} = F_{(1 - \alpha)(df_{1} = 1, df_{2} = n-2)} \] </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-3">
                                                                        <h5>Keterangan: </h5>
                                                                        <p>Berikut adalah rumus untuk mencari F Tabel untuk signifikansi <strong>Berbeda rumus dengan linieritas</strong>, cara menentukan:
                                                                        <ul>
                                                                            <li>- Tentukan Alpha</li>
                                                                            <li>- Cari Baris di F tabel menggunakan df1 (Karna Regresi linier sederhana yang hanya mempunyai variabel bebas 1 maka df1 = 1)</li>
                                                                            <li>- Cari Kolom di F tabel menggunakan df2</li>
                                                                        </ul>
                                                                            
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="navpills-3" class="tab-pane">
                                                            <div class="row align-items-center">
                                                                <div class="col-sm-12">
                                                                    <h5>
                                                                        Prediksi digunakan untuk menentukan persamaan regresi. Berikut persamaan regresi (prediksi) yang perlu diketahui.
                                                                    </h5>
                                                                    
                                                                    
                                                                    <div class="row">
                                                                        <div class="card col-sm-6 mb-3">
                                                                            <div class="card-body">
        
                                                                                <p>\[ \hat{Y} = a +bX \] </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 mb-3">
                                                                            <h5>Keterangan : </h5>
                                                                            <p>
                                                                                \( \hat{Y}  \) = (baca Y topi), subjek variabel terikat yang diproyeksikan.
                                                                            </p>
                                                                            <p>
                                                                                \( X  \) = variabel bebas yang mempunyai nilai tertentu untuk diprediksikan.
                                                                            </p>
                                                                            <p>
                                                                               \( a  \) = Nilai konstanta harga Y jika X = 0.
                                                                            </p>
                                                                            <p>
                                                                                \( b \) = Nilai arah sebagai penentu ramalan (prediksi) yang menunjukkan nilai peningkatan (+) atau nilai penurunan (-) variabel Y. 
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div id="v-pills-messages" class="tab-pane fade">
                                    <p>Perlu diketahui bahwa uji linieritas ini berbeda dengan uji signifikansi, adapun perbedaannya terletak pada pengambilan keputusan, yaitu: </p>

                                    <p>Kaidah Pengujian Signifikansi:<br>
                                        Jika \( F_{Sign(hitung)} \geq  F_{Sign(tabel)} \), maka terima \( H_{a} \) berarti <strong>Signifikan</strong><br>
                                        Jika \( F_{Sign(hitung)} \lt  F_{Sign(tabel)} \), maka terima \( H_{0} \) berarti <strong>Tidak Signifikan</strong><br>
                                        Untuk mencari F tabel Signifikansi \( F_{tabel} = F_{(1-\alpha)(df_{1} = 1, df_{2} = n - 2)}  \)
                                    </p>
                                    <p>Kaidah Pengujian Uji Linieritas:<br>
                                        Jika \( F_{Linier(hitung)} \leq  F_{Linier(tabel)} \), maka terima \( H_{0} \) berarti <strong>Linier</strong><br>
                                        Jika \( F_{Linier(hitung)} \gt  F_{Linier(tabel)} \), maka terima \( H_{a} \) berarti <strong>Tidak Linier</strong><br>
                                        Untuk mencari F tabel Linieritas \( F_{tabel} = F_{(1 - \alpha)(df_{1} = k-2, df_{2} = n-k) } \)
                                    </p>
                                </div>
                                <div id="v-pills-settings" class="tab-pane fade">
                                    <h4>Tabel F 15x90</h4>
                                    <div class="form-group row">
                                        <label for="alpha" class="col-sm-4 col-form-label col-form-label-lg">Alpha</label>
                                        <div class="col-sm-6">
                                            <select id="alpha" name="alpha" class="form-control  form-control-sm">
                                                @foreach ($alpha as $item)
                                                <option value="{{$item->id}}" {{$item->nilai==0.05?'selected':''}}>{{$item->nilai}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-lg" for="df1">Pembilang</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="df1" id="df1" class="form-control form-control-sm" placeholder="nilai pembilang" value="">
                                            <span class="text-warning">Nilai maksimal pembilang <strong>15</strong></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label col-form-label-lg" for="df2">Penyebut</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="df2" id="df2" class="form-control form-control-sm" placeholder="nilai penyebut" >
                                            <span class="text-warning">Nilai maksimal penyebut <strong>90</strong></span>
                                        </div>
                                    </div>
                                    
                                    <button id="cariNilai" class="btn btn-primary"><i class="fa fa-search"></i> Cari Nilai F Tabel</button>
                                    <h5 class="mt-3" id="text-hasil">Hasil Pencarian Nilai Tabel F: </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection