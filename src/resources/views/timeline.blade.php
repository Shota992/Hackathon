<x-app-layout>
  <main class="flex">
      <x-sidebar :user="$user" />
      
      <div class="main w-full bg-white h-screen ml-60 pt-10 px-12 pb-20">
          <h2 class="text-2xl mb-4 border-b-2 font-adamina">TIMELINE</h2>
          <div class="px-8">
              <div class="w-full h-full bg-gray-200 p-10 overflow-y-auto">
                  <div class="flex flex-col gap-6 mb-12">
                      @foreach ($posts as $post)
                          <div class="flex flex-col gap-4 post-card bg-white w-full shadow-md px-6 pt-4 pb-8">
                              <div>
                                  <div class="flex justify-end text-xs">{{ $post->created_at->format('Y/m/d') }}</div>
                                  <div class="flex items-center gap-4">
                                      <div class="bg-yellow-300 w-8 h-8 rounded-full"></div>
                                      <div>{{ $post->user->name }}</div>
                                  </div>
                                  <div class="ml-12 mt-4">{{ $post->content }}</div>
                              </div>
                          </div>
                      @endforeach
                  </div>

                  {{-- ページネーション --}}
                  <x-pagination :paginator="$posts" />
                  
              </div>
          </div>
      </div>
  </main>
</x-app-layout>
