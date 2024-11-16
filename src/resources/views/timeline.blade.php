<x-body-common :title="'TIMELINE'">
  <div class="flex flex-col gap-6 mb-12">
      @foreach ($posts as $post)
          <div class="flex flex-col gap-4 post-card bg-white w-full shadow-md px-6 pt-4 pb-8">
              <div>
                  <div class="flex justify-end text-xs">{{ $post->created_at->format('Y/m/d') }}</div>
                  <div class="flex items-center gap-4">
                      @if ($post->anonymity == 1 && $post->user_id === Auth::id())
                          {{-- 自分の投稿かつ匿名の場合 --}}
                          <div class="w-8 h-8 rounded-full overflow-hidden">
                              <img src="{{ asset('images/who.png') }}" alt="Anonymous Icon"
                                  class="object-cover w-full h-full">
                          </div>
                          <div>{{ Auth::user()->name }} (匿名)</div>
                      @elseif ($post->anonymity == 1)
                          {{-- 他人の匿名投稿 --}}
                          <div class="w-8 h-8 rounded-full overflow-hidden">
                              <img src="{{ asset('images/who.png') }}" alt="Anonymous Icon"
                                  class="object-cover w-full h-full">
                          </div>
                          <div>匿名</div>
                      @else
                          {{-- 実名の場合 --}}
                          @if ($post->user->icon_image)
                              <div class="mt-2">
                                  <img src="{{ route('user.icon', $post->user->icon_image) }}"
                                      alt="User Icon" class="w-8 h-8 rounded-full object-cover">
                              </div>
                          @else
                              <div class="mt-2">
                                  <img src="{{ asset('images/defaltIcon.png') }}" alt="User Icon"
                                      class="w-8 h-8 rounded-full">
                              </div>
                          @endif
                          <div>{{ $post->user->name }}</div>
                      @endif
                  </div>
                  <div class="ml-12 mt-4">{{ $post->content }}</div>
                  
                  {{-- コメントするボタン --}}
                  @if ($post->user_id !== Auth::id())
                      <form action="{{ route('chat.create') }}" method="POST" class="flex justify-end text-sm pr-4">
                          @csrf
                          <input type="hidden" name="posting_id" value="{{ $post->id }}">
                          <x-primary-button class="text-xs px-3 py-1">コメントする</x-primary-button>
                      </form>
                  @endif
              </div>
          </div>
      @endforeach
  </div>

  {{-- ページネーション --}}
  <x-pagination :paginator="$posts" />
</x-body-common>
