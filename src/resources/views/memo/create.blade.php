<x-body-common :title="'MEMO CREATE'">

    {{-- <div action="{{ route('memo.store') }}" method="POST"> --}}
    <form method="POST" action="{{ route('memo.store') }}">
        @csrf
        <div class="space-y-6">
            <input type="hidden" id="user_id" name="id" value="{{ $userID }}">
            {{-- <input type="hidden" id="posting_id" name="id" value="{{ $postings->id }}"> --}}

            <!-- タイトルフィールド -->
            <div>
                <label for="title" class="block text-lg font-semibold">タイトル</label>
                <input type="text" name="title" id="title" class="w-full p-2 border rounded-md"
                    placeholder="メモのタイトルを入力" required>
            </div>
            <!-- メモフィールド -->
            <div>
                <label for="memo" class="block text-lg font-semibold">メモ</label>
                <textarea name="content" id="content" rows="6" class="w-full p-2 border rounded-md" placeholder="メモの内容を入力"
                    maxlength="1000" required></textarea>
                <p class="text-right text-sm text-gray-500">最大文字数: 1000</p>
            </div>

            <!-- 投稿ボタン -->
            <div>
                <button type="submit" class="px-6 py-2 bg-gray-700 text-white rounded hover:bg-gray-800">
                    保存
                </button>
            </div>
        </div>
    </form>

</x-body-common>
