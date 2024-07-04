<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                     src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$user->name}}" alt="{{$user->name}} Avatar">
                <div>
                    @if($editing ?? false)
                        <label for="name">Update name:</label><br>
                        <input class='form-control' value="{{$user->name}}" type="text" name="name">
                    @else
                        <h3 class="card-title mb-0"><a href="{{route('users.show',$user->id)}}"> {{$user->name}}
                            </a></h3>
                        <span class="fs-6 text-muted">{{$user->email}}</span>
                    @endif
                </div>
            </div>
            @if(auth()->id() === $user->id)
                @if($editing ?? false)
                @else
                    <div>
                        <a href="{{route('users.edit',auth()->id())}}">edit</a>
                    </div>
                @endif
            @endif
        </div>

        <div class="px-2 mt-4">
            @if($editing ?? false)
                <h5 class="fs-5"> Update Bio : </h5>
                <textarea class="form-control" name="bio" rows="3">{{$user->name}} Bio here
                </textarea>
                @error('bio')
                <span class='fs-6 text-danger d-block mt-2'>{{$message}}</span>
                @enderror

                <button type="submit" class="btn btn-dark btn-small my-2"> Save</button>
            @else
                <h5 class="fs-5"> Bio : </h5>
                <p class="fs-6 fw-light">
                    {{--todo add a bio in users table so that u can display it here--}}
                    This book is a treatise on the theory of ethics, very popular during the
                    Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                    from a line in section 1.10.32.
                </p>

            @endif
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> 0 hardcoded Followers </a> {{--todo followers--}}
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                    </span> {{$user->ideas()->count()}}
                </a> {{--SELECT COUNT(*) FROM ideas WHERE user_id = ?--}}
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> {{$user->comments()->count()}} </a>
            </div>

            {{--            @auth() we could check for authentication within blade too but we have handled it with auth middleware --}}
            @if(auth()->id() !== $user->id)
                <div class="mt-3">
                    <button class="btn btn-primary btn-sm"> Follow</button>
                </div>
            @endif
        </div>
    </div>
</div>
