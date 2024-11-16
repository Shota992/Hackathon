<?php

namespace App\Http\Controllers;

use App\Models\Chat;
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
      $chat = Chat::with(['posting.user', 'chatUsers.postUser', 'chatUsers.listenerUser'])
                  ->findOrFail($id);

      // 1. posting内容
      $posting = $chat->posting;

      // 2. post_user と listener_user
      $chatUser = $chat->chatUsers->first(); // 単一のチャットには1つのchat_userが関連付けられていると仮定

      return view('chat.show', compact('chat', 'posting', 'chatUser'));
  }
}
