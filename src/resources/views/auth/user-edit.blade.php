<x-app-layout>
    <x-slot name="header">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 7.066 5.652a1 1 0 1 0-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 1 0 1.414 1.414L10 11.414l2.934 2.934a1 1 0 0 0 1.414-1.414L11.414 10l2.934-2.934a1 1 0 0 0 0-1.414z" />
                    </svg>
                </span>
            </div>
        @endif
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-gray-100 py-4 px-6 shadow-md rounded-md">
            {{ __('プロフィール編集') }}

    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('user.updateProfile', $user->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Generation -->
                        <div class="mt-4">
                            <x-input-label for="generation" :value="__('期生')" />
                            <select id="generation" name="generation"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>
                                @for ($i = 3.0; $i <= 7.0; $i += 0.5)
                                    <option value="{{ $i }}" {{ $user->generation == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <x-input-error :messages="$errors->get('generation')" class="mt-2" />
                        </div>

                        <!-- Target -->
                        <div class="mt-4">
                            <x-input-label for="target" :value="__('目標')" />
                            <x-text-input id="target" class="block mt-1 w-full" type="text" name="target"
                                :value="$user->target" required />
                            <x-input-error :messages="$errors->get('target')" class="mt-2" />
                        </div>

                        <!-- Icon Image -->
                        <div class="mt-4">
                            <x-input-label for="icon_image" :value="__('アイコン画像')" />
                            <input id="icon_image" class="hidden" type="file" name="icon_image" accept="image/*" />

                            <label for="icon_image"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full border py-2 px-3">
                                写真をアップロード
                            </label>

                            @if ($user->icon_image)
                                <div class="mt-2">
                                    <img src="{{ route('user.icon', $user->icon_image) }}" alt="User Icon"
                                        class="w-20 h-20 rounded-full">
                                </div>
                            @endif

                            <x-input-error :messages="$errors->get('icon_image')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('更新する') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
