<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\trabajador;
use Illuminate\Auth\Access\HandlesAuthorization;

class eventoPolitica
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
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(trabajador $trabajador, Evento $evento)
    {
        //
    }
    public function editeve(trabajador $trabajador, Evento $evento){

        if($trabajador->rol == "Veterinario" || $trabajador->rol == "Jefe") return true;
        elseif($trabajador->rol == "Trabajador") return false;

    }
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createE(trabajador $trabajador)
    {
        if($trabajador->rol == "Veterinario" || $trabajador->rol == "Jefe") return true;
        elseif($trabajador->rol == "Trabajador") return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(trabajador $trabajador, Evento $evento)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteeve(trabajador $trabajador, Evento $evento)
    {
        if($trabajador->rol == "Veterinario" ||  $trabajador->rol == "Trabajador") return false;
        elseif( $trabajador->rol == "Jefe") return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(trabajador $trabajador, Evento $evento)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(trabajador $trabajador, Evento $evento)
    {
        //
    }
}
