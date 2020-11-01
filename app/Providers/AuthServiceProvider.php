<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Policies\CommentPolicy;
use App\Post;
use App\Comment;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-post', 'App\Policies\PostPolicy@create');

        Gate::define('update-post', 'App\Policies\PostPolicy@update');

        Gate::define('delete-post', 'App\Policies\PostPolicy@delete');

        Gate::define('create-comment', 'App\Policies\CommentPolicy@create');

        Gate::define('update-comment', 'App\Policies\CommentPolicy@update');

        Gate::define('delete-comment', 'App\Policies\CommentPolicy@delete');
    }
}
