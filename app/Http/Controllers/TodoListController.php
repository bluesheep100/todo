<?php

namespace App\Http\Controllers;

class TodoListController extends Controller
{
    public function index()
    {
        return view('todo_list.index');
    }
}
