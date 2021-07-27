@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <table>
  <tr><th>Name</th><th>Mail</th><th>Age</th><th>更新ページ</th><th>削除ページ</th></tr>
  @foreach ($items as $item)
    <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->mail}}</td>
      <td>{{$item->age}}</td>
      <td><a href="/person/edit?id={{$item->id}}">更新ページ</a></td>
      <td><a href="/person/del?id={{$item->id}}">削除ページ</a></td>
      <td><form action="/person" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="submit" value="削除">
      </form></td>
    </tr>
  @endforeach
  </table> <br>

  <a href="/person/add">追加ページ</a>


  <table>
  <tr><th>Person</th><th>Board</th></tr>
  @foreach ($items as $item)
    <tr>
      <td>{{$item->getData()}}</td>
      <td> 
          @if ($item->board != null)
            {{$item->board->getData()}}
          @endif
      </td>
      <td>
        @if ($item->boards != null)
          <table>
            @foreach ($item->boards as $obj)
              <tr><td>{{$obj->getData()}}</tr></td>
            @endforeach
          </table>
        @endif
      </td>
    </tr>
  @endforeach
  </table>
@endsection

@section('footer')
2031 manji.
@endsection