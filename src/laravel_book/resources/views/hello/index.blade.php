<html>
  <head>
    <title>Hello/Index</title>
      <style>
      body {font-size: 16px; color:#999;}
      h1 {font-size: 120pt; text-align: right; color:#f6f6f6; margin: -20px 0 -30px 0;}
    </style>
  </head>
  <body>
    <h1>Blade/Index</h1>
    @isset ($msg)
      <p>こんにちは、{{$msg}}殿！</p>
    @else
      <p>おい、デュエルしろよ</p>
    @endisset
    <form method="POST" action="/hello">
      {{ csrf_field() }}
      <input type="text" name="msg">
      <input type="submit">
    </form>

    <p>&#064;foreachディレクティブの例</p>
    @isset ($data)
    <ol>
      @foreach($data as $item)
      <li>{{$item}}</li>
      @endforeach
    </ol>
    @else
      <ol>
        @foreach($each as $item)
        <li>{{$item}}</li>
        @endforeach
      </ol>
    @endisset

    <p>&#064;forディレクティブの例</p>
    <ol>
    @for ($i = 1;$i < 100;$i++)
    @if ($i % 2 == 1)
      @continue
    @elseif ($i <= 10)
      <li>No, {{$i}}
    @else
      @break
    @endif
    @endfor
    </ol>

    @isset ($data)
      @foreach($data as $item)
      @if ($loop->first)
        <p>※データ一覧</p><ul>
      @endif
      <li>No,{{$loop->iteration}}.{{$item}}</li>
      @if ($loop->last)
      </ul><p>ここまで</p>
      @endif
      @endforeach
    @else
      @foreach($each as $item)
        @if ($loop->first)
          <p>※データ一覧</p><ul>
        @endif
        <li>No,{{$loop->iteration}}.{{$item}}</li>
        @if ($loop->last)
        </ul><p>ここまで</p>
        @endif
      @endforeach
    @endisset

    <p>&#064;whileディレクティブの例</p>
    @isset ($data)
      <ol>
      @php
      $counter = 0;
      @endphp
      @while ($counter < count($data))
      <li>{{$data[$counter]}}</li>
      @php
      $counter++
      @endphp
      @endwhile
      </ol>
    @else
    <ol>
      @php
      $counter = 0;
      @endphp
      @while ($counter < count($each))
      <li>{{$each[$counter]}}</li>
      @php
      $counter++
      @endphp
      @endwhile
      </ol>
    @endisset
  </body>
</html>