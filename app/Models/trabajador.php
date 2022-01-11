<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class trabajador extends Model
{
    use Notifiable;
    use HasFactory;
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
