<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Animal extends Model
{
    public $timestamps=false;

protected $fillable= ['nombre','fecha_de_nacimiento','padre','sexo','arete','peso_al_nacer','peso_al_destete','madre','clasificacion','imagen'];
protected $table = 'animales';

    use HasFactory;
}
