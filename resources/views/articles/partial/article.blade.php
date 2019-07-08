<div>
    <h4>
        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
    </h4>
    
    <p>
        <small>
            {{ $article->user->name }}
            ({{ $article->created_at->timezone('Asia/Seoul') }})
            {{ trans('articles.article.view_count') }} {{ $article->view_count }}

            @if ($article->comment_count)
                / {{ trans('articles.article.comment_count') }} {{ $article->comment_count }}
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