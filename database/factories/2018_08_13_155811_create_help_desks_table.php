<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpDesksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_desks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('nombre')->nullable();
            $table->string('email')->nullable();
            $table->string('cargo')->nullable();
            $table->string('sede')->nullable();
            $table->string('requerimiento')->nullable();
            $table->string('area')->nullable();
            $table->string('subarea')->nullable();
            $table->string('categoria')->nullable();
            $table->string('asunto')->nullable();
            $table->string('archivo');
            $table->integer('admin');
            $table->text('descripcion')->nullable(); 
            $table->timestamps(); 
            $table->text('respuesta')->nullable();  
            $table->date('f_respuesta')->nullable();            
            $table->integer('estado')->default(0);
            $table->integer('asignado_a')->default(0);
            $table->string('nombre_asig')->nullable();
            $table->date('f_asignado')->nullable();
            $table->text('res_aprobado')->nullable();
            $table->string('aprobado')->nullable();
            $table->timestamp('f_aprobado')->nullable();
            $table->integer('tiempo')->nullable();
            $table->string('u_tiempo')->nullable();
            $table->timestamp('f_aproxsolu')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_desks');
    }
}
