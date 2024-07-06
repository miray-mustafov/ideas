<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
     data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="{{route('dashboard')}}"><span class="fas fa-brain me-1"> </span>{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                @endguest

                @auth()
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{route('users.show',auth()->id())}}">{{Auth::user()->name}}</a> {{--or auth()->id()--}}
                    </li>
                    <li>
                        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                             src="{{Auth::user()->getImageUrl()}}"
                             alt="{{Auth::user()->name}} Avatar">
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class='btn btn-danger bt-sm' type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
