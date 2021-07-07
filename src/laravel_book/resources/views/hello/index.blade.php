@extends('layouts.helloapp')
@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>Controller value <br>'message' = {{$message}}</p>
  <p>ViewComposer Value<br>'view_message' = {{$view_message}}</p>
  <p>test<br>'test_messa' = {{$test_message}}</p>
  <p>mycomposer<br> '自作コンポーザー' {{$testtest}}</p>
  
  @each ('components.item', $data, 'item')

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