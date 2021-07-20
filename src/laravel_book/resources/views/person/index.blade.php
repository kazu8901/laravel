@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <table>
  <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
  @foreach ($items as $item)
    <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->mail}}</td>
      <td>{{$item->age}}</td>
    </tr>
  @endforeach
  </table> <br>

  <table>
  <tr><th>Data</th></tr>
  @foreach ($items as $item)
    <tr><td>{{$item->getData()}}</td></tr>
  @endforeach
  </table>
@endsection

@section('footer')
2031 manji.
@endsection