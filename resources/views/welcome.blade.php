@extends('layouts.master')

@section('style')
    <style>
        .navbar {
            margin: 0.5em;
        }
        
        .main_title {
            color:black;
            font-size: 5em;
            text-align: center;
            font-family: 'Poiret One', cursive;
        }

        .hljs {
            display: block; padding: 0.5em;
            background: #2E2C2B; color: #DEDEDE;
        }

        .hljs-comment,
        .hljs-template_comment,
        .hljs-javadoc {
            color: #615953;
        }

        .hljs-keyword,
        .ruby .hljs-function .hljs-keyword,
        .hljs-request,
        .hljs-status,
        .nginx .hljs-title {
            color: #FFA927;
        }

        .hljs-function .hljs-keyword,
        .hljs-sub .hljs-keyword,
        .method,
        .hljs-list .hljs-title {
            color: #FC580C;
        }

        .hljs-string,
        .hljs-tag .hljs-value,
        .hljs-cdata,
        .hljs-filter .hljs-argument,
        .hljs-attr_selector,
        .apache .hljs-cbracket,
        .hljs-date,
        .tex .hljs-command,
        .coffeescript .hljs-attribute {
            color: #FDCA49;
        }

        .hljs-subst {
            color: #DAEFA3;
        }

        .hljs-regexp {
            color: #E9C062;
        }

        .hljs-title,
        .hljs-sub .hljs-identifier,
        .hljs-pi,
        .hljs-tag,
        .hljs-tag .hljs-keyword,
        .hljs-decorator,
        .hljs-shebang,
        .hljs-prompt {
            color: #FC6B0A;
        }

        .hljs-symbol,
        .ruby .hljs-symbol .hljs-string,
        .hljs-number {
            color: #FC580C;
        }

        .hljs-params,
        .hljs-variable,
        .clojure .hljs-attribute {
            color: #FFC48C;
        }

        .css .hljs-tag,
        .hljs-rules .hljs-property,
        .hljs-pseudo,
        .tex .hljs-special {
            color: #FC6B0A;
        }

        .css .hljs-class {
            color: #FFC48C;
        }

        .hljs-rules .hljs-keyword {
            color: #FFC48C;
        }

        .hljs-rules .hljs-value {
            color: #FC6B0A;
        }

        .css .hljs-id {
            color: #8B98AB;
        }

        .hljs-annotation,
        .apache .hljs-sqbracket,
        .nginx .hljs-built_in {
            color: #9B859D;
        }

        .hljs-preprocessor,
        .hljs-pragma {
            color: #8996A8;
        }

        .hljs-hexcolor,
        .css .hljs-value .hljs-number {
            color: #DD7B3B;
        }

        .css .hljs-function {
            color: #DAD085;
        }

        .diff .hljs-header,
        .hljs-chunk,
        .tex .hljs-formula {
            background-color: #0E2231;
            color: #F8F8F8;
            font-style: italic;
        }

        .diff .hljs-change {
            background-color: #4A410D;
            color: #F8F8F8;
        }

        .hljs-addition {
            background-color: #253B22;
            color: #F8F8F8;
        }

        .hljs-deletion {
            background-color: #420E09;
            color: #F8F8F8;
        }

        .coffeescript .javascript,
        .javascript .xml,
        .tex .hljs-formula,
        .xml .javascript,
        .xml .vbscript,
        .xml .css,
        .xml .hljs-cdata {
            opacity: 0.5;
        }
    </style>
@endsection

@section('content')
    <h1 class="main_title">Yonguk Moon Portfolio</h1>
@endsection