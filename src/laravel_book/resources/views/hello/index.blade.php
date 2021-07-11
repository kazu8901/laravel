@extends('layouts.helloapp')
@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
 
  <p>これは<middleware>google.com</middleware>へのリンクです</p>
  <p>これは<middleware>yahoo.com</middleware>へのリンクです</p>

  @component('components.message')
    @slot('msg_title')
      おい、
    @endslot

    @slot('msg_content')
      デュエルしろよ
    @endslot
  @endcomponent

  @include('components.message', ['msg_title'=>'OK','msg_content'=>'サブビューです'])

@endsection


@section('footer')
copyright 2017 tuyano.
@endsection