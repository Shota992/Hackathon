<x-body-common :title="'MEMO'">
    <div class=" min-h-screen flex flex-col">
        <!-- メモ一覧 -->
        <div class="flex max-w-4xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                @foreach ($memos as $memo)
                    <div class="max-w-md bg-white shadow-lg rounded-lg overflow-hidden flex flex-col justify-between">
                        <a href="">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold py-1">{{ $memo->title }}</h3>
                                <div>
                                    <p class="text-xs text-gray-600 py-3">{{ $memo->created_at }}</p>
                                    <p class="text-gray-700 text-sm p-2 pb-4">
                                        {{ $memo->content }}
                                    </p>
                                </div>
                            </div>
                        </a>
                        <div class="flex justify-end bg-gray-300 px-3 py-2">
                            <div class="flex justify-end bg-gray-300 px-1 py-2">
                                <form action="{{ route('memo.softDelete', $memo->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <x-danger-button type="submit">削除</x-danger-button>
                                </form>
                            </div>
                            <div class="flex justify-end bg-gray-300 px-1 py-2">
                                <a href="{{ route('memo.edit', $memo->id) }}">
                                    <x-secondary-button>編集</x-secondary-button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 右下固定の「作成」ボタン -->
        {{-- <div class="flex-1"></div> <!-- 空白スペースを埋める -->
        <div class="flex justify-end items-end p-6 fixed bottom-6 right-6">
            <a href="{{ route('memo.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full shadow-lg">
                作成
            </a>
        </div> --}}
        <div class="fixed bottom-6 right-6 z-50" style="position: fixed; bottom: 48px; right: 48px;">
            <a href="{{ route('memo.create') }}" 
               class="bg-white hover:bg-gray-100 text-black font-bold py-3 px-6 rounded-full shadow-lg focus:outline-none">
                作成
            </a>
        </div>
    </div>
</x-body-common>


