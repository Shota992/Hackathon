<x-app-layout>
    <main class="flex">
        <x-sidebar :user="Auth::user()" />

        <div class="main w-full bg-white h-screen ml-60 pt-10 px-12 pb-20">
            <h2 class="text-2xl mb-4 border-b-2 font-adamina">{{ $title }}</h2>
            <div class="px-8">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <div class="w-full h-full bg-gray-200 p-10 overflow-y-auto">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
