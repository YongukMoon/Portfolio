<div class="media" id="comment_{{ $comment->id }}" data-id="{{ $comment->id }}">
    <div class="media-left">
        @include('auth.users.partial.avatar', ['user'=>$comment->user, 'size'=>32])
    </div>
    <div class="media-body">
        <div class="media-heading">{{ $comment->user->name }} ({{ $comment->created_at->timezone('Asia/Seoul') }})</div>
        {!! markdown($comment->content) !!}

        @include('comments.partial.create', ['parentId'=>$comment->id])

        @forelse ($comment->replies as $reply)
            @include('comments.partial.comment', [
                'comment'=>$reply,
            ])
        @empty
            
        @endforelse
    </div>
</div>