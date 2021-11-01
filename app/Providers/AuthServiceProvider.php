<?php

namespace App\Providers;

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

        Gate::define('isAdmin',function(){
          return  auth()->user()->usertype == 'Admin';
        });
        Gate::define('isDemarcheur',function(){
           return auth()->user()->usertype == 'Demarcheur';
        });

        Gate::define('postAnnonce',function(){
        return (auth()->user()->usertype == 'Demarcheur' || auth()->user()->usertype == 'Admin') ;
        });
    }
}
