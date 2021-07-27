@extends('layouts.helloapp')

@section('title', 'Board.index')

@section('menubar')
 @parent
  ボードページ
@endsection

@section('content')
  <table>
    <tr><th>Data</th></tr>
    @foreach ($items as $item)
      <tr>
        <td>{{$item->getData()}}</td>
      </tr>
    @endforeach
  </table>

  <a href="board/add">投稿ページへ</a>
@endsection

@section('footer')
  コピーライト4031 manji
@endsection