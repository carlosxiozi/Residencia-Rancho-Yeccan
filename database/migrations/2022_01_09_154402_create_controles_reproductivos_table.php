<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlesReproductivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles_reproductivos', function (Blueprint $table) {
            $table->id();
            $table->longtext('expediente')->nullable();
            $table->date('fecha_de_servicio');
            $table->date('fecha_de_parto');
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')
                    ->references('id')->on('animales')->onDelete('cascade');
            $table->integer('estado_animal')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controles_reproductivos');
    }
}
