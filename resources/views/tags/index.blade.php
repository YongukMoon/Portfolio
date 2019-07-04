<div class="col-md-2">
    <h4><i class="fa fa-tag"></i> Tag</h4>
    <ul class="list-unstyled">
        @foreach ($allTags as $tag)
            <li>
                <a href="{{ route('articles.tags', $tag->slug) }}">
                    {{ $tag->name }} {{ $tag->articles->count() }}
                </a>
            </li>
        @endforeach
    </ul>
</div>