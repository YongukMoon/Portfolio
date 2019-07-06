<div class="media edit">
    <div class="media-left">
        @include('auth.users.partial.avatar', ['user'=>$comment->user, 'size'=>32])
    </div>
    <div class="media-body">
        <form action="{{ route('comments.update', $comment->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <textarea name="content" class="form-control">{{ old('content', $comment->content) }}</textarea>
            <button type="submit" class="btn btn-default btn-sm">Update</button>
        </form>
    </div>
</div>