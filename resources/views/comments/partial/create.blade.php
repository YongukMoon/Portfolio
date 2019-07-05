<div class="media">
    <div class="media-left">
        @include('auth.users.partial.avatar', ['user'=>$currentUser, 'size'=>32])
    </div>
    <div class="media-body">
        <form action="{{ route('articles.comments.store', $article->id) }}" method="post">
            {{ csrf_field() }}

            @if (isset($parentId))
                <input type="hidden" name="parent_id" value="{{ $parentId }}">
            @endif

            <textarea name="content" class="form-control">{{ old('content') }}</textarea>
            <button type="submit" class="btn btn-default">Store</button>
        </form>
    </div>
</div>