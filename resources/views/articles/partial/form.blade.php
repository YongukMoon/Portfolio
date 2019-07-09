<div class="form-group">
    <label for="title">{{ trans('articles.form.title') }}</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" placeholder="{{ trans('articles.form.title') }}">
    {!! $errors->first('title', '<span>:message</span>') !!}
</div>

<div class="form-group">
    <label for="content">{{ trans('articles.form.content') }}</label>
    <textarea name="content" class="form-control" cols="30" rows="10" placeholder="{{ trans('articles.form.content') }}">{{ old('content', $article->content) }}</textarea>
    {!! $errors->first('content', '<span>:message</span>') !!}
</div>

<div class="form-group">
    <label for="tags">{{ trans('articles.form.tag') }}</label>
    <select name="tags[]" id="tags" class="form-control" multiple="multiple">
        @foreach ($allTags as $tag)
            <option value="{{ $tag->id }}" {{ $article->tags->contains($tag->id) ? 'selected="selected"' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('tags', '<span>:message</span>') !!}
</div>

<div class="form-group">
    <label for="my-dropzone">{{ trans('articles.form.file') }}</label>

    @if ($viewName==='articles.edit')
        @include('attachments.partial.list', ['attachments'=>$article->attachments])
    @endif
    
    <div id="my-dropzone" class="dropzone"></div>
</div>

<div class="form-group">
    <label for="notification">{{ trans('articles.form.notification') }}</label>
    <input type="checkbox" name="notification" value="{{ old('notification', 1) }}" checked>
</div>

@section('script')
    @parent
    <script>
        $('#tags').select2({
            placeholder: '{{ trans("articles.form.tagsPlaceholder") }}',
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