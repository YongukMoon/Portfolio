@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Add product</h1>
    </div>

    <form action="{{ route('products.store') }}" method="post">
        {{ csrf_field() }}

        {{-- 
            1.카테고리 선택
            2.상품명
            3.가격
            4.재고

            <보류>
            5.상품이미지
            6.상세페이지
        --}}

        @include('admin.shop.partial.form')

        <div class="form-group">
            <button type="submit" class="btn btn-default">
                저장
            </button>
        </div>
    </form>
@endsection