<x-body-common :title="'CHAT'">
                    <div class="flex flex-col gap-6 mb-12">
                        @forelse ($chats as $chat)
                            <a href="{{ route('chat.show', $chat->id)}}">
                                <div class="flex items-center gap-4 bg-gray-200 w-full shadow-md mt-4 ml-4 p-4">
                                    <div class="flex justify-end text-sm">
                                        {{ $chat->posting->created_at->format('Y/m/d') }}
                                    </div>
                                    <div class="bg-yellow-300 w-12 h-12 rounded-full flex-none"></div>
                                    <div class="gap-4 w-full">
                                        <div class="font-bold">
                                            {{ $chat->posting->user->name }}
                                        </div>
                                        <div class="">
                                            {{ $chat->posting->content }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="text-center text-gray-500">関連するチャットがありません。</div>
                        @endforelse
                    </div>
                <x-pagination :paginator="$chats" />
</x-body-common>
