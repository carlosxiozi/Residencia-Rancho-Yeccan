<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->date('fecha_de_nacimiento');
            $table->string('padre', 45);
            $table->string('arete', 45);
            $table->double('peso_al_nacer', 45);
            $table->double('peso_al_destete', 45);
            $table->string('madre', 45);
            $table->enum('sexo',["Macho","Hembra"]);
            $table->string('imagen', 1000)->nullable();
            $table->integer('num_parto');
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
        Schema::dropIfExists('animales');
    }
}
