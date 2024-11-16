<x-app-layout>
    <body>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight m-4">
        新規投稿登録画面
    </h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="max-w-3xl mx-auto px-6">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="description" class="font-semibold mt-4">投稿</label>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    <textarea name="description" class="w-auto py-2 border border-gray-300 rounded-md" id="description" cols="30" rows="5" placeholder="投稿する">{{ old('description') }}</textarea>
                </div>
            </div>
            <x-primary-button class="mt-4 mb-4 mx-4">
                送信する
            </x-primary-button>
        </form>
    </div>
    </body>
</x-app-layout>
