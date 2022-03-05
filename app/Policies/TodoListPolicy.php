<?php

namespace App\Policies;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class TodoListPolicy
{
    use HandlesAuthorization;

    public function before(): bool|null
    {
        if (Gate::allows('is-admin')) {
            return true;
        }

        return null;
    }

    public function viewAny(): bool
    {
        return true;
    }

    public function create(): bool
    {
        return true;
    }

    public function delete(User $user, TodoList $list): bool
    {
        return Gate::allows('owns-list', $list);
    }
}
