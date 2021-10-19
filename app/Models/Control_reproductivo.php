<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control_reproductivo extends Model
{
    public $timestamps=false;
    protected $fillable= ['expediente','fecha_de_servicio','fecha_de_parto','animal_id'];
    protected $table = 'controles_reproductivos';
    use HasFactory;
    use HasFactory;
}
