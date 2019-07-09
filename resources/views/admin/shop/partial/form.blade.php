<div class="form-group">
    <label for="categories">카테고리</label>
    <select name="categories" class="form-control">
        @foreach ($allCategories as $category)
            <option value="{{ $category->id }}" {{ ($product->category->id == $category->id) ? 'selected="selected"' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('categories', '<span>:message</span>') !!}
</div>

<div class="form-group">
    <label for="title">상품명</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $product->title) }}" placeholder="상품명">
    {!! $errors->first('title', '<span>:message</span>') !!}
</div>

<div class="form-group">
    <label for="price">가격</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" placeholder="가격">
    {!! $errors->first('price', '<span>:message</span>') !!}
</div>

<div class="form-group">
    <label for="stock">재고</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" placeholder="재고">
    {!! $errors->first('stock', '<span>:message</span>') !!}
</div>