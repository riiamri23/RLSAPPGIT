<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlphasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alphas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('nilai', 8, 2);
        });
        DB::table('alphas')->insert(
            array(
                array(
                    'nilai'=>'0.05'
                ),array(
                    'nilai'=>'0.01'
                ),array(
                    'nilai'=>'0.10'
                ),array(
                    'nilai'=>'0.25'
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
        Schema::dropIfExists('alphas');
    }
}
