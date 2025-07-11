<div class="p-6 max-w-5xl mx-auto bg-white shadow-md rounded-lg">

    <h2 class="text-2xl font-bold text-gray-800 mb-4">👨‍⚕️ All Doctors</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border text-green-800 p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Name</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Email</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Avatar</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($doctors as $doctor)
                <tr>
                    <td class="px-4 py-2">{{ $doctor->name }}</td>
                    <td class="px-4 py-2">{{ $doctor->email }}</td>
                    <td class="px-4 py-2">
                        @if ($doctor->avatar)
                            <img src="{{ asset('storage/' . $doctor->avatar) }}" class="h-10 w-10 rounded-full object-cover" alt="avatar">
                        @else
                            <span class="text-gray-400 text-sm">No Avatar</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <button wire:click="confirmDelete({{ $doctor->id }})"
    class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700 transition shadow-sm">
    
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12" />
    </svg>
    Delete
</button>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 py-4">No doctors found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Delete Confirmation -->
    @if ($confirmingDoctorId)
        <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded">
            <p class="text-red-800 mb-2">Are you sure you want to delete this doctor?</p>
            <button wire:click="deleteDoctor"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 mr-2">Yes, Delete</button>
            <button wire:click="$set('confirmingDoctorId', null)"
                class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Cancel</button>
        </div>
    @endif
</div>
