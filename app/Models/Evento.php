<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $timestamps=false;
    protected $fillable= ['nombre_evento','fecha_inicial','fecha_final','descripcion','tipo','nota'];
    protected $table = 'eventos';
    use HasFactory;
    public function animales(){
    return $this->belongsToMany('App\Models\Animal')->withPivot('evento_id','id');
    }
}
