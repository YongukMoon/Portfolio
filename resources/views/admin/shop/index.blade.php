@extends('layouts.master')

@section('content')
    <ul>
        <li><a href="{{ route('products.create') }}">상품추가</a></li>
    </ul>
    <hr>
    <table class="table">
        <caption>상품목록</caption>
        <thead>
            <tr>
                <th>카테고리</th>
                <th>상품명</th>
                <th>가격</th>
                <th>재고</th>
                <th>수정/삭제</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr data-id="{{ $product->id }}">
                    <th>{{ $product->category->name }}</th>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">수정</a>
                        <button class="product__delete">삭제</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        {{-- <tfoot>
            <tr>
                <td></td>
            </tr>
        </tfoot> --}}
    </table>

    <div class="pagenator text-center">
        {{ $products->render() }}
    </div>
@endsection

@section('script')
    @parent
    <script>
        $('.product__delete').on('click', function(e){
            if(confirm('product delete ? ')){
                var self=$(this).closest('tr');
                var productId=self.data('id');

                console.log(productId);

                $.ajax({
                    type: 'DELETE',
                    url: '/products/'+productId
                }).then(function(){
                    self.fadeOut();
                });
            }
        });
    </script>
@endsection