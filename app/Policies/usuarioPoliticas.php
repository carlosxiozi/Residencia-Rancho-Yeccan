<?php

namespace App\Policies;

use App\Models\trabajador;
use Illuminate\Auth\Access\HandlesAuthorization;

class usuarioPoliticas
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(trabajador $trabajador)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\trabajador  $trabajador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(trabajador $trabajador)
    {
        if($trabajador->rol == "Veterinario" || $trabajador->rol == "Trabajador") return false;
        elseif($trabajador->rol == "Jefe") return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(trabajador $trabajador)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\trabajador  $trabajador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(trabajador $trabajador)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\trabajador  $trabajador
     * @return \Illuminate\Auth\Access\Response|bool
     */
   
}
