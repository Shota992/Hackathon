<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
  public function chat()
  {
      $userId = Auth::id();

      $chats = Chat::whereHas('chatUsers', function ($query) use ($userId) {
          $query->where('post_user_id', $userId)
                ->orWhere('listener_user_id', $userId);
      })->with('posting.user')->get();

      return view('chat.index', compact('chats'));
  }

  public function chatShow($id)
  {
      $chat = Chat::with(['posting.user', 'chatUsers.postUser', 'chatUsers.listenerUser', 'messages.sender'])
                  ->findOrFail($id);
  
      // メッセージを取得し、ビューに渡す
      $messages = $chat->messages()->with('sender')->orderBy('id')->get();
  
      $posting = $chat->posting;
      $chatUser = $chat->chatUsers->first();
  
      // compactで'messages'をビューに渡す
      return view('chat.show', compact('chat', 'posting', 'chatUser', 'messages'));
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

      return redirect()->route('chat.show', $message->chat_id);
  }
}
