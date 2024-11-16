<x-body-common :title="'MYPOST'">
    @foreach ($posts as $post)
    <div>
        <div>
            <div class="flex justify-end">{{ $post->created_at }}</div>
            <div class="flex items-center gap-4">
                <div class="bg-yellow-300 w-8 h-8 rounded-full "></div>
                <div>{{ $memo->content }}</div>
            </div>
            <div class="ml-12 mt-4">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>aaaaaaaaaaaaaaaaaa</div>
        </div>
        <div class="flex flex-col ml-32 gap-4 rounded">
            <!-- 吹き出し1 -->
            <div class="relative flex gap-4 bg-white p-4 rounded-lg shadow">
                <a href="./" class="text-blue-600">4.0 AAAさん</a>
                <p>aaaaaaaaaaaaaasssaaaaa</p>
            </div>
            <!-- 吹き出し2 -->
            <div class="relative flex gap-4 bg-white p-4 rounded-lg shadow">
                <a href="./" class="text-blue-600">4.0 BBBさん</a>
            </div>
        </div>
    </div>
    @endforeach
    {{-- <x-pagination :paginator="$posts" /> --}}
</x-body-common>

