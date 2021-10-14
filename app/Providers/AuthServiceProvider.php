<?php

namespace App\Providers;

use App\Models\User;
use App\Models\User\Post;
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
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('posts','App\Policies\PostPolicy');
        Gate::define('posts.tag','App\Policies\PostPolicy@tag');
        Gate::define('posts.category','App\Policies\PostPolicy@category');

    }
}
