@extends('layouts.master')

@section('content')
    {{-- 
        1.상품명
        2.가격
        3.주문할 수량
        
        4.제품이미지
        5.상세페이지
    --}}

    <div class="row">
        <div class="col-md-6">
            <img src="https://dummyimage.com/600x400/dedede/fff" alt="..." class="img-thumbnail">
        </div>

        <div class="col-md-6">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{ $product->title }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{ $product->price }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-2">
                        <input type="number" name="quantity" class="form-control" value="1">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection