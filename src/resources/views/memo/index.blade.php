<x-app-layout>
    <!-- サイドバーを追加 -->
    <x-sidebar :user="$user" />
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メモ一覧
        </h2>
    </x-slot> --}}

    <body>

        

        <div class="flex max-w-4xl mx-auto px-6 py-8">
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
                    {{-- @if (Auth::id() === $article->user_id) --}}
                    <div class="flex justify-end bg-gray-300 px-3 py-2">
                        <a href="">
                            <form action="{{ route('memo.softDelete', $memo->id) }}" method="POST">
                                @csrf
                                <x-secondary-button>
                                    削除
                                </x-secondary-button>
                            </form>
                        </a>
                        {{-- @if (Auth::id() === $article->user_id) --}}
                        <div class="flex justify-end bg-gray-300 px-3 py-2">
                            <a href="">
                                <x-secondary-button>
                                    編集
                                </x-secondary-button>
                            </a>
                        </div>
                        {{-- @endif --}}
                    </div>

                    {{-- @endforeach --}}
                </div>
                @endforeach

            </div>
        </div>
    </body>
</x-app-layout>
