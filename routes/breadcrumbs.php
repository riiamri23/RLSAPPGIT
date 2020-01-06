<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

//regresi
Breadcrumbs::for('regresi', function($trail){
    $trail->parent('home');
    $trail->push('Regresi', route('regresi.index'));
});

Breadcrumbs::for('regresi/create', function($trail){
    $trail->parent('regresi');
    $trail->push('Tambah Regresi', route('regresi.create'));
});
Breadcrumbs::for('regresi/show', function($trail, $id){
    $trail->parent('regresi');
    $trail->push('Lihat Regresi', route('regresi.show', ['regresi'=>$id]));
});
Breadcrumbs::for('regresi/edit', function($trail, $id){
    $trail->parent('regresi/show', $id);
    $trail->push('Edit Regresi', route('regresi.edit', ['regresi'=>$id]));
});
//perhitungan
Breadcrumbs::for('perhitungan/show', function($trail, $id){
    $trail->parent('regresi/show', $id);
    $trail->push('Lihat Perhitungan', route('perhitungan.show', ['regresi'=>$id]));
});

// //alpha
// Breadcrumbs::for('alpha', function($trail){
//     $trail->parent('home');
//     $trail->push('Alpha', route('alpha.index'));
// });

// //Tabel F
// Breadcrumbs::for('tabelf', function($trail){
//     $trail->parent('home');
//     $trail->push('Tabel F', route('tabelf.index'));
// });

//analisis data
Breadcrumbs::for('analisisdata', function($trail){
    $trail->parent('home');
    $trail->push('Analisis Data', route('analisisdata.index'));
});

//tutorial
Breadcrumbs::for('tutorial', function($trail){
    $trail->parent('home');
    $trail->push('Tutorial', route('tutorial.index'));
});

//tentang
Breadcrumbs::for('tentang', function($trail){
    $trail->parent('home');
    $trail->push('Tentang', route('tentang.index'));
});