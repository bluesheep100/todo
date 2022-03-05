@extends('layouts.app')

@section('modals')
    @include('modals.new_list')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach($lists as $list)
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            {{ $list->name }}

                            <form action="{{ route('todo-list.destroy', ['list' => $list->id]) }}" method="post" class="d-inline float-end">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('todo-item.store', ['list' => $list->id]) }}" method="post">
                                @csrf

                                <div class="input-group mb-3">
                                    <label for="new-item" class="sr-only">Add item</label>
                                    <input type="text" name="content" id="new-item" class="form-control">

                                    <button type="submit" class="input-group-append btn btn-primary">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </form>

                            <ul class="list-group">
                                @foreach($list->items as $item)
                                    <li class="list-group-item">
                                        <form class="d-inline" onclick="this.submit()" style="cursor: pointer;" action="{{ route('todo-item.destroy', ['item' => $item->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            <i class="fas fa-close align-middle text-danger"></i>
                                        </form>
                                        &nbsp;

                                        {{ $item->content }}

                                        <form action="{{ route('todo-item.update', ['item' => $item->id]) }}" method="post" class="d-inline-block float-end">
                                            @method('PATCH')
                                            @csrf
                                            <div class="form-check">
                                                <label for="{{ $item->id }}-completed" class="sr-only">Completed</label>
                                                <input type="checkbox" name="completed" id="{{ $item->id }}-completed" @checked($item->completed) onchange="this.form.submit()" value="1">
                                            </div>
                                        </form>
                                    </li>
                                @endforeach
                                @unset($item)
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
