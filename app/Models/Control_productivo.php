<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control_productivo extends Model
{
    public $timestamps=false;
    protected $fillable= ['animal_id','evento_id'];
    protected $table = 'controles_productivos';
    use HasFactory;
    
}

