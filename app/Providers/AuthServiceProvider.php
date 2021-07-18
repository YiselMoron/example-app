<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
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

        Gate::define('guardar', function (User $user) {
            for ($i=0; $i < $user->rol->rolPermiso->count(); $i++) {
                if($user->rol->rolPermiso[$i]->operation_id == '1'){
                    return true;
                }
            }
            return false;
        });

        Gate::define('eliminar', function (User $user) {
            for ($i=0; $i < $user->rol->rolPermiso->count(); $i++) {
                if($user->rol->rolPermiso[$i]->operation_id == '2'){
                    return true;
                }
            }
            return false;
        });

        Gate::define('actualizar', function (User $user) {
            for ($i=0; $i < $user->rol->rolPermiso->count(); $i++) {
                if($user->rol->rolPermiso[$i]->operation_id == '3'){
                    return true;
                }
            }
            return false;
        });

        Gate::define('procesar', function (User $user) {
            for ($i=0; $i < $user->rol->rolPermiso->count(); $i++) {
                if($user->rol->rolPermiso[$i]->operation_id == '4'){
                    return true;
                }
            }
            return false;
        });

        Gate::define('general', function (User $user) {
            if($user->idRol == '1' || $user->idRol == '4'){
                return true;
            }
            return false;
        });

        Gate::define('administrador', function (User $user) {
            if($user->idRol == '1'){
                return true;
            }
            return false;
        });

        Gate::define('soporte', function (User $user) {
            if($user->idRol == '2'){
                return true;
            }
            return false;
        });

        Gate::define('almacen', function (User $user) {
            if($user->idRol == '3'){
                return true;
            }
            return false;
        });
    }
}
