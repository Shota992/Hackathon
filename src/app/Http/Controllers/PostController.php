<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;

class PostController extends Controller
{
<<<<<<< HEAD
    public function timeline()
    {

        $posts = Posting::with('user')->latest()->get();
        return view('timeline', compact('posts'));

    }

    public function mypost()
    {
        return view('mypost');
=======
    public function create()
    {
        return view('posts.create');
        //新規投稿登録画面のビューファイルを表示
    }

    public function store(Request $request)
    {
        //ここにtitleやcontent中身を記述。
        
        return redirect()->route('posts.create')->with('success', '投稿が保存されました！');
>>>>>>> 691e4fce3878436449af387608a2881ce338c5fa
    }
}
