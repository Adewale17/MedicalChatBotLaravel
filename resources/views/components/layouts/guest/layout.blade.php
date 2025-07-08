<body class="bg-gray-50 text-gray-800">

    <!-- Header/Navbar -->
     <header class="bg-white shadow fixed top-0 left-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/logow.jpeg') }}" alt="Logo" class="h-10 w-10">
                <span class="text-xl font-bold text-blue-700">MedicalBot</span>
            </div>

            <!-- Navigation Links -->
            <nav class="space-x-6 hidden md:flex font-medium text-blue-700">
                <a href="/" class="hover:text-blue-900 transition">Home</a>
                <a href="#chat" class="hover:text-blue-900 transition">How it works</a>
                <a href="#about" class="hover:text-blue-900 transition">About</a>
            </nav>

            <!-- Auth Buttons -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-blue-700 hover:text-blue-900 transition font-medium">
                    <span class="hover:underline">Sign In</span>
                </a>
                <a href="/register" wire:navigate
                    class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">
                    Get Started
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->

        {{ $slot }}


    <!-- Footer -->
    <footer class="bg-white  pt-10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-gray-600">

            <!-- About -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3">MedicalBot</h3>
                <p>
                    MedicalBot is your 24/7 healthcare assistant. Get answers, book appointments, and stay informed —
                    all in one place.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-blue-600">Home</a></li>
                    <li><a href="#chat" class="hover:text-blue-600">Chatbot</a></li>
                    <li><a href="#appointment" class="hover:text-blue-600">Book Appointment</a></li>
                    <li><a href="/login" class="hover:text-blue-600">Sign In</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3">Contact Us</h3>
                <p>Email: <a href="mailto:support@medicalbot.com" class="text-blue-600">support@medicalbot.com</a></p>
                <p class="mt-2">Phone: +234 812 345 6789</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="hover:text-blue-600" aria-label="Facebook">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M22 12a10 10 0 10-11.5 9.9v-7h-2v-2.9h2v-2.2c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2v1.9h2.3l-.4 2.9h-1.9v7A10 10 0 0022 12z" />
                        </svg>
                    </a>
                    <a href="#" class="hover:text-blue-600" aria-label="Twitter">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.1 1.2 4.5 4.5 0 00-7.6 4.1A12.9 12.9 0 013 4.1a4.4 4.4 0 001.4 5.9 4.5 4.5 0 01-2-.5v.1a4.5 4.5 0 003.6 4.4 4.5 4.5 0 01-2 .1 4.5 4.5 0 004.2 3.1A9 9 0 013 19a12.7 12.7 0 006.9 2" />
                        </svg>
                    </a>
                    <a href="#" class="hover:text-blue-600" aria-label="Instagram">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm0 2h10c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3zm5 2a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.8-.2a1.1 1.1 0 100 2.2 1.1 1.1 0 000-2.2z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="text-center text-sm text-gray-400 mt-10 pb-6">
            © {{ now()->year }} MedicalBot. Built with ❤️ in Nigeria.
        </div>
    </footer>


</body>
