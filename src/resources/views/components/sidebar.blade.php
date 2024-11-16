<div class="side w-60 bg-cyan-800 h-screen p-6 pt-8 text-white fixed">
    <div class="flex flex-col gap-12">
        <div class="flex flex-col gap-4">
            <div class="w-24">
                <img src="{{ asset('images/title_icon_white.png') }}" alt="CoreConnect">
            </div>
            @if (isset($user))
                <a href="{{ route('user.editProfile', ['id' => $user->id]) }}" class="flex flex-col gap-4">
                    <div class="grid grid-cols-[25%,75%] items-center">
                        @if ($user->icon_image)
                            <div class="mt-2">
                                <img src="{{ route('user.icon', $user->icon_image) }}" alt="User Icon"
                                    class="w-10 h-10 rounded-full">
                            </div>
                        @else
                            <div class="mt-2">
                                <img src="{{ asset('images/defaltIcon.png') }}" alt="User Icon"
                                    class="w-10 h-10 rounded-full">
                            </div>
                        @endif
                        <p class="text-xl">{{ $user->name }} さん</p>
                    </div>
                    <div>
                        <p>目標：</p>
                        <p>{{ $user->target ?? '目標が設定されていません' }}</p>
                    </div>
                </a>
            @else
                <div class="flex flex-col gap-4">
                    <div class="grid grid-cols-[25%,75%] items-center">
                        <div class="mt-2">
                            <img src="{{ asset('images/defaltIcon.png') }}" alt="User Icon"
                                class="w-10 h-10 rounded-full">
                        </div>
                        <p class="text-xl">ゲスト さん</p>
                    </div>
                    <div>
                        <p>目標：</p>
                        <p>目標が設定されていません</p>
                    </div>
                </div>
            @endif
        </div>
        <ul class="flex flex-col gap-3 text-xl pl-4">
            <li><a href="{{ route('timeline') }} " class="hover:underline">TIMELINE</a></li>
            <li><a href="{{ route('mypost') }} " class="hover:underline">MY POST</a></li>
            <li><a href="{{ route('chat.index') }} " class="hover:underline">CHAT</a></li>
            <li><a href="{{ route('memo.index') }} " class="hover:underline">MEMO</a></li>
            {{-- <li><a href="#" class="hover:underline">FRIENDS</a></li> --}}
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="hover:underline">
                    LOGOUT
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
