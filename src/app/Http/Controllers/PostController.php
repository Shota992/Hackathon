<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Posting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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


    public function create()
    {
        return view('posts.create');
        //新規投稿登録画面のビューファイルを表示
    }

    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'content' => 'required|max:255',
        ]);
    
        // データ保存
        Posting::create([
            'content' => $validated['content'],
            'anonymity' => $request->input('anonymity', 0), // デフォルト値を0に設定
            'user_id' => auth()->id(), // ログインユーザーのIDを保存
        ]);
    
        return redirect()->route('timeline')->with('success', '投稿が保存されました！');
    }


    public function mypost()
    {
        $messages = Message::all();
        $posts = Posting::orderBy('created_at', 'desc')->get(); 
        $user = Auth::user();
        $page = Posting::paginate(10);
        return view('mypost', compact('messages', 'posts','user','page'));
    }
}
