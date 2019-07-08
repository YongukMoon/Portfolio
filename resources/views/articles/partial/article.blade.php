<div>
    <h4>
        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
    </h4>
    
    <p>
        <small>
            <i class="fa fa-user" aria-hidden="true"></i> {{ $article->user->name }}
            ( <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $article->created_at->timezone('Asia/Seoul') }})
            <i class="fa fa-eye" aria-hidden="true"></i> {{ trans('articles.article.view_count') }} {{ $article->view_count }}

            @if ($article->comment_count)
                <i class="fa fa-comments" aria-hidden="true"></i> {{ trans('articles.article.comment_count') }} {{ $article->comment_count }}
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