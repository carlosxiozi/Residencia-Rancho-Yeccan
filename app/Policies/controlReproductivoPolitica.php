<?php

namespace App\Policies;

use App\Models\Control_reproductivo;
use App\Models\trabajador;
use Illuminate\Auth\Access\HandlesAuthorization;

class controlReproductivoPolitica
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
    public function revisarA(trabajador $trabajador, Control_reproductivo $controlReproductivo)
    { 
        if($trabajador->rol == "Veterinario" || $trabajador->rol == "Jefe") return true;
        elseif($trabajador->rol == "Trabajador") return false;
       
        
    }
    public function deleteServicio(trabajador $trabajador, Control_reproductivo $controlReproductivo)
    {
        if( $trabajador->rol == "Jefe") return true;
        elseif($trabajador->rol == "Veterinario" || $trabajador->rol == "Trabajador") return false;
        # code...
    }
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Control_reproductivo  $controlReproductivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(trabajador $trabajador, Control_reproductivo $controlReproductivo)
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
     * @param  \App\Models\Control_reproductivo  $controlReproductivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(trabajador $trabajador, Control_reproductivo $controlReproductivo)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Control_reproductivo  $controlReproductivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(trabajador $trabajador, Control_reproductivo $controlReproductivo)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Control_reproductivo  $controlReproductivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(trabajador $trabajador, Control_reproductivo $controlReproductivo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Control_reproductivo  $controlReproductivo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(trabajador $trabajador, Control_reproductivo $controlReproductivo)
    {
        //
    }
}
