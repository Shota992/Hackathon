<x-body-common :title="'メモを編集'">
    <div class="max-w-4xl mx-auto px-6 py-8 bg-white shadow-md rounded">
        <form action="{{ route('memo.update', $memo->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-6">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">タイトル</label>
                <input type="text" id="title" name="title" value="{{ old('title', $memo->title) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">内容</label>
                <textarea id="content" name="content" rows="5"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">{{ old('content', $memo->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <x-secondary-button type="submit">更新する</x-secondary-button>
            </div>
        </form>
    </div>
</x-body-common>
