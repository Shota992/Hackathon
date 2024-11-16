<x-app-layout>
  <body class="h-screen w-screen overflow-hidden">
      <main class="flex">
          <x-sidebar username="{{ Auth::user()->name }}" goal="達成する目標を記述" />

          <div class="main w-full bg-white h-screen pt-16 px-20 pb-20">
              <x-main pagename="CHAT DETAIL">
                  <div class="flex flex-col gap-6 mb-12">
                      <!-- 投稿内容 -->
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
                  </div>
              </x-main>
          </div>
      </main>
  </body>
</x-app-layout>
