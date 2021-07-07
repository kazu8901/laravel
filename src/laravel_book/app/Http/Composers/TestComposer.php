<?php 
  namespace App\Http\Composers;

  use Illuminate\View\View;

  class TestComposer {
    public function compose(View $view) {
      $view->with('testtest', 'テストコンポーザー');
    }
  }