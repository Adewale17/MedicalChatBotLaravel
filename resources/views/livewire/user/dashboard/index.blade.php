    <div class="px-4 py-6 sm:px-6 lg:px-8 bg-gray-50 min-h-screen">
        <h1 class="text-2xl font-bold text-blue-700 mb-6">Welcome, {{ Auth::user()->name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Start Chat -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-blue-600 mb-2">Start Chat</h2>
                <p class="text-gray-600 mb-4">Need help? Chat with our healthcare assistant now.</p>
                <a href="/chatbot" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Open Chatbot</a>
            </div>

            <!-- Book Appointment -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-green-600 mb-2">Book Appointment</h2>
                <p class="text-gray-600 mb-4">Schedule a session with a healthcare professional.</p>
                <a href="/appointments" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Book Now</a>
            </div>

            <!-- Chat History -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-purple-600 mb-2">Chat History</h2>
                <p class="text-gray-600 mb-4">Review your past conversations with MedicalBot.</p>
                <a href="/history" class="inline-block bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">View History</a>
            </div>

            <!-- Resources -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-yellow-600 mb-2">Medical Resources</h2>
                <p class="text-gray-600 mb-4">Download health tips, prescriptions, and other files.</p>
                <a href="/resources" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Browse</a>
            </div>
        </div>
    </div>
