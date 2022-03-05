<?php

namespace App\Providers;

use App\Models\TodoItem;
use App\Models\TodoList;
use App\Models\User;
use App\Policies\TodoItemPolicy;
use App\Policies\TodoListPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        TodoList::class => TodoListPolicy::class,
        TodoItem::class => TodoItemPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-admin', function (User $user) {
            return $user->hasRole('admin');
        });

        Gate::define('owns-list', function (User $user, TodoList $list) {
            return $user->id === $list->user_id;
        });

        Gate::define('owns-item', function (User $user, TodoItem $item) {
            //dd($user->listItems()->where('todo_items.id', $item->id)->get());
            return $user->listItems()->where('todo_items.id', $item->id)->exists();
        });
    }
}
