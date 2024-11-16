<x-body-common :title="'CHAT'">
    <div class="flex flex-col gap-6 mb-12">
        @forelse ($chats as $chat)
            <a href="{{ route('chat.show', $chat->id) }}">
                <div class="flex items-center gap-4 bg-gray-200 w-full shadow-md mt-4 ml-4 p-4">
                    <div class="flex justify-end text-xs">
                        最終更新日：
                        {{ $chat->posting->created_at->format('Y/m/d') }}
                    </div>
                    {{-- アイコンと名前の表示 --}}
                    @if ($chat->posting->anonymity == 1)
                        {{-- 匿名の場合 --}}
                        <div class="w-12 h-12 rounded-full overflow-hidden flex-none">
                            <img src="{{ asset('images/who.png') }}" alt="Anonymous Icon"
                                class="object-cover w-full h-full">
                        </div>
                        <div class="gap-4 w-full">
                            <div class="font-bold">匿名</div>
                        </div>
                    @else
                        {{-- 実名の場合 --}}
                        @if ($chat->posting->user->icon_image)
                            <div class="w-12 h-12 rounded-full overflow-hidden flex-none">
                                <img src="{{ route('user.icon', $chat->posting->user->icon_image) }}" alt="User Icon"
                                    class="object-cover w-full h-full">
                            </div>
                        @else
                            <div class="w-12 h-12 rounded-full overflow-hidden flex-none">
                                <img src="{{ asset('images/defaltIcon.png') }}" alt="Default Icon"
                                    class="object-cover w-full h-full">
                            </div>
                        @endif
                        <div class="gap-4 w-full">
                            <div class="font-bold">
                                {{ $chat->posting->user->name }}
                            </div>
                        </div>
                    @endif
                    {{-- 投稿内容 --}}
                    <div class="">
                        {{ $chat->posting->content }}
                    </div>
                </div>
            </a>
        @empty
            <div class="text-center text-gray-500">関連するチャットがありません。</div>
        @endforelse
    </div>
    <x-pagination :paginator="$chats" />
</x-body-common>
