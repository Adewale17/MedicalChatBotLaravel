 <main class="pt-14 space-y-32">

        <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-50 to-white">
            <div class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

                <!-- Left Text Content -->
                <div class="space-y-6">
                    <p class="text-sm text-blue-500 uppercase tracking-wide font-semibold">
                        Trusted Virtual Care
                    </p>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-blue-700 leading-tight">
                        Your AI-Powered Healthcare Assistant
                    </h1>
                    <p class="text-lg text-gray-600">
                        Get instant answers to health questions, book appointments, and chat live with a smart bot —
                        24/7 access from anywhere.
                    </p>
                    <a href="#chat"
                        class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium">
                        Talk to the Bot
                    </a>

                    <!-- Feature Highlights -->
                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-600">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 10-1.414 1.414L9 14.414l8-8a1 1 0 000-1.414z" />
                            </svg>
                            <span>Private & Secure</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 10-1.414 1.414L9 14.414l8-8a1 1 0 000-1.414z" />
                            </svg>
                            <span>Instant Health Support</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 10-1.414 1.414L9 14.414l8-8a1 1 0 000-1.414z" />
                            </svg>
                            <span>Book Appointments</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 10-1.414 1.414L9 14.414l8-8a1 1 0 000-1.414z" />
                            </svg>
                            <span>Free to Use</span>
                        </div>
                    </div>
                </div>

                <!-- Right Bot Image -->
                <div class="flex justify-center">
                    <img src="{{ asset('images/clinic.jpg') }}" alt="Medical Bot"
                        class="w-full max-w-lg rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                </div>

            </div>
        </div>
        </section>



        <!-- How it Works Section -->
        <section id="chat" class="max-w-7xl mx-auto px-6 py-20 bg-white rounded shadow">
            <h2 class="text-3xl font-bold text-blue-700 text-center mb-12">How It Works</h2>
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div>
                    <i class="fas fa-robot text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Chat with the Bot</h3>
                    <p class="text-gray-600">Instant answers to health-related concerns 24/7.</p>
                </div>
                <div>
                    <i class="fas fa-calendar-check text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Book Appointments</h3>
                    <p class="text-gray-600">Schedule a visit with a certified health professional.</p>
                </div>
                <div>
                    <i class="fas fa-user-md text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Get Recommendations</h3>
                    <p class="text-gray-600">Receive accurate health tips and treatment advice.</p>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="max-w-7xl mx-auto px-6 py-20 bg-blue-50 rounded shadow">
            <h2 class="text-3xl font-bold text-blue-700 text-center mb-12">About MedicalBot</h2>
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <img src="{{ asset('images/chatb.jpeg') }}" alt="About Image" class="rounded-xl shadow-lg w-full">
                </div>
                <div>
                    <p class="text-lg text-gray-700 mb-4">
                        MedicalBot is designed to make healthcare accessible, intelligent, and efficient.
                        With advanced AI technology, users can access real-time medical support, schedule appointments,
                        and receive helpful health recommendations right from their devices.
                    </p>
                    <p class="text-lg text-gray-700">
                        Whether you're looking for quick health advice or a platform to manage your appointments,
                        MedicalBot is here to help — 24 hours a day.
                    </p>
                </div>
            </div>
        </section>

    </main>
