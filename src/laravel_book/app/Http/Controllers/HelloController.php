<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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
    public function index() {
        $data = ['msg' => 'これはBladeを利用しています。'];
        return view('hello.index',$data);
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
