<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">To-Do</span>

        <div class="ml-auto">
            <button type="button" class="btn btn-primary d-inline-block" data-bs-toggle="modal" data-bs-target="#new-list">
                New list
                &nbsp;<i class="fas fa-plus"></i>
            </button>

            <form action="{{ route('logout') }}" method="post" class="d-inline-block">
                @csrf

                <button type="submit" class="btn btn-danger">Log out</button>
            </form>
        </div>
    </div>
</nav>
