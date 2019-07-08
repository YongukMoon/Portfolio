<div class="page-header">
    <h4>
        {{ $comment->user->name }} ({{ $comment->created_at->timezone('Asia/seoul') }})
    </h4>
</div>
{!! markdown($comment->content) !!}