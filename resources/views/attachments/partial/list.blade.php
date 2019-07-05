<ul class="list-unstyled">
    @foreach ($attachments as $attachment)
        <li>
            <i class="fa fa-paperclip"></i>
            <a href="{{ $attachment->url }}">
                {{ $attachment->filename }} ({{ $attachment->bytes }})
            </a>

            @if ($viewName==='articles.edit')
                <button type="button" class="attachment_delete btn btn-danger btn-xs" data-id="{{ $attachment->id }}">Delete</button>
            @endif
        </li>
    @endforeach
</ul>