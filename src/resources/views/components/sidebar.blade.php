<div class="side w-60 bg-cyan-800 h-screen p-6 pt-8 text-white fixed">
    <div class="flex flex-col gap-12">
        <div class="flex flex-col gap-4">
            <div class="w-24">
                <img src="{{ asset('images/title_icon_white.png') }}" alt="CoreConnect">
            </div>
            <div class="grid grid-cols-[25%,75%] items-center">
                @if (isset($user) && $user->icon_image)
                    <div class="mt-2">
                        <img src="{{ route('user.icon', $user->icon_image) }}" alt="User Icon"
                            class="w-10 h-10 rounded-full">
                    </div>
                @else
                    <div class="w-9 h-9 rounded-full overflow-hidden">
                        <img src="{{ asset('images/who.png') }}" alt="User Icon" class="object-cover w-full h-full">
                    </div>
                @endif
                <p class="text-xl">{{ $user->name ?? 'ゲスト' }} さん</p>
            </div>
            <div>
                <p>目標：</p>
                <p>{{ $user->target ?? '目標が設定されていません' }}</p>
            </div>
        </div>
        <ul class="flex flex-col gap-3 text-xl pl-4">
            <li><a href="{{ route('timeline')}} " class="hover:underline">TIMELINE</a></li>
            <li><a href="{{ route('mypost')}} " class="hover:underline">MY POST</a></li>
            <li><a href="{{ route('chat.index')}} " class="hover:underline">CHAT</a></li>
            <li><a href="{{ route('memo.index')}} " class="hover:underline">MEMO</a></li>
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
