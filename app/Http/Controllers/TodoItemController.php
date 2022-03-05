<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Models\TodoList;
use Illuminate\Support\Facades\Gate;

class TodoItemController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TodoItem::class, 'item');
    }

    public function store(TodoList $list)
    {
        if (!Gate::allows('is-admin')) {
            Gate::authorize('owns-list', $list);
        }

        $list->items()->create(request()->validate(TodoItem::RULES));

        return to_route('home');
    }

    public function update(TodoItem $item)
    {
        $item->update(request()->validate(Todoitem::RULES));

        return to_route('home');
    }

    public function destroy(TodoItem $item)
    {
        $item->delete();

        return to_route('home');
    }
}
