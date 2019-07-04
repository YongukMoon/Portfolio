<div>
    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
    <p>{{ $article->user->name }} ({{ $article->created_at->timezone('Asia/Seoul') }})</p>
</div>