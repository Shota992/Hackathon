<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          投稿一覧
      </h2>
  </x-slot>

  <body>
      {{-- @if (session('success'))
          <x-alert :message="session('success')" />
      @endif --}}

      <div class="flex max-w-4xl mx-auto px-6 py-8">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
              {{-- @foreach ($articles as $article) --}}

              <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden flex flex-col justify-between">
                  <a href="">
                      <div class="p-3">
                          <h3 class="text-lg font-semibold py-1">タイトル１</h3>
                          <div>
                              <p class="text-xs text-gray-600 py-3">2024/11/15</p>
                              <p class="text-gray-700 text-sm pb-2">
                                  最近、自分の言いたいことがうまく伝わらず、誤解を招くことが多いです。本当は相手に寄り添いたいのに、言葉足らずや説明不足で距離を感じる瞬間が増え、どう改善すればいいのか悩んでいます。
                              </p>
                          </div>
                      </div>
                  </a>
                  {{-- @if (Auth::id() === $article->user_id) --}}
                  <div class="flex justify-end bg-gray-300 px-3 py-2">
                      <a href="">
                          <x-secondary-button>
                              編集
                          </x-secondary-button>
                      </a>
                  </div>
                  {{-- @endif --}}
              </div>
              
              {{-- @endforeach --}}
          </div>
      </div>
  </body>
</x-app-layout>
