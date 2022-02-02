<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\usuarioPoliticas;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\Models\Model' => 'App\Policies\ModelPolicy',
         'App\Models\trabajador' => 'App\Policies\usuarioPoliticas',
         'App\Models\Animal' => 'App\Policies\animalPolitica',
         'App\Models\Control_reproductivo' => 'App\Policies\controlReproductivoPolitica',
         'App\Models\Evento' => 'App\Policies\eventoPolitica',
         'App\Models\Evidencia' => 'App\Policies\evidenciaPolitica',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
