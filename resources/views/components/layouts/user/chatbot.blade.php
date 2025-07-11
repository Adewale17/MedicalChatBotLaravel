<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'MedicalBot' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <tallstackui:script />

    @livewireStyles
</head>

<body
    x-data="{ sidebarOpen: false, sidebarCollapsed: false, toggleSidebar() { this.sidebarCollapsed = !this.sidebarCollapsed } }">


    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-20 h-16">
        <div class="px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full">
                <div class="flex items-center">
                    <!-- Desktop Sidebar Toggle -->
                    <button @click="toggleSidebar()"
                        class="hidden lg:block p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 mr-3">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <!-- Mobile Menu Button -->
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <div class="ml-2 lg:ml-0">
                        <h1 class="text-xl sm:text-2xl font-bold text-blue-600">CHATBOT</h1>
                    </div>
                </div>

                <!-- Header Actions -->
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <!-- Notifications -->
                    <div id="notifications-target" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="p-2 text-gray-400 hover:text-gray-500 relative">
                            <i class="fas fa-bell text-lg"></i>
                            <span
                                class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>

                        <!-- Notifications Dropdown -->
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-80 max-w-[calc(100vw-2rem)] bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                            <div class="p-4">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Notifications</h3>
                                <div class="space-y-3 max-h-64 overflow-y-auto">
                                    <div class="flex items-start space-x-3 p-2 hover:bg-gray-50 rounded">
                                        <div class="flex-shrink-0">
                                            <div class="h-2 w-2 bg-blue-500 rounded-full mt-2"></div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm text-gray-900">Hey! debtor go and pay ur dues.</p>
                                            <p class="text-xs text-gray-500">2 hours ago</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3 p-2 hover:bg-gray-50 rounded">
                                        <div class="flex-shrink-0">
                                            <div class="h-2 w-2 bg-green-500 rounded-full mt-2"></div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <ut class="text-sm text-gray-900">You have use this app multiple time</ut>
                                            <p class="text-xs text-gray-500">1 day ago</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3 p-2 hover:bg-gray-50 rounded">
                                        <div class="flex-shrink-0">
                                            <div class="h-2 w-2 bg-green-500 rounded-full mt-2"></div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <ut class="text-sm text-gray-900">You have use this app multiple time</ut>
                                            <p class="text-xs text-gray-500">1 day ago</p>
                                        </div>
                                    </div>

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
                            <img class="h-8 w-8 rounded-full" src="/images/chatbot.jpeg" alt="Profile">
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

        {{-- <div x-show="sidebarOpen" @click="sidebarOpen = false"
            class="fixed inset-0 bg-gray-300 bg-opacity-75 z-30 lg:hidden"></div> --}}

        <nav :class="{
            'translate-x-0': sidebarOpen,
            '-translate-x-full': !sidebarOpen,
            'lg:translate-x-0': !sidebarCollapsed,
            'lg:-translate-x-full': sidebarCollapsed
        }" class="fixed inset-y-0 left-0 z-20 w-64 bg-white shadow-sm transform transition-all duration-300 ease-in-out flex flex-col"
            style="top: 4rem;">
            <!-- Mobile Sidebar Header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 lg:hidden">
                <h2 class="text-lg font-semibold text-gray-900">Menu</h2>
                <button @click="sidebarOpen = false"
                    class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Sidebar Content -->
            <div class="flex-1 overflow-y-auto p-4 lg:p-6">
                <div class="space-y-6">
                    <!-- Dashboard -->
                    <div>
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Dashboard</h3>
                        <div class="space-y-2">
                            <a href="{{ route('user.dashboard') }}"
                                class="w-full flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md  hover:bg-blue-50 hover:text-blue-700 group transition-colors {{ Route::is('user.dashboard') ? 'bg-blue-100' : '' }}">
                                <i class="fas fa-home mr-3 text-blue-500 w-4 flex-shrink-0"></i>
                                <span class="truncate">Dashboard</span>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Create New</h3>
                        <div class="space-y-2">

                            <a href="/chatbot" wire:navigate
                                class="flex items-center px-4 py-2 text-sm text-gray-700 rounded hover:bg-blue-50">
                                <i class="fas fa-robot mr-3 text-blue-500"></i> Chatbot
                            </a>
                            <!-- Appointments -->
                            <a href="{{ route('user.dashboard.appointments') }}" wire:navigate
                                class="flex items-center px-4 py-2 text-sm text-gray-700 rounded hover:bg-blue-50">
                                <i class="fas fa-calendar-check mr-3 text-blue-500"></i> Book Appointment
                            </a>
                            <!-- Medical Records -->
                            <a href="/records"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 rounded hover:bg-blue-50">
                                <i class="fas fa-file-medical mr-3 text-blue-500"></i> Records
                            </a>
                        </div>
                    </div>



                </div>
            </div>

            <div class="hidden lg:block border-t border-gray-200 p-4">
                <a href="javascript:void(0)" class="flex items-center space-x-2 p-2 rounded-md gap-2">
                    <img class="h-8 w-8 rounded-full" src="{{ asset('storage/' .auth()->user()->avatar) }}" alt="Profile">
                    <span class="hidden sm:block text-sm font-medium text-gray-700 ">{{ auth()->user()->name }}</span>
                </a>
            </div>
        </nav>

        <main :class="sidebarCollapsed ? 'lg:ml-0' : 'lg:ml-64'" class="flex-1 min-w-0 flex flex-col overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="chat bg-gray-50 min-h-screen py-10 px-4">
                    <!-- Header -->
                    <div class="top flex items-center gap-4 mb-6">
                        <img src="{{ asset('images/chatbot.jpeg') }}"
                            class="h-12 w-12 rounded-full" alt="Avatar">
                        <div>
                            <p class="font-semibold text-blue-800">MedicalBot</p>
                            <small class="text-green-600">Online</small>
                        </div>
                    </div>

                    <!-- Chat Area -->
                    <div class="messages space-y-4 max-h-[60vh] overflow-y-auto" id="chatArea">
                        <div class="left message flex items-start gap-2">
                            <img src="{{ '/images/chatbot.jpeg' }}"
                                class="h-8 w-8 rounded-full" alt="Bot">
                            <p class="bg-blue-100 text-gray-800 px-4 py-2 rounded-lg max-w-xs">
                                Start chatting with our AI Health Assistant.
                            </p>
                        </div>
                    </div>

                    <!-- Footer Form -->
                    <div class="bottom mt-6">
                        <form id="chatForm" class="flex gap-2">
                            <input type="text" id="message" class="flex-1 border border-gray-300 rounded px-4 py-2"
                                placeholder="Type your message..." autocomplete="off">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Fab menu --}}
    <div class="fixed bottom-6 right-6 lg:hidden z-30">
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-4 shadow-lg transition-colors">
                <i class="fas fa-plus text-lg" :class="{ 'rotate-45': open }" style="transition: transform 0.2s;"></i>
            </button>


            <div x-show="open" x-transition class="absolute bottom-16 right-0 space-y-2">

                <a href="#" open=false"
                    class="flex items-center bg-white rounded-full shadow-lg p-3 hover:shadow-xl transition-shadow">
                    <i class="fas fa-robot mr-3 text-blue-500"></i> Chatbot
                </a>
                <a href="#" open=false"
                    class="flex items-center bg-white rounded-full shadow-lg p-3 hover:shadow-xl transition-shadow">
                    <i class="fas fa-calendar-check mr-3 text-blue-500"></i> Book Appointment
                </a>
                <a href="#" open=false"
                    class="flex items-center bg-white rounded-full shadow-lg p-3 hover:shadow-xl transition-shadow">
                    <i class="fas fa-file-medical mr-3 text-blue-500"></i> Records
                </a>


            </div>
        </div>
    </div>
</body>


<script>
    document.getElementById('chatForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const input = document.getElementById('message');
        const chatArea = document.getElementById('chatArea');
        const userText = input.value.trim();

        if (userText === '') return;

        // Display user message
        chatArea.innerHTML += `
            <div class="right message flex justify-end gap-2">
                <p class="bg-blue-600 text-white px-4 py-2 rounded-lg max-w-xs">${userText}</p>
                <img src="{{ asset('storage/' .auth()->user()->avatar) }}" class="h-8 w-8 rounded-full" alt="User">
            </div>
        `;

        // Show "Bot is typing..." message
        const typingMsg = document.createElement('div');
        typingMsg.className = 'left message flex items-start gap-2';
        typingMsg.innerHTML = `
            <img src="{{ 'images/chatbot.jpeg' }}" class="h-8 w-8 rounded-full" alt="Bot">
            <p class="bg-gray-100 text-gray-600 px-4 py-2 rounded-lg max-w-xs italic">Bot is typing...</p>
        `;
        chatArea.appendChild(typingMsg);
        chatArea.scrollTop = chatArea.scrollHeight;

        // Clear input and disable
        input.value = '';
        input.disabled = true;

        try {
            const res = await fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ content: userText })
            });

            const reply = await res.text();

            // Remove "Bot is typing..."
            typingMsg.remove();

            // Display actual bot reply
            chatArea.innerHTML += `
                <div class="left message flex items-start gap-2">
                    <img src="{{ asset('images/chatbot.jpeg') }}" class="h-8 w-8 rounded-full" alt="Bot">
                    <p class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg max-w-xs">${reply}</p>
                </div>
            `;
        } catch (error) {
            typingMsg.remove();
            chatArea.innerHTML += `
                <div class="left message flex items-start gap-2">
                    <img src="{{ asset('images/chatbot.jpeg') }}" class="h-8 w-8 rounded-full" alt="Bot">
                    <p class="bg-red-100 text-red-800 px-4 py-2 rounded-lg max-w-xs">⚠️ Failed to get response</p>
                </div>
            `;
        }

        chatArea.scrollTop = chatArea.scrollHeight;
        input.disabled = false;
        input.focus();
    });
</script>
