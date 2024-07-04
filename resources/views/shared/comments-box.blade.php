<div>
    <form action="{{route('ideas.comments.store',$idea->id)}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name='content' class="fs-6 form-control" rows="1"></textarea>
            {{--todo errors ?? --}}
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment</button>
        </div>
    </form>

    @foreach($idea->comments as $comment)
    <hr>

    <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
             src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$comment->user->name}}" alt="{{$comment->user->name}} Avatar">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">
                    <a href="{{route('users.show',$comment->user_id)}}">{{$comment->user->name}}</a>
                </h6>
                <small class="fs-6 fw-light text-muted">{{$comment->created_at}}</small>
            </div>
            <p class="fs-6 mt-3 fw-light">
                {{$comment->content}}
            </p>
        </div>
    </div>
    @endforeach
</div>
