<x-body-common :title="'CHAT DETAIL'">
  <!-- メガホンアイコン -->
  <a href="#"
      class="fixed top-4 right-2 flex items-stretch gap-4 bg-purple-300 shadow-md p-4 transform origin-center hover:bg-gray-100 hover:scale-105 transition">
      <img src="{{ asset('images/megaphon.svg') }}" alt="Megaphon" class="h-8 w-8">
  </a>

  <!-- 匿名/実名切り替えボタン -->
  @if (Auth::id() === $posting->user_id)
      <div class="flex justify-end z-30 fixed top-18 right-2">
          <form action="{{ route('chat.toggle-anonymity', $posting->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <button type="submit"
                  class="px-4 py-2 text-white rounded transform origin-center hover:scale-105 transition
                      {{ $posting->anonymity == 1 ? 'bg-cyan-600 hover:bg-cyan-700' : 'bg-gray-500 hover:bg-gray-600' }}">
                  @if ($posting->anonymity == 1)
                      実名を公開する
                  @else
                      匿名に戻す
                  @endif
              </button>
          </form>
      </div>
  @endif

  <!-- 投稿内容 -->
  <div class="flex flex-col gap-6 mb-12 mt-12" id="top">
      <div class="flex items-center gap-4 bg-gray-200 w-full shadow-md mt-4 ml-4 p-4">
          <div class="flex justify-end text-sm">
              {{ $posting->created_at->format('Y/m/d') }}
          </div>
          <div class="bg-gray-300 w-12 h-12 rounded-full flex-none overflow-hidden">
              @if ($posting->anonymity == 1)
                  <img src="{{ asset('images/who.png') }}" alt="Anonymous Icon" class="object-cover w-12 h-12">
              @else
                  <img src="{{ route('user.icon', $posting->user->icon_image) }}" alt="User Icon"
                      class="object-cover w-12 h-12">
              @endif
          </div>
          <div class="gap-4 w-full">
              <div class="font-bold">
                  @if ($posting->anonymity == 1)
                  {{ $posting->user->name }}(匿名)
                  @else
                      {{ $posting->user->name }}
                  @endif
              </div>
              <div>{{ $posting->content }}</div>
          </div>
      </div>
  </div>

  <!-- メッセージ一覧 -->
  <div id="messages" class="flex flex-col gap-4 mt-8">
      <h3 class="font-bold text-lg">メッセージ一覧</h3>
      @forelse ($messages as $message)
          @if ($message->is_mine)
              <!-- 自分のメッセージ -->
              <div id="{{ $loop->last ? 'latest-message' : '' }}"
                  class="flex justify-end items-center gap-4 p-4 bg-gray-100 w-full shadow-md">
                  <div class="w-full text-right">
                      <div class="font-bold text-sm text-gray-500">
                          {{ Auth::user()->name }}
                          <span class="ml-2">{{ $message->created_at->format('Y/m/d H:i') }}</span>
                      </div>
                      <div class="bg-blue-200 p-3 rounded-lg inline-block text-sm">
                          {{ $message->message }}
                      </div>
                  </div>
                  <div class="bg-gray-300 w-12 h-12 rounded-full flex-none overflow-hidden">
                      <img src="{{ route('user.icon', Auth::user()->icon_image) }}" alt="User Icon"
                          class="object-cover w-12 h-12">
                  </div>
              </div>
          @else
              <!-- 他人のメッセージ -->
              <div id="{{ $loop->last ? 'latest-message' : '' }}"
                  class="flex justify-start items-center gap-4 p-4 bg-gray-100 w-full shadow-md">
                  <div class="bg-gray-300 w-12 h-12 rounded-full flex-none overflow-hidden">
                      <img src="{{ route('user.icon', $message->sender->icon_image) }}" alt="User Icon"
                          class="object-cover w-12 h-12">
                  </div>
                  <div class="w-full">
                      <div class="font-bold text-sm text-gray-500">
                          {{ $message->sender->name }}
                          <span class="ml-2">{{ $message->created_at->format('Y/m/d H:i') }}</span>
                      </div>
                      <div class="bg-gray-200 p-3 rounded-lg inline-block text-sm">
                          {{ $message->message }}
                      </div>
                  </div>
              </div>
          @endif
      @empty
          <div class="text-center text-gray-500">まだメッセージがありません。</div>
      @endforelse
  </div>

  <!-- メッセージ送信フォーム -->
  <div href="#latest-message" class="text-gray-700 p-3 rounded-full flex items-center justify-center">
      <form action="{{ route('chat.send') }}" method="POST" class="flex w-full">
          @csrf
          <input type="hidden" name="chat_id" value="{{ $chat->id }}">
          <textarea name="message" rows="2" class="w-full border-gray-300 rounded-md" placeholder="メッセージを入力してください"></textarea>
          <button type="submit" class="mt-2 px-4 py-2 w-20 bg-gray-500 text-white rounded">送信</button>
      </form>
  </div>

  <!-- 最新メッセージへ移動 -->
  <a href="#latest-message"
      class="fixed bottom-6 right-0 bg-gray-500 text-white p-4 rounded-full shadow-lg hover:bg-gray-600 flex items-center justify-center h-16 w-16">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
  </a>
</x-body-common>
