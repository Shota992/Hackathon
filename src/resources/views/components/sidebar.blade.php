<div class="side w-60 bg-cyan-800 h-screen p-6 pt-8 text-white fixed">
  <div class="flex flex-col gap-12">
      <div class="flex flex-col gap-4">
          <div class="w-24">
              <img src="{{ asset('images/title_icon_white.png') }}" alt="CoreConnect">
          </div>
          <div class="flex gap-6 items-center">
              <div class="bg-green-400 w-8 h-8 rounded-full"></div>
              <p class="text-xl">{{ $user->name ?? 'ゲスト' }} さん</p>
          </div>
          <div>
              <p>目標：</p>
              <p>{{ $user->target ?? '目標が設定されていません' }}</p>
          </div>
      </div>
      <ul class="flex flex-col gap-3 text-xl pl-4">
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
