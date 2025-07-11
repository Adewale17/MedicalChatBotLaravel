<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow space-y-6">
    <h2 class="text-2xl font-bold text-gray-800">🩺 Create New Doctor</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border text-green-700 p-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">

        <div>
            <label class="block text-sm font-medium text-gray-700">Full Name</label>
            <input wire:model="name" type="text" class="w-full border-gray-300 rounded" />
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input wire:model="email" type="email" class="w-full border-gray-300 rounded" />
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input wire:model="password" type="password" class="w-full border-gray-300 rounded" />
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Avatar</label>
            <input wire:model="avatar" type="file" class="w-full" />
            @error('avatar') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            @if ($avatar)
                <img src="{{ $avatar->temporaryUrl() }}" class="mt-2 h-20 rounded" alt="Preview">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Create Doctor
        </button>

    </form>
</div>
