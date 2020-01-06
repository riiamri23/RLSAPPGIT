<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegresiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regresi_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_regresi');
            $table->decimal('datax', 8,2);
            $table->decimal('datay', 8,2);

            $table->foreign('id_regresi')->references('id')->on('regresis');
            
        });
        
        DB::table('regresi_details')->insert(
            array(
                array(
                    'id_regresi'=>'1',
                    'datax'=>'2',
                    'datay'=>'50',
                ),
                array(
                    'id_regresi'=>'1',
                    'datax'=>'3',
                    'datay'=>'60',
                ),
                array(
                    'id_regresi'=>'1',
                    'datax'=>'1',
                    'datay'=>'30',
                ),
                array(
                    'id_regresi'=>'1',
                    'datax'=>'4',
                    'datay'=>'70',
                ),
                array(
                    'id_regresi'=>'1',
                    'datax'=>'1',
                    'datay'=>'40',
                ),
                array(
                    'id_regresi'=>'1',
                    'datax'=>'3',
                    'datay'=>'50',
                ),
                array(
                    'id_regresi'=>'1',
                    'datax'=>'2',
                    'datay'=>'40',
                ),
                array(
                    'id_regresi'=>'1',
                    'datax'=>'2',
                    'datay'=>'35',
                )
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
        Schema::dropIfExists('regresi_details');
    }
}
