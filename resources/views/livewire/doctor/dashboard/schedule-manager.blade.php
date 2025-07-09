<div class="max-w-3xl mx-auto space-y-6">

    <h2 class="text-2xl font-semibold text-gray-800">Manage Your Weekly Schedule</h2>

    {{-- Success Message --}}
    @if (session()->has('message'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded shadow text-sm">
        {{ session('message') }}
    </div>
    @endif

    {{-- Add Slot Form --}}
    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
        <div>
            <label class="block text-sm font-medium text-gray-700">Day</label>
            <select wire:model.defer="day" class="mt-1 block w-full border border-gray-300 rounded shadow-sm">
                <option value="">Select Day</option>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
            </select>
            @error('day')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Start Time</label>
            <input type="time" wire:model.defer="start_time"
                class="mt-1 block w-full border border-gray-300 rounded shadow-sm">
            @error('start_time')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">End Time</label>
            <input type="time" wire:model.defer="end_time"
                class="mt-1 block w-full border border-gray-300 rounded shadow-sm">
            @error('end_time')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded shadow hover:bg-blue-700 transition">
                Add Slot
            </button>
        </div>
    </form>

    {{-- Existing Schedule Slots --}}
    <div>
        <h3 class="text-lg font-medium text-gray-700 mb-2">Your Schedule Slots</h3>
        <ul class="space-y-2">
            @forelse ($schedules as $slot)
            <li class="flex justify-between items-center bg-white shadow rounded p-3">
                <span>
                    {{ $slot->day }}:
                    {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }} —
                    {{ \Carbon\Carbon::parse($slot->end_time)->format('g:i A') }}
                </span>
                <button wire:click="delete({{ $slot->id }})"
                    class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 font-semibold rounded-md hover:bg-red-200 hover:text-red-800 transition duration-200 ease-in-out shadow-sm">
                    <i class="fas fa-trash-alt mr-2"></i> Delete
                </button>

            </li>
            @empty
            <li class="text-gray-500">No schedule slots added yet.</li>
            @endforelse
        </ul>
    </div>

</div>
