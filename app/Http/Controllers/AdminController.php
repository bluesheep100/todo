<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        Gate::authorize('is-admin');

        return view('admin.index', ['users' => User::all()]);
    }

    public function destroyUser(User $user)
    {
        Gate::authorize('is-admin');

        $user->delete();

        return to_route('admin.index');
    }
}
