<x-app-layout>
<body class="h-screen w-screen overflow-hidden">
    <main class="flex">
        <!-- サイドバーをコンポーネントとして呼び出す -->
        <x-sidebar username="POSSE太郎" goal="達成する目標を記述" />

        <!-- メインコンテンツ -->
        <div class="main w-full bg-white h-screen pt-16 px-20 pb-20">
            <h2 class="text-xl  mb-4 border-b-2 ">Memo Create</h2>
            <div class=" w-full h-full bg-red-200 p-8 ">
                {{-- <div action="{{ route('memo.store') }}" method="POST"> --}}
                <form>
                    @csrf
                    <div class="space-y-6">
                        <!-- タイトルフィールド -->
                        <div>
                            <label for="title" class="block text-lg font-semibold">タイトル</label>
                            <input type="text" name="title" id="title" class="w-full p-2 border rounded-md" placeholder="メモのタイトルを入力" required>
                        </div>
                        <!-- メモフィールド -->
                        <div>
                            <label for="memo" class="block text-lg font-semibold">メモ</label>
                            <textarea name="memo" id="memo" rows="6" class="w-full p-2 border rounded-md" placeholder="メモの内容を入力" maxlength="1000" required></textarea>
                            <p class="text-right text-sm text-gray-500">最大文字数: 1000</p>
                        </div>

                        <!-- 投稿ボタン -->
                        <div>
                            <button type="submit" class="px-6 py-2 bg-gray-700 text-white rounded hover:bg-gray-800">
                                投稿
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</x-app-layout >
