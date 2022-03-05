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
                            <ul class="list-group">
                                @foreach($list->items as $item)
                                    <li class="list-group-item">
                                        {{ $item->content }}
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
