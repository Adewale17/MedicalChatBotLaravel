<body class="bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-20 h-16">
        <div class="px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full">
                <div class="flex items-center">
                    <button id="collapseToggle"
                        class="hidden lg:block p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 mr-3">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <button id="mobileToggle"
                        class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <div class="ml-2 lg:ml-0">
                        <h1 class="text-xl sm:text-2xl font-bold text-blue-600">MEDICALBOT</h1>
                    </div>
                </div>
                <!-- Header Actions -->
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <!-- Notifications -->
                    <div id="notifications-target" class="relative" x-data="{ open: false }">
                        @php
                        $unreadCount = \App\Models\Notification::where('user_id', auth()->id())->where('is_read',
                        0)->count();
                        @endphp
                        <button @click="open = !open" class="p-2 text-gray-400 hover:text-gray-500 relative">
                            <i class="fas fa-bell text-lg"></i>
                            @if ($unreadCount > 0)
                            <span
                                class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">
                                {{ $unreadCount }}
                            </span>
                            @endif
                        </button>

                        <!-- Notifications Dropdown -->
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-80 max-w-[calc(100vw-2rem)] bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                            <div class="p-4">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Notifications</h3>
                                <div class="space-y-3 max-h-64 overflow-y-auto">
                                    @auth
                                    @php
                                    $notifications = \App\Models\Notification::where('user_id',
                                    auth()->id())->latest()->take(10)->get();
                                    @endphp

                                    @forelse ($notifications as $notification)
                                    <div class="flex items-start space-x-3 p-2 hover:bg-gray-50 rounded">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="h-2 w-2 {{ $notification->read ? 'bg-gray-400' : 'bg-blue-500' }} rounded-full mt-2">
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm text-gray-900">{{ $notification->message }}</p>
                                            <p class="text-xs text-gray-500">{{
                                                $notification->created_at->diffForHumans() }}</p>

<div class="flex items-center space-x-2 text-xs text-blue-600">
    <!-- Mark as Read -->
    @if ($notification->is_read === 0)
        <form action="{{ route('notifications.markOneAsRead', $notification->id) }}" method="POST">
            @csrf
            <button type="submit" class="hover:underline">Mark as read</button>
        </form>
    @endif

    <!-- Delete -->
    <form action="{{ route('notifications.delete', $notification->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="hover:underline text-red-600">Delete</button>
    </form>
</div>

                                        </div>
                                    </div>
                                    @empty
                                    <p class="text-sm text-gray-500">No notifications yet.</p>
                                    @endforelse
                                    @endauth
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="p-2 text-gray-400 hover:text-gray-500 transition-colors">
                            <i class="fas fa-question-circle text-lg"></i>
                        </button>

                        <!-- Help Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1">
                                <button @click="$dispatch('start-onboarding')" open=false"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <i class="fas fa-route mr-2"></i>Retake Tour
                                </button>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <i class="fas fa-envelope mr-2"></i>Contact Support
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-100">
                            <img class="h-8 w-8 rounded-full" src="{{ asset('storage/' .auth()->user()->avatar) }}"
                                alt="Profile">
                            <span
                                class="hidden sm:block text-sm font-medium text-gray-700">{{auth()->user()->name}}</span>
                            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i>Profile Settings
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i>Account Settings
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
        </div>
    </header>

    <div class="flex relative">
        <div id="sidebarOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-30 hidden lg:hidden"></div>

        <nav id="sidebar"
            class="fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-sm transform transition-all duration-300 ease-in-out -translate-x-full lg:translate-x-0"
            style="top: 4rem;">
            <div class="flex items-center justify-between p-4 border-b border-gray-200 lg:hidden">
                <h2 class="text-lg font-semibold text-gray-900">Menu</h2>
                <button id="closeMobileSidebar"
                    class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-4 lg:p-6">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Dashboard</h3>
                        <a href="/dashboard"
                            class="w-full flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-blue-50 hover:text-blue-700 group transition-colors">
                            <i class="fas fa-home mr-3 text-blue-500"></i><span class="sidebar-label">Dashboard</span>
                        </a>
                    </div>
                    <div>
                        <a href="/chatbot"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 rounded hover:bg-blue-50">
                            <i class="fas fa-robot mr-3 text-blue-500"></i><span class="sidebar-label">Chatbot</span>
                        </a>
                        <a href="{{ route('user.dashboard.appointments') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 rounded hover:bg-blue-50">
                            <i class="fas fa-calendar-check mr-3 text-blue-500"></i><span class="sidebar-label">Book
                                Appointment</span>
                        </a>
                        
                    </div>
                </div>
            </div>

            <div class="hidden lg:block border-t border-gray-200 p-4">
                <div class="flex items-center space-x-2">
                    <img class="h-8 w-8 rounded-full" src="{{ asset('storage/' .auth()->user()->avatar) }}"
                        alt="Profile">
                    <span class="sidebar-label text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </nav>

        <main id="mainContent"
            class="flex-1 min-w-0 flex flex-col overflow-hidden pt-4 lg:pt-6 transition-all duration-300 ease-in-out lg:ml-64">
            <div class="px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <div class="fixed bottom-6 right-6 lg:hidden z-30">
        <div class="relative">
            <button id="fabToggle"
                class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-4 shadow-lg transition-colors">
                <i class="fas fa-plus text-lg"></i>
            </button>
            <div id="fabMenu" class="hidden absolute bottom-16 right-0 space-y-2">
                <a href="/chatbot"
                    class="flex items-center bg-white rounded-full shadow-lg p-3 hover:shadow-xl transition-shadow">
                    <i class="fas fa-robot mr-3 text-blue-500"></i> Chatbot
                </a>
                <a href="{{ route('user.dashboard.appointments') }}"
                    class="flex items-center bg-white rounded-full shadow-lg p-3 hover:shadow-xl transition-shadow">
                    <i class="fas fa-calendar-check mr-3 text-blue-500"></i> Book Appointment
                </a>
                <a href="/records"
                    class="flex items-center bg-white rounded-full shadow-lg p-3 hover:shadow-xl transition-shadow">
                    <i class="fas fa-file-medical mr-3 text-blue-500"></i> Records
                </a>
            </div>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const collapseToggle = document.getElementById('collapseToggle');
        const mobileToggle = document.getElementById('mobileToggle');
        const closeMobileSidebar = document.getElementById('closeMobileSidebar');
        const mainContent = document.getElementById('mainContent');
        let isCollapsed = false;

        collapseToggle?.addEventListener('click', () => {
            isCollapsed = !isCollapsed;
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');
            mainContent.classList.toggle('lg:ml-64');
            mainContent.classList.toggle('lg:ml-16');
            document.querySelectorAll('.sidebar-label').forEach(el => el.classList.toggle('hidden'));
        });

        mobileToggle?.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        });

        closeMobileSidebar?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        sidebarOverlay?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        document.getElementById('fabToggle').addEventListener('click', () => {
            const menu = document.getElementById('fabMenu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
