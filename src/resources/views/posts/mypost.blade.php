<x-body-common :title="'MYPOST'">
  @foreach ($posts as $post)
      <div class="bg-gray-100 p-4 mb-2 pr-6">
          <div>
              <div class="flex justify-end text-xs">{{ $post->created_at->format('Y/m/d') }}</div>
              <div class="flex items-center gap-4">
                  <div class="bg-gray-300 w-8 h-8 rounded-full overflow-hidden">
                      @if ($user->icon_image)
                          <img src="{{ route('user.icon', $user->icon_image) }}" alt="User Icon"
                              class="object-cover w-8 h-8">
                      @else
                          <img src="{{ asset('images/defaultIcon.png') }}" alt="Default Icon"
                              class="object-cover w-8 h-8">
                      @endif
                  </div>
                  <div class="font-bold text-sm text-gray-500">{{ $user->name }}</div>
              </div>
              <div class="ml-16 mt-2 mr-10 text-sm">{{ $post->content }}</div>
          </div>
          <div class="flex flex-col ml-32 mt-2 gap-3 rounded">
              @php
                  // $post->chats から最新の2件のメッセージを取得
                  $latestMessages = $post->chats
                      ->flatMap(function ($chat) {
                          return $chat->messages;
                      })
                      ->sortByDesc('updated_at')
                      ->take(2);
              @endphp

              @foreach ($latestMessages as $message)
                  <div class="relative flex gap-2 bg-white p-3 rounded-lg shadow text-xs">
                      <a href="#" class="text-cyan-700">発言者：{{ $message->sender->name }}</a>
                      <p>{{ $message->message }}</p>
                  </div>
              @endforeach
          </div>
      </div>
  @endforeach
  <x-pagination :paginator="$page" />
</x-body-common>
