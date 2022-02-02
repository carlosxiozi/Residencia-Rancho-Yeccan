<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Animal extends Model
{
    public $timestamps=false;

protected $fillable= ['nombre','fecha_de_nacimiento','padre','arete','peso_al_nacer','peso_al_destete','madre','sexo','imagen','num_parto'];
protected $table = 'animales';

    use HasFactory;
    public function eventos(){
        return $this->belongsToMany('App\Models\Evento')->withPivot('animal_id','id');
    }
    public function control_reproductivo(){
        return $this->hasMany('App\Models\Control_reproductivo');
        
    }
}
