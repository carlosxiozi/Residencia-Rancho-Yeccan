<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class trabajador extends  Authenticatable
{
    use Notifiable;
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
