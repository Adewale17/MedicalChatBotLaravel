<body class="bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-20 h-16">
        <div class="px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full">

                <!-- Sidebar Toggler + Logo -->
                <div class="flex items-center">
                    <!-- Sidebar Collapse Toggle (Desktop) -->
                    <button id="collapseToggle" class="hidden lg:block p-2 text-gray-400 hover:text-gray-500">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <!-- Sidebar Open Toggle (Mobile) -->
                    <button id="mobileToggle" class="lg:hidden p-2 text-gray-400 hover:text-gray-500">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <h1 class="ml-3 text-xl sm:text-2xl font-bold text-blue-600">MedicalBot</h1>
                </div>

                 <!-- Right: Actions -->
                <div class="flex items-center space-x-4 sm:space-x-6">

                    <!-- Notifications -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="p-2 text-gray-400 hover:text-gray-500 relative">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                            <div class="p-4">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Notifications</h3>
                                <div class="space-y-2 max-h-64 overflow-y-auto">
                                    <div class="flex items-start space-x-3 p-2 hover:bg-gray-50 rounded">
                                        <div class="h-2 w-2 bg-blue-500 rounded-full mt-2"></div>
                                        <div>
                                            <p class="text-sm text-gray-900">New patient booked an appointment.</p>
                                            <p class="text-xs text-gray-500">10 minutes ago</p>
                                        </div>
                                    </div>
                                    <!-- more notifications... -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Help -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="p-2 text-gray-400 hover:text-gray-500">
                            <i class="fas fa-question-circle text-lg"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-envelope mr-2"></i>Contact Support
                            </a>
                        </div>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 p-2 hover:bg-gray-100 rounded-md">
                            <img src="{{ asset('storage/' . auth('doctor')->user()->avatar) }}" alt="Avatar" class="h-8 w-8 rounded-full">
                            <span class="hidden sm:block text-sm font-medium text-gray-700">{{ auth('doctor')->user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a>
                            <div class="border-t border-gray-100"></div>
                           <form action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        class="block px-4 py-2 text-sm text-gray-700 w-full text-left hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- LAYOUT -->
    <div class="flex relative">

        <!-- Sidebar Overlay (Mobile) -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>

        <!-- Sidebar -->
        <nav id="sidebar" class="fixed inset-y-0 left-0 z-30 bg-white shadow transform transition-all duration-300 ease-in-out w-64 lg:translate-x-0 -translate-x-full" style="top:4rem;">
            <div class="p-4">
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('doctor.dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded">
                            <i class="fas fa-home mr-3 text-blue-500"></i>
                            <span class="sidebar-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('doctor.schedule') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded">
                            <i class="fas fa-calendar-alt mr-3 text-blue-500"></i>
                            <span class="sidebar-label">Manage Schedule</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('doctor.dashboard.appointments') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded">
                            <i class="fas fa-notes-medical mr-3 text-blue-500"></i>
                            <span class="sidebar-label">View Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded">
                            <i class="fas fa-user mr-3 text-blue-500"></i>
                            <span class="sidebar-label">Create New Doctor</span>
                        </a>
                    </li>
                   
                    
                    <!-- Add more links -->
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main id="mainContent" class="flex-1 min-w-0 flex flex-col overflow-hidden pt-4 lg:pt-6 transition-all duration-300 ease-in-out lg:ml-64">
            <div class="px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <!-- JS for sidebar toggle and collapse -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const collapseToggle = document.getElementById('collapseToggle');
        const mobileToggle = document.getElementById('mobileToggle');
        const mainContent = document.getElementById('mainContent');

        let collapsed = false;

        // Collapse Sidebar (Desktop)
        collapseToggle?.addEventListener('click', () => {
            collapsed = !collapsed;

            if (collapsed) {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-16');
                mainContent.classList.remove('lg:ml-64');
                mainContent.classList.add('lg:ml-16');
                document.querySelectorAll('.sidebar-label').forEach(el => el.classList.add('hidden'));
            } else {
                sidebar.classList.remove('w-16');
                sidebar.classList.add('w-64');
                mainContent.classList.remove('lg:ml-16');
                mainContent.classList.add('lg:ml-64');
                document.querySelectorAll('.sidebar-label').forEach(el => el.classList.remove('hidden'));
            }
        });

        // Mobile Toggle
        mobileToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        });

        // Overlay click (mobile)
        sidebarOverlay?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });
    </script>
</body>
