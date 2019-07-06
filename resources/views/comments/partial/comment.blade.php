<div class="media comment" id="comment_{{ $comment->id }}" data-id="{{ $comment->id }}">
    <div class="media-left">
        @include('auth.users.partial.avatar', ['user'=>$comment->user, 'size'=>32])
    </div>
    <div class="media-body">
        <div class="media-heading">{{ $comment->user->name }} ({{ $comment->created_at->timezone('Asia/Seoul') }})</div>
        {!! markdown($comment->content) !!}

        <div class="comment__action btn-group btn-group-sm" role="group">
            <button type="button" class="comment__edit btn btn-default">Edit</button>
            <button type="button" class="comment__delete btn btn-default">Delete</button>
            <button type="button" class="comment__create btn btn-default">Create</button>
            <button type="button" class="comment__view btn btn-default">view</button>
        </div>

        @include('comments.partial.create', ['parentId'=>$comment->id])

        @include('comments.partial.edit')

        @forelse ($comment->replies as $reply)
            @include('comments.partial.comment', [
                'comment'=>$reply,
            ])
        @empty
            
        @endforelse
    </div>
</div>