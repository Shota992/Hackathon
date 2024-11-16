<x-body-common :title="'CHAT DETAIL'">
                    <a href="#top" class="fixed top-20  left-20 flex items-stretch gap-4 bg-white shadow-md p-4 -m-8 ">
                        <img src="{{ asset('images/megaphon.svg') }}" alt="Megaphon" class="h-8 w-8">
                    </a>
                    <div class="fixed flex flex-stretch items-center gap-4 bg-white w-full shadow-md  p-4 -m-8 z-20">
                        <p>
                            {{ \Illuminate\Support\Str::limit($posting->content, 20, '...') }}
                        </p>
                    </div>
                    <div class="flex justify-end mb-4 z-30">
                        <form action="{{ route('chat.toggle-anonymity', $posting->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-4 py-2 bg-gray-500 text-white rounded">
                                @if ($posting->anonymity == 1)
                                    実名公開
                                @else
                                    匿名にもどす
                                @endif
                            </button>
                        </form>
                    </div>

                    <!-- 投稿内容 -->
                        <div class="flex flex-col gap-6 mb-12 mt-12" id=top>
                            @if ($posting->anonymity == 1)
                                <div class="flex items-center gap-4 bg-gray-200 w-full shadow-md mt-4 ml-4 p-4">
                                    <div class="flex justify-end text-sm">
                                        {{ $posting->created_at->format('Y/m/d') }}
                                    </div>
                                    <img src="{{ asset('images/who.png') }}" alt="Anonymous Icon" class="object-cover w-12 h-12">
                                    <div class="gap-4 w-full">
                                        <div class="font-bold">
                                            匿名
                                        </div>
                                        <div class="">{{ $posting->content }}</div>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center gap-4 bg-gray-200 w-full shadow-md mt-4 ml-4 p-4">
                                    <div class="flex justify-end text-sm">
                                        {{ $posting->created_at->format('Y/m/d') }}
                                    </div>
                                    <div class="bg-gray-300 w-12 h-12 rounded-full flex-none overflow-hidden">
                                        <img src="{{ route('user.icon', $posting->user->icon_image) }}" alt="User Icon" class="object-cover w-12 h-12">
                                    </div>
                                    <div class="gap-4 w-full">
                                        <div class="font-bold">
                                            {{ $posting->user->name }}
                                        </div>
                                        <div class="">{{ $posting->content }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
    
                        <!-- チャット参加者 -->
                        <div class="flex gap-4 bg-gray-100 w-full shadow-md mt-4 ml-4 p-4">
                            <div class="w-full">
                                <h3 class="font-bold">チャット参加者</h3>
                                @if ($posting->anonymity == 1)
                                    <li>投稿者：匿名</li>
                                    <li>リスナー: {{ $chatUser->listenerUser->name }}</li>
                                @else
                                    <li>投稿者：{{ $posting->user->name }}</li>
                                    <li>リスナー: {{ $chatUser->listenerUser->name }}</li>
                                @endif
                            </div>
                        </div>
    
                        <!-- メッセージ一覧 -->
                        <div id="messages" class="flex flex-col gap-4 mt-8 ">
                            <h3 class="font-bold text-lg">メッセージ一覧</h3>
                            @forelse ($messages as $message)
                                <div
                                    id="{{ $loop->last ? 'latest-message' : '' }}" 
                                    class="flex items-center gap-4 p-4
                                    @if ($message->is_mine) justify-end text-right @else justify-start @endif bg-gray-100 w-full shadow-md">
                                    @if (!$message->is_mine)
                                        <!-- 他人のメッセージ -->
                                        <div class="bg-gray-300 w-12 h-12 rounded-full flex-none overflow-hidden">
                                            <img src="{{ route('user.icon', $chatUser->listenerUser->icon_image) }}" alt="User Icon" class="object-cover w-12 h-12">
                                        </div>
                                        <div class="w-full">
                                            <div class="font-bold">
                                                {{ $chatUser->listenerUser->name }}
                                                <span class="text-sm text-gray-500">({{ $message->created_at->format('Y/m/d H:i') }})</span>
                                            </div>
                                            <div>{{ $message->message }}</div>
                                        </div>
                                    @else
                                        @if ($posting->anonymity == 1)
                                            <div class="w-full">
                                                <div class="font-bold">
                                                    <span class="text-sm text-gray-500">({{ $message->created_at->format('Y/m/d H:i') }})</span>
                                                        匿名
                                                </div>
                                                <div>{{ $message->message }}</div>
                                            </div>
                                            <img src="{{ asset('images/who.png') }}" alt="Anonymous Icon" class="object-cover w-12 h-12">
                                        @else
                                            <div class="w-full">
                                                <div class="font-bold">
                                                    <span class="text-sm text-gray-500">({{ $message->created_at->format('Y/m/d H:i') }})</span>
                                                    {{ $posting->user->name }}
                                                </div>
                                                <div>{{ $message->message }}</div>
                                            </div>
                                            <div class="bg-gray-300 w-12 h-12 rounded-full flex-none overflow-hidden">
                                                <img src="{{ route('user.icon', $posting->user->icon_image) }}" alt="User Icon" class="object-cover w-12 h-12">
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            @empty
                                <div class="text-center text-gray-500">まだメッセージがありません。</div>
                            @endforelse
    
                            <div href="#latest-message" class="  text-white p-3 rounded-full flex items-center justify-center">
                                <form action="{{ route('chat.send') }}" method="POST" class="flex w-full">
                                    @csrf
                                    <input type="hidden" name="chat_id" value="{{ $chat->id }}">
                                    <textarea name="message" rows="2" class="w-full border-gray-300 rounded-md" placeholder="メッセージを入力してください"></textarea>
                                    <button type="submit" class="mt-2 px-4 py-2 w-20 bg-gray-500 text-white rounded">送信</button>
                                </form>
                            </div>

                        </div>
                    <a href="#latest-message" class="fixed bottom-6 right-0 bg-gray-500 text-white p-4 rounded-full shadow-lg hover:bg-gray-600 flex items-center justify-center h-16 w-16">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
</x-body-common>


