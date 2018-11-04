<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiquetes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_user')->nullable();
            $table->string('pa_user')->nullable();
            $table->integer('id_user')->nullable();
            $table->integer('cel_user')->nullable();
            $table->date('naci_user')->nullable();
            $table->string('mail_user')->nullable();
            $table->string('sede')->nullable();
            $table->string('t_trans')->nullable();
            $table->string('dpto1')->nullable();
            $table->string('ciudad1')->nullable();
            $table->string('dpto2')->nullable();
            $table->string('ciudad2')->nullable();
            $table->string('obs')->nullable();
            $table->integer('estado')->default(0);
            $table->string('path1')->nullable();
            $table->string('path2')->nullable();
            $table->string('path3')->nullable();
            $table->string('nom_ase')->nullable();
            $table->string('id_ase')->nullable();
            $table->timestamps();
            $table->string('res_verifica')->nullable();
            $table->timestamp('date_verifica')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiquetes');
    }
}
