<div>
    <h4>
        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
    </h4>
    
    <p>
        <small>
            {{ $article->user->name }}
            ({{ $article->created_at->timezone('Asia/Seoul') }})
            조회수 {{ $article->view_count }}

            @if ($article->comment_count)
                / 댓글수 {{ $article->comment_count }}
            @endif
        </small>
    </p>

    @if ($viewName==='articles.index')
        @include('tags.partial.list', ['tags'=>$article->tags])
    @endif

    @if ($viewName==='articles.show')
        @include('attachments.partial.list', ['attachments'=>$article->attachments])
    @endif
</div>