<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{(Route::is('dashboard')) ? 'text-white bg-primary rounded' : ''}} nav-link"
                   href="{{route('dashboard')}}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Terms</span></a>
            </li>
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" href="#">--}}
            {{--                    <span>Explore</span></a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" href="#">--}}
            {{--                    <span>Feed</span></a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" href="#">--}}
            {{--                    <span>Support</span></a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" href="#">--}}
            {{--                    <span>Settings</span></a>--}}
            {{--            </li>--}}
        </ul>
    </div>
    @auth()
        <div class="card-footer text-center py-2">
            <a class="{{ (Route::is('users.show')) ? "text-white bg-primary rounded" : '' }} btn btn-link btn-sm"
               href="{{ route('users.show',auth()->id()) }}">View Profile</a>
        </div>
    @endauth
</div>
