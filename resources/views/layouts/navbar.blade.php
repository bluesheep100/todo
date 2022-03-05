<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">To-Do</span>

        <div class="ml-auto">
            <form action="{{ route('logout') }}" method="post" class="form-inline">
                @csrf

                <button type="submit" class="btn btn-danger">Log out</button>
            </form>
        </div>
    </div>
</nav>
