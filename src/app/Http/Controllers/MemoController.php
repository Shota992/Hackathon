<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    public function index(){
        $memos = Memo::all();
        return view('memo.index', ['memos' => $memos]);
    }

    public function softDelete($id)
    {
        $delmemo = Memo::findOrFail($id);
        $delmemo->delete(); // soft deleteを実行
        

        return redirect()->back()->with('success', 'Post deleted successfully.');
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
}

