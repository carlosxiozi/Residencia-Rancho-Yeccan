<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->id();
            $table->string('imagen', 1000)->nullable();
            $table->string('comentarios', 1000);
            $table->date('fecha_evidencia');
            $table->time('hora_evidencia');
            $table->string('nombre', 100);
            $table->unsignedBigInteger('trabajador_id');
            $table->foreign('trabajador_id')
                    ->references('id')->on('trabajadors')->onDelete('cascade');
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
        Schema::dropIfExists('evidencias');
    }
}
