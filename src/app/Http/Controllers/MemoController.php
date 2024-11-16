<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;


class MemoController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ログイン中のユーザーを取得
        $memos = Memo::all(); // すべてのメモを取得
        return view('memo.index', compact('user', 'memos')); // 両方のデータをビューに渡す
    }

    public function softDelete($id)
    {
        $delmemo = Memo::findOrFail($id);
        $delmemo->delete(); // soft deleteを実行
        
        return redirect()->back()->with('success', 'メモを削除しました。');
    }


    public function create(){
        $userID = Auth::id();
        return view('memo.create', [ 'userID' => $userID]);
    }
    

    public function store(Request $request)
    {
        
        $userID = Auth::id();
        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'user_id' => 'required',
        // ]);
        

        Memo::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'user_id' => $userID,
            'posting_id' => 1,
        ]);

        //return redirect()->route('memo.index')->with('success', 'メモが保存されました！');
    }

    public function edit($id)
{
    $memo = Memo::findOrFail($id); // メモを取得
    return view('memo.edit', compact('memo')); // メモをビューに渡す
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $memo = Memo::findOrFail($id); // メモを取得
    $memo->update([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
    ]);

    return redirect()->route('memo.index')->with('success', 'メモを更新しました。');
}
}
