<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Models\TodoList;

class TodoItemController extends Controller
{
    public function store(TodoList $list)
    {
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
