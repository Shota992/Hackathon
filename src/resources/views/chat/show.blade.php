<x-app-layout>

    <body class="h-screen w-screen overflow-hidden">
        <main class="flex">
            <x-sidebar username="{{ Auth::user()->name }}" goal="達成する目標を記述" />

            <div class="main w-full bg-white h-screen pt-16 px-20 pb-20">
                <x-main pagename="CHAT DETAIL">
                    <!-- 投稿内容 -->
                    <div class="flex flex-col gap-6 mb-12">
                        <div class="flex items-center gap-4 bg-gray-200 w-full shadow-md mt-4 ml-4 p-4">
                            <div class="flex justify-end text-sm">
                                {{ $posting->created_at->format('Y/m/d') }}
                            </div>
                            <div class="bg-yellow-300 w-12 h-12 rounded-full flex-none"></div>
                            <div class="gap-4 w-full">
                                <div class="font-bold">
                                    {{ $posting->user->name }}
                                </div>
                                <div class="">
                                    {{ $posting->content }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- チャット参加者 -->
                    <div class="flex gap-4 bg-gray-100 w-full shadow-md mt-4 ml-4 p-4">
                        <div class="w-full">
                            <h3 class="font-bold">チャット参加者</h3>
                            <ul>
                                <li>投稿者: {{ $chatUser->postUser->name }}</li>
                                <li>リスナー: {{ $chatUser->listenerUser->name }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- メッセージ一覧 -->
                    <div class="flex flex-col gap-4 mt-8">
                      <h3 class="font-bold text-lg">メッセージ一覧</h3>
                      @forelse ($messages as $message)
                          <div class="flex items-center gap-4 p-4
                              @if ($message->is_mine) justify-end text-right @else justify-start @endif bg-gray-100 w-full shadow-md">
                              
                              @if (!$message->is_mine)
                                  <!-- 他人のメッセージ -->
                                  <div class="bg-gray-300 w-12 h-12 rounded-full flex-none"></div>
                                  <div class="w-full">
                                      <div class="font-bold">
                                          {{ $message->sender->name }}
                                          <span class="text-sm text-gray-500">({{ $message->created_at->format('Y/m/d H:i') }})</span>
                                      </div>
                                      <div>
                                          {{ $message->message }}
                                      </div>
                                  </div>
                              @else
                                  <!-- 自分のメッセージ -->
                                  <div class="w-full">
                                      <div class="font-bold">
                                          {{ $message->sender->name }}
                                          <span class="text-sm text-gray-500">({{ $message->created_at->format('Y/m/d H:i') }})</span>
                                      </div>
                                      <div>
                                          {{ $message->message }}
                                      </div>
                                  </div>
                                  <div class="bg-gray-300 w-12 h-12 rounded-full flex-none"></div>
                              @endif
                          </div>
                      @empty
                          <div class="text-center text-gray-500">まだメッセージがありません。</div>
                      @endforelse
                  </div>

                    <!-- メッセージ送信フォーム -->
                    <div class="mt-8">
                        <form action="{{ route('chat.send') }}" method="POST">
                            @csrf
                            <input type="hidden" name="chat_id" value="{{ $chat->id }}">
                            <textarea name="message" rows="3" class="w-full border-gray-300 rounded-md" placeholder="メッセージを入力してください"></textarea>
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">送信</button>
                        </form>
                    </div>
                </x-main>
            </div>
        </main>
    </body>
</x-app-layout>
