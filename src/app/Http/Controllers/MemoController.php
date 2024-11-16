<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;



class MemoController extends Controller
{
    public function index(){
        $memos = Memo::all();
        return view('memo.index', ['memos' => $memos]);
    }
    
    public function memocreate()
    {
        return view('memo/create');
    }

    // public function store(Request $request)
    // {
    //     バリデーション
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'memo' => 'required|string|max:1000',
    //     ]);

    //     新しいメモの作成
    //     $memo = new Memo();
    //     $memo->title = $request->title;
    //     $memo->memo = $request->memo;
    //     $memo->save();

    //     メモが保存された後のリダイレクトやメッセージ表示
    //     return redirect()->route('timeline.index')->with('success', 'メモが作成されました！');
    // }>>>>>>> ac235eed54afc19643930fc0813440eb4ba3f62a
}

