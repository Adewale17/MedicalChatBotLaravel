<div class="grid lg:grid-cols-2 mt-12">
    <!-- Left Image Section -->
    <div class="hidden lg:block">
        <img src="/images/chatbot.jpeg" alt="Doctor Login" class="w-full h-full object-cover">
    </div>

    <!-- Login Form Section -->
    <div class="bg-white py-24 px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Doctor Login</h2>

        <form wire:submit.prevent="login">
            <!-- Loading Spinner -->
            <div wire:loading wire:target="login" class="mt-2 text-blue-600 text-center">
                <svg class="animate-spin h-6 w-6 text-blue-600 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8v8H4z">
                    </path>
                </svg>
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" wire:model="email" placeholder="john@example.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" wire:model="password" placeholder="••••••••"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center space-x-2 text-sm text-gray-600">
                    <input type="checkbox" wire:model.lazy="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    <span>Remember me</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-700 text-white font-semibold py-2 rounded-md hover:bg-blue-800 transition duration-200">
                Login
            </button>


        </form>
    </div>
</div>
