<div class="side w-96 !bg-red-700 h-screen p-4 text-white">
    <div class="flex flex-col gap-12">
        <div class="flex flex-col gap-4">
            <div class="flex gap-6 items-center">
                <div class="bg-green-400 w-8 h-8 rounded-full"></div>
                <p class="text-2xl">{{ Auth::user()->name ?? 'ゲスト' }}</p>
            </div>
            <div>
                <p>目標：</p>
                <p>{{ Auth::user()->target ?? '目標が設定されていません' }}</p>
            </div>
        </div>
        <ul class="flex flex-col gap-3 text-2xl">
            <li><a href="#" class="hover:underline">TIMELINE</a></li>
            <li><a href="#" class="hover:underline">MY POST</a></li>
            <li><a href="#" class="hover:underline">CHAT</a></li>
            <li><a href="#" class="hover:underline">MEMO</a></li>
            <li><a href="#" class="hover:underline">FRIENDS</a></li>
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
