

<div class="w-full px-6 lg:px-12 py-10">
    <h1 class="text-3xl font-bold text-blue-700 mb-10">Welcome, {{ Auth::user()->name }}</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-2 gap-8">
        <!-- Start Chat -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h2 class="text-lg font-semibold text-blue-600 mb-2">Start Chat</h2>
            <p class="text-gray-600 mb-4">Need help? Chat with our healthcare assistant now.</p>
            <a href="/chatbot"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Open
                Chatbot</a>
        </div>

        <!-- Book Appointment -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h2 class="text-lg font-semibold text-green-600 mb-2">Book Appointment</h2>
            <p class="text-gray-600 mb-4">Schedule a session with a healthcare professional.</p>
            <a href="{{ route('user.dashboard.appointments') }}"
                class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Book
                Now</a>
        </div>


    </div>
</div>
