<div>
    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
    <p>{{ $article->user->name }} ({{ $article->created_at->timezone('Asia/Seoul') }})</p>

    @if ($viewName==='articles.index')
        @include('tags.partial.list', ['tags'=>$article->tags])
    @endif

    @if ($viewName==='articles.show')
        @include('attachments.partial.list', ['attachments'=>$article->attachments])
    @endif
</div>