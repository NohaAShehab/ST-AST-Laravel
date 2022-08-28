<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use App\Policies\BookPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Book::class =>BookPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // define your own gates

        # by default gate get $user form auth()->user;
        Gate::define("isAdmin", function ($user){
            return $user->role==="admin";
        });
        Gate::define("isManager", function ($user){
            return $user->role==="manager";
        });
        Gate::define("isUser", function ($user){
            return $user->role==="user";
        });

        Gate::define("owner", function ($user, $book){
            return $user->id === $book->author_id;
        });
    }
}
