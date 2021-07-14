<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\HelloRequest;
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
        $msg = "フォームを入力してください";
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

        return view('hello.index', ['msg' => $msg]);

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

    public function post(HelloRequest $request) {
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
        return view('hello.index', ['msg' => '正しく入力できましたぞ']);
        // $msg = $request->msg;
        // $data = ['msg'=> $msg];
        // $each=['1', 'two', 'three', '4', 'five'];
        // return view('hello.index', ['each' => $each, 'msg' => $msg]);
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
