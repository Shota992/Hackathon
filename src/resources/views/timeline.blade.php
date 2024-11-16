<x-app-layout>

    <main class="flex">
    <x-sidebar  :name="Auth::user()->name" :target="Auth::user()->target" />

    <div class="main w-full bg-white h-screen pt-16 px-20 pb-20">
        <h2 class="text-xl mb-4 border-b-2 font-adamina">TIMELINE</h2>
        <div class="w-full h-full bg-red-200 p-8 overflow-y-auto">
            <div class="flex flex-col gap-6 mb-12">
                @foreach ($posts as $post)
                    <div class="flex flex-col gap-4 post-card bg-gray-200 w-full shadow-md mt-4 ml-4 pl-4 pr-4 pb-8">
                        <div>
                            <div class="flex justify-end">{{ $post->created_at->format('Y/m/d') }}</div>
                            <div class="flex items-center gap-4">
                                <div class="bg-yellow-300 w-8 h-8 rounded-full"></div>
                                <div>{{ $post->user->name }}</div>
                            </div>
                            <div class="ml-12 mt-4">{{ $post->content }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                <div class="flex justify-center mt-8 mb-20">
                    <ul class="flex gap-4">
                        <li><a href="#" class="px-4 py-2 bg-gray-700 text-white rounded">1</a></li>
                        <li><a href="#" class="px-4 py-2 bg-gray-200 rounded">2</a></li>
                        <li><a href="#" class="px-4 py-2 bg-gray-200 rounded">3</a></li>
                        <li><a href="#" class="px-4 py-2 bg-gray-200 rounded">4</a></li>
                        <li><a href="#" class="px-4 py-2 bg-gray-200 rounded">5</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </main>
</x-app-layout>
