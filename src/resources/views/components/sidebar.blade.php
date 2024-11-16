<div class="side w-96 bg-red-700 h-auto p-4 text-white">
    <div class="flex flex-col gap-12">
        <div class="flex flex-col gap-4">
            <div class="flex gap-6 items-center">
                <div class="bg-green-400 w-8 h-8 rounded-full"></div>
                <p class="text-2xl">{{ $username }}</p>
            </div>
            <div>
                <p>目標：</p>
                <p>{{ $goal }}</p>
            </div>
        </div>
        <ul class="flex flex-col gap-3 text-2xl">
            <li><a href="#">TIMELINE</a></li>
            <li><a href="#">MY POST</a></li>
            <li><a href="#">CHAT</a></li>
            <li><a href="#">MEMO</a></li>
            <li><a href="#">FRIENDS</a></li>
            <li><a href="#">LOGOUT</a></li>
        </ul>
    </div>
</div>
