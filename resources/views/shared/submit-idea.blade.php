@auth
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" name="content" rows="3"></textarea>
                @error('content') {{--if you have error for idea in the session--}}
                    {{--the error directive will inject the $message for us--}}
                    <span class='fs-6 text-danger d-block mt-2'>{{$message}}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share</button>
            </div>
        </form>
    </div>
@endauth
@guest
    <h4>Login to share your ideas :)</h4>
@endguest
