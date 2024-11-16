<x-app-layout>
  <body class="h-screen w-screen overflow-hidden">
      <main class="flex">
          <!-- サイドバーをコンポーネントとして呼び出す -->
          {{-- <x-sidebar :user="$user"/> --}}

          <!-- メインコンテンツ -->
          <div class="main w-full bg-white h-screen pt-16 px-20 pb-20">
              <x-main pagename="CHAT">
                  <div class="flex flex-col gap-6 mb-12">
                      @forelse ($chats as $chat)
                          <a href="{{ route('chat.show', $chat->id)}}">
                            <div class="flex items-center gap-4 bg-gray-200 w-full shadow-md mt-4 ml-4 p-4">
                                <div class="flex justify-end text-sm">
                                    {{ $chat->posting->created_at->format('Y/m/d') }}
                                </div>
                                <div class="bg-yellow-300 w-12 h-12 rounded-full flex-none"></div>
                                <div class="gap-4 w-full">
                                    <div class="font-bold">
                                        {{ $chat->posting->user->name }}
                                    </div>
                                    <div class="">
                                        {{ $chat->posting->content }}
                                    </div>
                                </div>
                            </div>
                          </a>
                      @empty
                          <div class="text-center text-gray-500">関連するチャットがありません。</div>
                      @endforelse
                  </div>
                  {{-- <div>
                      <div class="flex justify-center mt-8 mb-20">
                          <ul class="flex gap-4">
                              <!-- ページネーション用 -->
                              <li><a href="#" class="px-4 py-2 bg-gray-700 text-white rounded">1</a></li>
                              <li><a href="#" class="px-4 py-2 bg-gray-200 rounded">2</a></li>
                              <li><a href="#" class="px-4 py-2 bg-gray-200 rounded">3</a></li>
                          </ul>
                      </div>
                  </div> --}}
              </x-main>
          </div>
      </main>
  </body>
</x-app-layout>
