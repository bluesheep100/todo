<?php

namespace App\Policies;

use App\Models\TodoItem;
use App\Models\TodoList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class TodoItemPolicy
{
    use HandlesAuthorization;

    public function before(): bool|null
    {
        if (Gate::allows('is-admin')) {
            return true;
        }

        return null;
    }

    public function create(): bool
    {
        return true;
    }

    public function update(User $user, TodoItem $item): bool
    {
        return Gate::allows('owns-item', $item);
    }

    public function delete(User $user, TodoItem $item): bool
    {
        return Gate::allows('owns-item', $item);
    }
}
