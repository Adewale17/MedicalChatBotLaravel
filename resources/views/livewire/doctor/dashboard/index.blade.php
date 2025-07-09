<div class="max-w-6xl mx-auto space-y-8">

    <!-- Greeting -->
    <header class="flex items-center justify-between">
        <h2 class="text-3xl font-bold text-gray-800">Welcome back, Dr. {{ auth('doctor')->user()->name }}</h2>
        <p class="text-gray-600">{{ now()->format('l, F j, Y') }}</p>
    </header>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Today's Appointments -->
        <div class="bg-white shadow rounded-lg p-5 flex items-center space-x-4">
            <div class="p-4 bg-blue-100 rounded-full">
                <i class="fas fa-calendar-day text-blue-600 text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Today's Appointments</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $todaysAppointmentsCount ?? 0 }}</p>
            </div>
        </div>

        <!-- Upcoming Appointments -->
        <div class="bg-white shadow rounded-lg p-5 flex items-center space-x-4">
            <div class="p-4 bg-green-100 rounded-full">
                <i class="fas fa-calendar-alt text-green-600 text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Upcoming Appointments</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $upcomingAppointmentsCount ?? 0 }}</p>
            </div>
        </div>

        <!-- Total Patients -->
        <div class="bg-white shadow rounded-lg p-5 flex items-center space-x-4">
            <div class="p-4 bg-purple-100 rounded-full">
                <i class="fas fa-user-injured text-purple-600 text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Patients</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $totalPatientsCount ?? 0 }}</p>
            </div>
        </div>

        <!-- Manage Schedules -->
        <div class="bg-white shadow rounded-lg p-5 flex items-center space-x-4">
            <div class="p-4 bg-yellow-100 rounded-full">
                <i class="fas fa-calendar-check text-yellow-600 text-2xl"></i>
            </div>
            <div class="flex-1">
                <p class="text-sm text-gray-500">Manage Schedule</p>
                <a href="" class="mt-1 inline-block text-yellow-600 font-medium hover:underline">
                    View & Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="#"
               class="flex items-center p-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-notes-medical text-2xl mr-3"></i>
                <span class="font-medium">View All Appointments</span>
            </a>
            <a href="#"
               class="flex items-center p-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <i class="fas fa-calendar-plus text-2xl mr-3"></i>
                <span class="font-medium">Add New Schedule</span>
            </a>
        </div>
    </div>

</div>
