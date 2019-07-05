@include('comments.partial.create')

<div class="comment__list">
    @forelse ($comments as $comment)
        @include('comments.partial.comment', [
            'parentId'=>$comment->id
        ])
    @empty
        
    @endforelse
</div>