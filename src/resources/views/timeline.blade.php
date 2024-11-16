<x-app-layout>
    <body class="h-screen w-screen overflow-hidden">
        <main class="flex">
            <!-- サイドバーをコンポーネントとして呼び出す -->
            <x-sidebar username="POSSE太郎" goal="達成する目標を記述" />

            <!-- メインコンテンツ -->
            <div class="main w-full bg-white h-screen pt-16 px-20 pb-20">
                <x-main pagename="TIMELINE">
                    <div class="flex flex-col gap-6 mb-12">
                        <!-- 投稿1 -->
                        <div class="flex flex-col gap-4 post-card bg-gray-200 w-full shadow-md mt-4 ml-4 pl-4 pr-4 pb-8">
                            <div>
                                <div class="flex justify-end">2024/11/14</div>
                                <div class="flex items-center gap-4">
                                    <div class="bg-yellow-300 w-8 h-8 rounded-full"></div>
                                    <div>POSSE太郎</div>
                                </div>
                                <div class="ml-12 mt-4">投稿の内容をここに記述します。</div>
                            </div>
                        </div>
                        <!-- 投稿2 -->
                        <div class="flex flex-col gap-4 post-card bg-white w-full shadow-md mt-4 ml-4 pl-4 pr-4 pb-8">
                            <div>
                                <div class="flex justify-end">2024/11/14</div>
                                <div class="flex items-center gap-4">
                                    <div class="bg-yellow-300 w-8 h-8 rounded-full"></div>
                                    <div>POSSE太郎</div>
                                </div>
                                <div class="ml-12 mt-4">投稿の内容をここに記述します。</div>
                            </div>
                            <div class="ml-12">
                                <textarea type="text" placeholder="リクエストメッセージ" class="w-5/6 p-2 border text-sm outline-none bg-gray-100" rows="3"></textarea>
                                <button class="ml-2 bg-gray-500 hover:bg-gray-600 text-white p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
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
                </x-main>
            </div>
        </main>
    </body>
</x-app-layout>
