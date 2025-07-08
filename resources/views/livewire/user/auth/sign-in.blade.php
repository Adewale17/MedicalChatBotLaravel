<div class="grid lg:grid-cols-2">
    <div class="hidden lg:block">
        <img src="/images/chatbot.jpeg" alt="Register" class="w-full h-full object-cover">
    </div>
    <div class=" bg-white py-24 px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login Into Your Account</h2>

        <form wire:submit.prevent="login">
            <div wire:loading wire:target="login" class="mt-2 text-blue-600">
                <x-ui.loader class="w-6 h-6 mx-auto" />
            </div>
            <x-form.input name="email" type="email" label="Email Address" wireModel="email"
                placeholder="john@example.com"  />

            <x-form.password-input name="password" type="password" label="Password" wireModel="password"
                placeholder="••••••••"  showPasswordToggle="true" />
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-start">
                    <div class="flex items-center space-x-2">
                        <input id="remember" name="remember" wire:model.lazy="remember" type="checkbox"
                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                        <label for="remember" class="text-sm text-gray-500 dark:text-gray-300">
                            Remember me
                        </label>
                    </div>
                </div>

                <a href="#" class="text-indigo-600 hover:underline text-sm">
                    Forgot Password?
                </a>

            </div>
            <x-ui.button type="submit" variant="primary" class="w-full mt-4">
                Login
            </x-ui.button>

            <div class="mt-4 text-center">
                <p class="text-gray-600 text-base">
                    Do not have an account?
                    <a href="/register" wire:navigate class="text-indigo-600 hover:underline">Sign Up</a>
                </p>
            </div>
        </form>

    </div>
</div>
