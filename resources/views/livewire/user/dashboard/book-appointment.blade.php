<div class="max-w-3xl mx-auto space-y-6">
    <h2 class="text-2xl font-semibold text-gray-800">Book an Appointment</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="book" class="space-y-4 bg-white shadow p-6 rounded">

        {{-- Doctor --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Select Doctor</label>
            <select wire:model="doctor_id" class="mt-1 block w-full border-gray-300 rounded">
                <option value="">Choose a doctor</option>
                @foreach ($doctors as $doc)
                    <option value="{{ $doc->id }}">{{ $doc->name }}</option>
                @endforeach
            </select>
            @error('doctor_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Date --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Select Date</label>
            <input type="date" wire:model="appointment_date" class="mt-1 block w-full border-gray-300 rounded" />
            @error('appointment_date') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Time --}}
        @if (!empty($availableTimes))
            <div>
                <label class="block text-sm font-medium text-gray-700">Available Times</label>
                <select wire:model="appointment_time" class="mt-1 block w-full border-gray-300 rounded">
                    <option value="">Select a time</option>
                    @foreach ($availableTimes as $time)
                        <option value="{{ $time }}">{{ \Carbon\Carbon::parse($time)->format('g:i A') }}</option>
                    @endforeach
                </select>
                @error('appointment_time') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        @endif

        {{-- Notes --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Notes (Optional)</label>
            <textarea wire:model="notes" rows="3" class="mt-1 block w-full border-gray-300 rounded"></textarea>
        </div>

        {{-- Submit --}}
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Book Appointment
            </button>
        </div>

    </form>
</div>
