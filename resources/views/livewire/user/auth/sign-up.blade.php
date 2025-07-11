<div class="grid lg:grid-cols-2">
    <div class="hidden lg:block">
        <img src="/images/chatbot.jpeg" alt="Register" class="w-full h-full object-cover">
    </div>
    <div class="bg-white py-24 px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create Account</h2>

<form wire:submit.prevent="register" enctype="multipart/form-data">
    <div wire:loading wire:target="register" class="mt-2 text-blue-600">
        <x-ui.loader class="w-6 h-6 mx-auto" />
    </div>

    <x-form.input name="matric_no" label="Matric No" wire:model="matric_no" placeholder="H/CS/23/0933" />

    <x-form.input name="name" label="Full Name" wire:model="name" placeholder="John Doe" />

    <x-form.input name="email" type="email" label="Email Address" wire:model="email"
        placeholder="john@example.com" />

    <x-form.password-input name="password" type="password" label="Password" wire:model="password"
        placeholder="••••••••" showPasswordToggle="true" />

    <x-form.password-input name="password_confirmation" type="password" label="Confirm Password"
        wire:model="password_confirmation" placeholder="••••••••" showPasswordToggle="true" />
<div class="mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
        Upload file
    </label>
    <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
               dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        id="file_input"
        type="file"
        wire:model="avatar"
    >
    @error('avatar')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror

            @if ($avatar)
                <img src="{{ $avatar->temporaryUrl() }}" class="mt-2 h-20 rounded" alt="Preview">
            @endif
</div>


    <div class="flex items-center mb-1">
        <input id="terms" name="terms" type="checkbox" wire:model.lazy="terms"
            class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
        <label for="terms" class="ml-2 block text-sm text-gray-900">
            I accept the <a href="#" class="text-indigo-600 hover:underline">Terms and Conditions</a>
        </label>
    </div>

    @error('terms')
    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror

    <x-ui.button type="submit" variant="primary" class="w-full mt-2">
        Register
    </x-ui.button>

    <div class="mt-4 text-center">
        <p class="text-gray-600 text-base">
            Already have an account?
            <a href="#" wire:navigate class="text-indigo-600 hover:underline">Sign in</a>
        </p>
    </div>
</form>
    </div>
</div>
