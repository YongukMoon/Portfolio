@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>{{ trans('shop.index.title') }}</h1>
    </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="https://dummyimage.com/600x400/cccccc/fff" alt="...">
                    <div class="caption text-center">
                        <h3><a href="">{{ $product->title }}</a></h3>
                        <p>{{ $product->price }} <i class="fa fa-krw" aria-hidden="true"></i></p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="paginator text-center">
            {{ $products->render() }}
        </div>
    </div>
@endsection