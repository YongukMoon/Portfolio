<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" placeholder="Title">
    {!! $errors->first('title', '<span>:message</span>') !!}
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content">{{ old('content', $article->content) }}</textarea>
    {!! $errors->first('content', '<span>:message</span>') !!}
</div>

<div class="form-group">
    <label for="tags">Tag</label>
    <select name="tags[]" id="tags" class="form-control" multiple="multiple">
        @foreach ($allTags as $tag)
            <option value="{{ $tag->id }}" {{ $article->tags->contains($tag->id) ? 'selected="selected"' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="my-dropzone">File</label>
    <div id="my-dropzone" class="dropzone"></div>

    @if ($viewName==='articles.edit')
        @include('attachments.partial.list', ['attachments'=>$article->attachments])
    @endif
</div>

@section('script')
    @parent
    <script>
        $('#tags').select2({
            placeholder: '태그를 선택하세요 (최대 3개)',
            maximumSelectionLength: 3
        });

        Dropzone.autoDiscover=false;

        var myDropzone=new Dropzone('div#my-dropzone', {
            url: '/attachments',
            paramName: 'files',
            maxFilesize: 3,
            acceptedFile: '.jpeg,.jpg,.png,.zip,.tar',
            uploadMultiple: true,
            addRemoveLinks: true,
            params: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                article_id: '{{ $article->id }}'
            }
        });

        var form=$('.container').find('form');

        myDropzone.on('successmultiple', function(file,data){
            for(var i=0, len=data.length; i<len; i++){
                $("<input>", {
                    type: 'hidden',
                    name: 'attachments[]',
                    value: data[i].id
                }).appendTo(form);

                file[i].id=data[i].id;
            }
        });

        myDropzone.on('removedfile', function(file){
            $('input[name="attachments[]"][value="'+file.id+'"]').remove();

            $.ajax({
                type: 'DELETE',
                url: '/attachments/'+file.id
            });
        });
    </script>
@endsection