@extends('layouts.master')

@section('style')
    <style>
        .main_title {
            color:black;
            font-size: 5em;
            text-align: center;
            font-family: 'Poiret One', cursive;
        }

        @media (max-width: 500px) {
            .main_title {
                font-size: 2.5em;
            }
        }
    </style>
@endsection

@section('content')
    <div class="main_title">
        <p>Yonguk Moon Portfolio</p>
        <p>Personal Tech Blog</p>
    </div>
@endsection