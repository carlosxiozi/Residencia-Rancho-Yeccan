<?php

namespace App\Policies;

use App\Models\Evidencia;
use App\Models\trabajador;
use Illuminate\Auth\Access\HandlesAuthorization;

class evidenciaPolitica
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
     * @param  \App\Models\Evidencia  $evidencia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(trabajador $trabajador, Evidencia $evidencia)
    {
        //
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
     * @param  \App\Models\Evidencia  $evidencia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(trabajador $trabajador, Evidencia $evidencia)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Evidencia  $evidencia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteEvi(trabajador $trabajador, Evidencia $evidencia)
    {
        if($trabajador->rol == "Veterinario" ||  $trabajador->rol == "Trabajador") return false;
        elseif( $trabajador->rol == "Jefe") return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Evidencia  $evidencia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(trabajador $trabajador, Evidencia $evidencia)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Evidencia  $evidencia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(trabajador $trabajador, Evidencia $evidencia)
    {
        //
    }
}
