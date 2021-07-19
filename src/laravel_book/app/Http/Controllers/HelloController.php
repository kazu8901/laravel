<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;
use Validator;

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
    body {font-size:16pt; color:#999; }
    h1 { font-size:100pt; text-align: right; color: #eee; margin: -40px 0 -50px 0;}
</style>
EOF;
$body = '</head><body>';
$end = '</body></head>';

function tag($tag, $txt) {
    return "<{$tag}>".$txt."</$tag>";
}

class HelloController extends Controller{

    public function top() {
        return view('hello.top');
    }

    public function index(Request $request) {

        $items = DB::table('people')->orderBy('age', 'asc')->get();

        // if (isset($request->id)) {
        //     $param = ['id' => $request->id];
        //     $items = DB::select('select * from people where id = :id', $param);
        // }
        // else {
        //     $items = DB::select('select * from people');
        // }
        $msg = "postではない";
        // if ($request->hascookie('msg'))
        //  $msg = "Cookie: ". $request->cookie('msg');
        // else {
        //     $msg = "クッキーはありません";
        // }
        // $validator = Validator::make($request->query(),[
        //     'id' => 'required',
        //     'pass' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     $msg = 'クエリに問題があります';
        // }
        // else {
        //     $msg = 'いいですねぇ！';
        // }
        // $data = ['msg' => '名前を入力してください。', 'test' => 'フォームですぞ'];
        // $data=['1', 'two', 'three', '4', 'five'];
        // $data = [
        //     ['name' => 'tarou', 'mail' => 'taro'],
        //     ['name' => 'yamada', 'mail' => 'yama'],
        //     ['name' => 'suzuki', 'mail' => 'sususu']
        // ];

        return view('hello.index', ['msg'=> $msg, 'items' => $items]);

        // global $head, $style, $body, $end;
        
        // $html = $head . tag('title','Hello/Index').$style . tag('h1', 'Index') . tag('p', 'this is Index page')
        // . '<a href="/hello/other">go to Other page</a>' . $end;

        // return $html;

        // レスポンス学習
    //     $html = <<<EOF
    //     <html>
    //     <head>
    //     <title>Hello/Index</title>
    //     <style>
    //     body {font-size: 16px; color:#999;}
    //     h1 {font-size: 120pt; text-align: right; color:#fafafa; margin: -50px 0 -120px 0;}
    //     </style>
    //     </head>
    //     <body>
    //     <h1>hello</h1>
    //     <h3>Request</h3>
    //     <pre>{$request}</pre>
    //     <h3>Response</h3>
    //     <pre>{$response}</pre>
    //     </body>
    //     </html>
    //     EOF;

    //     $response->setContent($html);
    //     return $response;
    }

    public function post(request $request) {

        $validate_rule = [
            'msg' => 'required',
        ];

        $this->validate($request, $validate_rule);
        $items = DB::select('select * from people');
        $msg = $request->msg;
        $response = new Response(view('hello.index',['msg' => '「'.$msg.'」'.'をクッキーに保存しました', 'items' => $items]));
        $response->cookie('msg', $msg,100);
        return $response;
        // $rules = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric',
        // ];

        // $messages = [
        //     'name.required' => '名前は必ず入力してください',
        //     'mail.email' => 'メールアドレスが必要です',
        //     'age.numeric' => '整数で入力してください',
        //     'age.min' => '0際以上の年齢で入力してください',
        //     'age.max' => '150歳以下の年齢で入力してください'
        // ];

        // $validator = Validator::make($request->all(),$rules,$messages);

        // $validator->sometimes('age','min:0', function($input) {
        //     return !is_int($input->age);
        // });

        // $validator->sometimes('age', 'max:150', function($input) {
        //     return !is_int($input->age);
        // });

        // if ($validator->fails()) {
        //     return redirect('/hello')
        //     ->withErrors($validator)
        //     ->withInput();
        // }
        return view('hello.index', ['msg' => $msg, 'items' => $items]);
        // $msg = $request->msg;
        // $data = ['msg'=> $msg];
        // $each=['1', 'two', 'three', '4', 'five'];
        // return view('hello.index', ['each' => $each, 'msg' => $msg]);
    }

    public function add(Request $request) {
        return view('hello.add');
    }

    public function create(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        // DB::insert('insert into people (name,mail,age) values (:name, :mail, :age)', $param);
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request) {
        $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);
        $item = DB::table('people')
        ->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request) {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        // DB::update('update people set name = :name, mail = :mail, age = :age
        //             where id = :id', $param);
        DB::table('people')
        ->where('id', $request->id)
        ->update($param);
        return redirect('/hello');
    }

    public function del(Request $request) {
        $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);
        $item = DB::table('people')
        ->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request) {
        $param = ['id' => $request->id];
        // DB::delete('delete from people where id = :id', $param);
        DB::table('people')
        ->where('id', $request->id)
        ->delete();
        return redirect('/hello');
    }

    public function show(Request $request) {
        // $min = $request->min;
        // $max = $request->max;
        // $items = DB::table('people')
        // ->whereRaw('age >= ? and age <= ?',
        // [$min,$max])->get();

        // $name = $request->name;
        // $items = DB::table('people')
        // ->where('name', 'like', '%' . $name . '%')
        // ->orwhere('mail', 'like', '%'.$name.'mail')
        // ->get();

        $page = $request->page;
        $items = DB::table('people')
        ->offset($page * 3)
        ->limit(3)
        ->get();
        return view('hello.show', ['items' => $items]);
    }

    // public function other() {
    //     global $head, $style, $body, $end;
        
    //     $html = $head.tag('title', 'Hello/Other').$style.$body
    //     .tag('h1', 'Other').tag('p', 'this is Other page').$end;

    //     return $html;
    // }

    // シングルコントローラー化

    // public function __invoke() {
    //   return <<<EOF

    //   <html>
    //   <head>
    //   <title>Hello</title>
    //   <style>
    //   body {font-size: 16px; color:#999;}
    //   h1 {font-size: 30pt; text-align: right; color:#eee; margin: -15px 0 0 0;}
    //   </style>
    //   </head>
    //   <body>
    //   <h1>シングルアクション</h1>
    //   <p>これは、シングルアクションコントローラーです。</p>
    //   </body>
    //   </html>
    //   EOF;
    // }
}
