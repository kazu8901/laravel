@extends('layouts.helloapp')
@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>{{$msg}}</p>
  @if (count($errors) > 0)
  <p>入力に問題があります。再入力して下さい。</p>
  @endif
 
  <table>
  <tr><th>Name</th><th>Mail</th><th>Age</th><th>edit</th><th>del</th><th>show</th><th>削除</th></tr>
  @foreach ($items as $item)
  <tr>
  <td>{{$item->name}}</td>
  <td>{{$item->mail}}</td>
  <td>{{$item->age}}</td>
  <td><a href="/hello/edit?id={{$item->id}}">編集ページへ</a></td>
  <td><a href="/hello/del?id={{$item->id}}">削除ページへ</a></td>
  <td><a href="/hello/show?id={{$item->id}}">詳細ページへ</a></td>
  <td><form action="/hello" method="post">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$item->id}}">
      <input type="submit" value="削除">
  </form></td>
  </tr>
  @endforeach
  </table> <br>
  <a href="/hello/add">新規投稿ページへ</a>
  <!-- <table>
  <form action="/hello" method="post">
    {{csrf_field()}}
    @if ($errors->has('msg'))
    <tr><th>ERROR</th><td>{{$errors->first('msg')}}</td></tr>
    @endif
    <tr><th>Message: </th><td><input type="text" name="msg" value={{old('msg')}}></td></tr>
    <tr><th></th><td><input type="submit" value = "send"></td></tr>
  </form>
  </table> -->

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