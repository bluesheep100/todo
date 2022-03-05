<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TodoListController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('todo_list.index', [
            'lists' => Gate::allows('is-admin') ?
                TodoList::with('items')->get() :
                $user->lists()->with('items')->get(),
        ]);
    }

    public function store()
    {
        TodoList::create(request()->validate(TodoList::RULES));

        return to_route('home');
    }

    public function update(TodoList $list)
    {
        $list->update(request()->validate(TodoList::RULES));

        return to_route('home');
    }

    public function destroy(TodoList $list)
    {
        $list->delete();

        return to_route('home');
    }
}
