@extends('layouts.master')

@section('content')
    {{-- 
        1.상품명
        2.가격
        3.주문할 수량
        
        4.제품이미지
        5.상세페이지
    --}}

    <div>
        <p>상품명 : {{ $product->title }}</p>
        <p>가격 : {{ $product->price }}</p>
        <p>주문할 수량</p>
    </div>
@endsection