<?php

namespace App\Http\Controllers;

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
        //ここにtitleやcontent中身を記述。
        
        return redirect()->route('posts.create')->with('success', '投稿が保存されました！');
    }
}
