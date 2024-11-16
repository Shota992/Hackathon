<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
}
