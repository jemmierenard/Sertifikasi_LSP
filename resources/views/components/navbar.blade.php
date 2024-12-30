<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('members.index') ? 'active' : '' }}" 
                       href="{{ route('members.index') }}" 
                       aria-current="{{ request()->routeIs('members.index') ? 'page' : '' }}">Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.index') ? 'active' : '' }}" 
                       href="{{ route('books.index') }}" 
                       aria-current="{{ request()->routeIs('books.index') ? 'page' : '' }}">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('borrowing.index') ? 'active' : '' }}" 
                       href="{{ route('borrowing.index') }}" 
                       aria-current="{{ request()->routeIs('borrowing.index') ? 'page' : '' }}">Borrows</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
