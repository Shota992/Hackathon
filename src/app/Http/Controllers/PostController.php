<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

  public function timeline()
  {
      $posts = Posting::with('user')->latest()->paginate(10);

      // 現在のログインユーザーの情報を取得
      $user = Auth::user();

      // ビューに渡すデータを整理して渡す
      return view('timeline', [
          'posts' => $posts,
          'user' => $user,
      ]);
  }

    public function mypost()
    {
        return view('mypost');
    }

    public function create()
    {
        return view('posts.create');
        //新規投稿登録画面のビューファイルを表示
    }

    public function store(Request $request)
    {
        //ここにtitleやcontent中身を記述。
        
        return redirect()->route('posts.create')->with('success', '投稿が保存されました！');

    }
}
