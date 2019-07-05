<ul class="list-inline">
    <li><i class="fa fa-tag"></i></li>
    @foreach ($tags as $tag)
        <li>
            <a href="{{ route('articles.tags', $tag->slug) }}">{{ $tag->name }}</a>
        </li>
    @endforeach
</ul>