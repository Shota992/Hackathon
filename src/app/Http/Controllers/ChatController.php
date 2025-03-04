<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\Message;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
    {

        public function chat()
        {
            $userId = Auth::id();
            // チャットの取得と並び替え
            $chats = Chat::whereHas('chatUsers', function ($query) use ($userId) {
                    $query->where('post_user_id', $userId)
                            ->orWhere('listener_user_id', $userId);
                })
                ->with('posting.user')
                ->orderBy('created_at', 'desc') // 新しい順に並び替え
                ->paginate(20); // 1ページあたり20件
            return view('chat.index', compact('chats'));
        }

    public function chatShow($id)
    {
        $chat = Chat::with(['posting.user', 'chatUsers.postUser', 'chatUsers.listenerUser', 'messages.sender'])
                    ->findOrFail($id);

        // 現在ログインしているユーザーID
        $loggedInUserId = Auth::id();

        // 投稿者かリスナーかの識別
        $isPostUser = $chat->chatUsers->where('post_user_id', $loggedInUserId)->isNotEmpty();
        $isListenerUser = $chat->chatUsers->where('listener_user_id', $loggedInUserId)->isNotEmpty();

        // メッセージを取得
        $messages = $chat->messages()->with('sender')->orderBy('id')->get();

        $posting = $chat->posting;
        $chatUser = $chat->chatUsers->first();

        return view('chat.show', compact('chat', 'posting', 'chatUser', 'messages', 'isPostUser', 'isListenerUser'));
    }


    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'chat_id' => 'required|exists:chats,id',
        ]);

        $message = Message::create([
            'message' => $request->message,
            'chat_id' => $request->chat_id,
            'send_user_id' => Auth::id(),
        ]);


        // return redirect()->route('chat.show', $message->chat_id) . '#latest-message';
        return redirect()->route('chat.show', $message->chat_id)->withFragment('latest-message');

    }

    public function toggleAnonymity($postingId)
    {
        // 投稿を取得
        $posting = Posting::findOrFail($postingId);

        // anonymity の値を切り替え
        $posting->anonymity = !$posting->anonymity;
        $posting->save();

        // リダイレクト先で状態が更新される
        return redirect()->back()->with('status', '匿名設定が変更されました。');
    }

    public function create(Request $request)
    {
        $request->validate([
            'posting_id' => 'required|exists:postings,id',
        ]);
    
        // 対象の投稿を取得
        $posting = Posting::findOrFail($request->posting_id);
    
        // ログイン中のユーザー
        $listenerUserId = Auth::id();
    
        // 既存のチャットを検索
        $existingChat = Chat::where('posting_id', $posting->id)
            ->whereHas('chatUsers', function ($query) use ($posting, $listenerUserId) {
                $query->where('post_user_id', $posting->user_id)
                      ->where('listener_user_id', $listenerUserId);
            })->first();
    
        if ($existingChat) {
            // 既存のチャットがある場合はそのチャットにリダイレクト
            return redirect()->route('chat.show', $existingChat->id);
        }
    
        // 新しいチャットを作成
        $chat = Chat::create([
            'permit' => 1, // 必要に応じて変更
            'posting_id' => $posting->id,
        ]);
    
        // チャットユーザーを登録
        ChatUser::create([
            'chat_id' => $chat->id,
            'post_user_id' => $posting->user_id,
            'listener_user_id' => $listenerUserId,
        ]);
    
        // 作成したチャット画面にリダイレクト
        return redirect()->route('chat.show', $chat->id);
    }

    
}
