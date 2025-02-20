<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype='multipart/form-data' method="post" action="{{ route('users.update',auth()->id() )}}">
            @csrf
            @method('put')

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                         src="{{$user->getImageUrl()}}"
                         alt="{{$user->name}} Avatar">
                    <div>

                        <label for="name">Update name:</label><br>
                        <input name="name" class='form-control' value="{{$user->name}}" type="text">
                        @error('name')
                        <span class="text-danger fs-6">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div>
                    <a href="{{route('users.show', $user->id)}}">view</a>
                </div>
            </div>

            <div class="mt-3">
                <label for="image">Profile Picture</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                <span class="text-danger fs-6">{{$message}}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">

                <h5 class="fs-5"> Update Bio : </h5>
                <textarea class="form-control" name="bio" rows="3">{{$user->bio}}</textarea>
                @error('bio')
                <span class='fs-6 text-danger d-block mt-2'>{{$message}}</span>
                @enderror

                <button type="submit" class="btn btn-dark btn-small my-2"> Save</button>

                @include('users.scores')
            </div>

        </form>
    </div>
</div>
