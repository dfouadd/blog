@extends("layouts.app")
@section("title") Edit Post @endsection
@section("content")

    <form method="POST" action="{{route('posts.update',$post->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label  class="form-label" >Title</label>
            <input name="title" type="text" value="{{$post->title}}" class="form-control" placeholder="Enter title">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter
            description">{{$post->description}}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="creater" class="form-control">
                @foreach($users as $user)
                <option @selected($user->id == $post->user_id)
                    value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
