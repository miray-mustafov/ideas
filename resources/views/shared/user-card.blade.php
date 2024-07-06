<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                     src="{{$user->getImageUrl()}}" alt="{{$user->name}} Avatar">
                <div>
                    <h3 class="card-title mb-0"><a href="{{route('users.show',$user->id)}}"> {{$user->name}}
                        </a></h3>
                    <span class="fs-6 text-muted">{{$user->email}}</span>
                </div>
            </div>
            @if(auth()->id() === $user->id)
                <div>
                    <a href="{{route('users.edit',auth()->id())}}">edit</a>
                </div>
            @endif
        </div>

{{--        <div class="mt-3">--}}
{{--            --}}{{--todo image ?--}}
{{--            <label >Profile Picture</label>--}}
{{--        </div>--}}

        <div class="px-2 mt-4">

            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">
                {{$user->bio}}
            </p>

            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> 0 hardcoded Followers </a> {{--todo followers--}}
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                    </span> {{$user->ideas()->count()}}
                </a> {{--SELECT COUNT(*) FROM ideas WHERE user_id = ?--}}
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> {{$user->comments()->count()}} </a>
            </div>

            {{--@auth() we could check for authentication within blade too but we have handled it with auth middleware --}}
            @if(auth()->id() !== $user->id)
                <div class="mt-3">
                    @if(Auth::user()->follows($user))
                        <form method='post' action="{{route('users.unfollow',$user->id)}}">
                            @csrf
                            <button class="btn btn-danger btn-sm">UnFollow</button>
                        </form>
                    @else
                        <form method='post' action="{{route('users.follow',$user->id)}}">
                            @csrf
                            <button class="btn btn-primary btn-sm">Follow</button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
