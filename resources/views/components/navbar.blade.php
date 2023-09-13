<nav class="navbar navbar-default">
    <div class="container-fluid">

        <ul class="nav navbar-nav">
            <li> <form><a class="btn btn-link navbar-btn mr-3" href="{{ route('index.categorias') }}">Categorias</a></form> </li>
            <li> <form> <a class="btn btn-link navbar-btn mr-3" href="{{ route('index.frases') }}">Frases</a></form></li>
            <li>
            @auth
                <li>
                    <form method="POST" action="{{ route('logout.user') }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-link navbar-btn mr-3">Logout ({{ Auth::user()->name }})</button>
                    </form>
                </li>
            @else
                <li>
                    <form><a class="btn btn-link navbar-btn" href="{{ route('index.user') }}">Login</a></form>
                </li>
            @endauth
            </li>
        </ul>
    </div>
</nav>
