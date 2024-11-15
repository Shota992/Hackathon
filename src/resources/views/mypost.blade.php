<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen w-screen overflow-hidden">
    <main class="flex">
        <!-- サイドバーをコンポーネントとして呼び出す -->
        <x-sidebar username="POSSE太郎" goal="達成する目標を記述" />
        <!-- メインコンテンツ -->
        <div class="main w-full bg-white h-screen pt-16 px-20 pb-20">
            <x-main pagename="MY POST">
                <div class="flex flex-col gap-6 mb-12 ">
                    <div class="flex flex-col gap-4 post-card bg-gray-200 w-full shadow-md  mt-4 ml-4 pl-4 pr-4 pb-8">
                        <div>
                            <div class="flex justify-end">2024/11/14</div>
                            <div class="flex items-center gap-4">
                                <div class="bg-yellow-300 w-8 h-8 rounded-full "></div>
                                <div>POSSE太郎</div>
                            </div>
                            <div class="ml-12 mt-4">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>aaaaaaaaaaaaaaaaaa</div>
                        </div>
                        <div class="flex flex-col ml-32 gap-4 rounded">
                            <!-- 吹き出し1 -->
                            <div class="relative flex gap-4 bg-white p-4 rounded-lg shadow">
                                <a href="./" class="text-blue-600">4.0 AAAさん</a>
                                <p>aaaaaaaaaaaaaaaaaaa</p>
                            </div>
                            <!-- 吹き出し2 -->
                            <div class="relative flex gap-4 bg-white p-4 rounded-lg shadow">
                                <a href="./" class="text-blue-600">4.0 BBBさん</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-center mt-8 mb-20 ">
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
</html>
