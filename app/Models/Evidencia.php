<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function evidencia()
    {
        return $this->belongsTo(trabajador::class);
    }
}
