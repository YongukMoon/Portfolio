@php
    $voted='disabled="disabled"';

    if(isset($currentUser)){
        $voted=$comment->votes->contains('user_id', $currentUser->id) ? 'disabled="disabled"' : '';
    }
@endphp

@if ($isTrashed and !$hasChild)
    
@elseif($isTrashed and $hasChild)
    <div class="media comment" id="comment_{{ $comment->id }}" data-id="{{ $comment->id }}">
        <div class="media-left">
            @include('auth.users.partial.avatar', ['size'=>32])
        </div>
        <div class="media-body">
            <div class="media-heading">Unknown user ({{ $comment->created_at->timezone('Asia/Seoul') }})</div>
            <p class="text-danger">Delete comment ...</p>

            <div class="comment__action btn-group btn-group-sm" role="group">
                @if ($comment->replies->count() > 0)
                    <button type="button" class="comment__view btn btn-default">Reply view</button>
                @endif
            </div>
    
            @forelse ($comment->replies as $reply)
                @include('comments.partial.comment', [
                    'comment'=>$reply,
                    'hasChild'=>$reply->replies->count(),
                    'isTrashed'=>$reply->trashed(),
                ])
            @empty
                
            @endforelse
        </div>
    </div>
@else
    <div class="media comment" id="comment_{{ $comment->id }}" data-id="{{ $comment->id }}">
        <div class="media-left">
            @include('auth.users.partial.avatar', ['user'=>$comment->user, 'size'=>32])
        </div>
        <div class="media-body">
            <div class="media-heading">{{ $comment->user->name }} ({{ $comment->created_at->timezone('Asia/Seoul') }})</div>
            {!! markdown($comment->content) !!}
    
            <div class="comment__action btn-group btn-group-sm" role="group">
                <button type="button" class="comment__vote btn btn-default" data-vote="up" {{ $voted }}>
                    Up
                    <span>{{ $comment->up_count }}</span>
                </button>
                <button type="button" class="comment__vote btn btn-default" data-vote="down" {{ $voted }}>
                    Down
                    <span>{{ $comment->down_count }}</span>
                </button>
    
                @can('update', $comment)
                    <button type="button" class="comment__edit btn btn-default">Edit</button>
                @endcan
                
                @can('delete', $comment)
                    <button type="button" class="comment__delete btn btn-default">Delete</button>
                @endcan
                
                @if (isset($currentUser))
                    <button type="button" class="comment__create btn btn-default">Reply create</button>
                @endif
    
                @if ($comment->replies->count() > 0)
                    <button type="button" class="comment__view btn btn-default">Reply view</button>
                @endif
            </div>
    
            @include('comments.partial.create', ['parentId'=>$comment->id])
    
            @include('comments.partial.edit')
    
            @forelse ($comment->replies as $reply)
                @include('comments.partial.comment', [
                    'comment'=>$reply,
                    'hasChild'=>$reply->replies->count(),
                    'isTrashed'=>$reply->trashed(),
                ])
            @empty
                
            @endforelse
        </div>
    </div>
@endif