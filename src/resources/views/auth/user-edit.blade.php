<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User Information') }}
        </h2>
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
                            <x-input-label for="generation" :value="__('Generation')" />
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
                            <x-input-label for="target" :value="__('Target')" />
                            <x-text-input id="target" class="block mt-1 w-full" type="text" name="target"
                                :value="$user->target" required />
                            <x-input-error :messages="$errors->get('target')" class="mt-2" />
                        </div>

                        <!-- Icon Image -->
                        <div class="mt-4">
                            <x-input-label for="icon_image" :value="__('Icon Image')" />
                            <input id="icon_image" class="block mt-1 w-full" type="file" name="icon_image"
                                accept="image/*" />

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
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
