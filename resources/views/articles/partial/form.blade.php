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