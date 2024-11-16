<x-body-common :title="'MY POST'">
    <body>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="max-w-3xl mx-auto ">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div >
                <div class="w-full flex flex-col">
                    <label for="description" class="font-semibold mt-4">投稿</label>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    <textarea name="content" class="w-auto py-2 border border-gray-300 rounded-md" id="description" cols="30" rows="5" placeholder="投稿する">{{ old('content') }}</textarea>
                    
                    <!-- チェックボックスとラベルを水平配置 -->
                    <label class="mt-4 flex items-center">
                        <input type="checkbox" name="anonymity" value="1" class="mr-2"> 匿名で投稿する
                    </label>
                </div>
                
            </div>
            <x-primary-button class="mt-4 mb-4 mx-4">
                送信する
            </x-primary-button>
        </form>
    </div>
    </body>
</x-body-common>

