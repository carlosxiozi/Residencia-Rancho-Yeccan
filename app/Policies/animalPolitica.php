<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\trabajador;
use Illuminate\Auth\Access\HandlesAuthorization;

class animalPolitica
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
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(trabajador $trabajador, Animal $animal)
    {
        
       
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createA(trabajador $trabajador)
    {
        if($trabajador->rol == "Veterinario" || $trabajador->rol == "Jefe") return true;
        elseif($trabajador->rol == "Trabajador") return false;
    }
    public function controlProductivoReproductivo(trabajador $trabajador, Animal $animal){
        if($trabajador->rol == "Veterinario" || $trabajador->rol == "Jefe") return true;
        elseif($trabajador->rol == "Trabajador") return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(trabajador $trabajador, Animal $animal)
    {
        //
    }
    public function editA(trabajador $trabajador, Animal $animal){
        if($trabajador->rol == "Veterinario" || $trabajador->rol == "Jefe") return true;
        elseif($trabajador->rol == "Trabajador") return false;
    }
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteA(trabajador $trabajador, Animal $animal)
    {
        if($trabajador->rol == "Jefe") return true;
        elseif($trabajador->rol == "Trabajador" || $trabajador->rol == "Veterinario") return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(trabajador $trabajador, Animal $animal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\trabajador  $trabajador
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(trabajador $trabajador, Animal $animal)
    {
        //
    }
}
