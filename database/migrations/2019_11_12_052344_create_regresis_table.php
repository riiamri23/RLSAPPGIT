<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegresisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('regresis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kasus');
            $table->string('labelx');
            $table->string('labely');
            $table->string('h0');
            $table->string('h1');
            $table->unsignedInteger('id_alpha');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
            
            $table->foreign('id_alpha')->references('id')->on('alphas');
            $table->foreign('id_user')->references('id')->on('users');
        });

        DB::table('regresis')->insert(
            array(
                'nama_kasus'=>'Pengalaman Kerja',
                'labelx'=>'Pengalaman Kerja',
                'labely'=>'Penjualan Barang',
                'h0'=>'Tidak terdapat pengaruh yang signifikan antara pengalaman kerja terhadap penjualan barang',
                'h1'=>'Terdapat pengaruh yang signifikan antara pengalaman kerja terhadap penjualan barang',
                'id_alpha'=>'1',
                'id_user'=>'1'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regresis');
    }
}
