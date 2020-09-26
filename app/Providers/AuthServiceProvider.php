<?php

namespace App\Providers;

use App\Guru;
use App\Policies\AdminPolicy;
use App\Policies\GuruPolicy;
use App\Policies\WalimuridPolicy;
use App\User;
use App\Walimurid;
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
        'App' => 'App\Policies\ModelPolicy',
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', 'App\Policies\AdminPolicy@admin');
        Gate::resource('user', 'App\Policies\UsersPolicy');
        Gate::resource('guru', GuruPolicy::class);
        Gate::resource('role', 'App\Policies\RolePolicy');
        Gate::resource('siswa', 'App\Policies\SiswaPolicy');
        Gate::resource('sarpras', 'App\Policies\SarprasPolicy');
        Gate::resource('walimurid', 'App\Policies\WalimuridPolicy');
//        Gate::resource('admin', 'App\Policies\AdminPolicy@Admin');
//        Gate:define('user','App\Policies\GuruPolicy@viewAny');
    }
}
