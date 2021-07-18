@extends('layouts.helloapp')

@section('title', 'show')

@section('menubar')
 @parent
 詳細ページ
@endsection

@section('content')
  @if ($items != null)
    @foreach ($items as $item)
      <table width="400px">
        <tr><th width="50px">id: </th><td>{{$item->id}}</td></tr>
        <tr><th width="50px">name: </th><td>{{$item->name}}</td></tr>
        <tr><th width="50px">mail: </th><td>{{$item->mail}}</td></tr>
        <tr><th width="50px">age: </th><td>{{$item->age}}</td></tr>
      </table><br>
    @endforeach
  @endif
@endsection

@section('footer')
manij
@endsection