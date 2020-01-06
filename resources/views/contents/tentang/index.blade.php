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
                    <div class="row text-center">
                        <div class="col-12">
                            
                            <img src="{{URL::asset('assets/images/Ump-logo.png')}}" width="250" alt="Logo Universitas">
                            <h1>Universitas Muhammadiyah Purwokerto</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Pengantar</h4>
                            <p>
                                Aplikasi Uji Regresi Linier Sederhana, Aplikasi ini dibuat sebagai persyaratan kelulusan pendidikan S1-Teknik Informatika Universitas Muhammadiyah Purwokerto.

                                Aplikasi ini dikembangkan di Lab Informatika Universitas Muhammadiyah Purwokerto dengan menggunakan software seperti XAMPP, Visual Studio Code dan dengan database Mysql.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>@</h4>
                            <p>
                                Teknik Informatika Universitas Muhammadiyah Purwokerto<br>
                                Syaeful Amri<br>
                                Hindayati Mustafidah, S.Si., M.Kom (pembimbing)
                            </p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Sumber Daya Aplikasi</h4>
                                <ul>
                                    <li><h6>Referensi Buku :</h6>
                                    Riduwan, & Sunarto. (2014). Pengantar STATISTIKA untuk PENELITIAN: PENDIDIKAN, SOSIAL, KOMUNIKASI, EKONOMI, DAN BISNIS. Bandung: ALFABETA.<br></li>
                                    <li><h6>Template Web :</h6>
                                    <a href="https://quixlab.com/" class="text-info">Quixlab</a></li>
                                    <li><h6>Sumber Daya Lain :</h6>
                                    <a href="https://laravel.com/" class="text-info">Laravel</a> (Framework PHP untuk membuat website)
                                    </li>
                                    <li><a href="https://www.mathjax.org/" class="text-info">MathJax</a> (Library Javascript untuk membuat <em>Equation</em> pada website)</li>
                                    <li><a href="https://www.echartsjs.com/en/index.html" class="text-info">Echartjs</a> (Library Javascript untuk membuat Diagram Scalar</li>
                                </ul>
                        </div>
                    </div>

                    
                </div>
            </div>
            <!-- /# card -->
        </div>
    </div>
@endsection