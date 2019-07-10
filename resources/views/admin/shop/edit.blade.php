@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Add product</h1>
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @include('admin.shop.partial.form')

        <div class="form-group">
            <button type="submit" class="btn btn-default">
                수정
            </button>
        </div>
    </form>
@endsection