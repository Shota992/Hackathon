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
            'anonymity' => 'required|boolean',
        ]);

        // データ保存
        Posting::create([
            'content' => $validated['content'],
            'anonymity' => $validated['anonymity'],
            'user_id' => auth()->id(), // ログインユーザーのIDを保存
        ]);
        return redirect()->route('posts.create')->with('success', '投稿が保存されました！');
    }


    public function mypost()
    {
        $messages = Message::all();
        $posts = Post::all(); 
        $users = User::all();
        return view('mypost', compact('messages', 'posts','users'));
    }
}
