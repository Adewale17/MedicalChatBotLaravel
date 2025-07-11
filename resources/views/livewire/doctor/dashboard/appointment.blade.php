
<div class="max-w-7xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Appointments</h2>

    @if(session('message'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Patient Name</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Time</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Reason</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($appointments as $index => $appointment)
                    <tr>
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $appointment->user->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $appointment->appointment_date }}</td>
                        <td class="px-6 py-4">{{ $appointment->appointment_time }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-white text-xs
                                {{ $appointment->status == 'pending' ? 'bg-yellow-500' : ($appointment->status == 'approved' ? 'bg-green-600' : 'bg-red-500') }}">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $appointment->notes }}</td>
                        <td class="px-6 py-4 space-x-2">
                            @if($appointment->status == 'pending')
                                <form action="{{ route('doctor.appointments.approve', $appointment->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:underline">Approve</button>
                                </form>
                                <form action="{{ route('doctor.appointments.cancel', $appointment->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:underline">Cancel</button>
                                </form>
                            @else
                                <span class="text-gray-500 text-xs">No actions</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center px-6 py-4 text-gray-500">No appointments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">
            {{ $appointments->links() }}
    </div>
</div>

