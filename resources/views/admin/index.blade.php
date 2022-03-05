@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($users as $user)
                                <li class="list-group-item">
                                    {{ $user->name }}

                                    <form class="d-inline float-end" action="{{ route('admin.destroy-user', ['user' => $user->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? This will delete the user and all associated data');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
