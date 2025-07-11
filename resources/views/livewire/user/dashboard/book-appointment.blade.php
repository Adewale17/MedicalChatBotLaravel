<div class="max-w-2xl mx-auto p-8 bg-white rounded-2xl shadow-md space-y-6">

    <!-- Heading -->
    <h2 class="text-3xl font-bold text-gray-800 border-b pb-4">📅 Book an Appointment</h2>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form Start -->
    <form wire:submit.prevent="book" class="space-y-6">

        <!-- Doctor -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">👨‍⚕️ Select Doctor</label>
            <select wire:model="doctor_id" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Choose a doctor</option>
                @foreach ($doctors as $doc)
                    <option value="{{ $doc->id }}">{{ $doc->name }}</option>
                @endforeach
            </select>
            @error('doctor_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Appointment Date -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">📆 Select Date</label>
            <input type="date" wire:model="appointment_date"
                   class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
            @error('appointment_date')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Time Slot -->
        @if (!empty($availableTimes))
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">⏰ Available Times</label>
            <select wire:model="appointment_time" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select a time</option>
                @foreach ($availableTimes as $time)
                    <option value="{{ $time }}">{{ \Carbon\Carbon::parse($time)->format('g:i A') }}</option>
                @endforeach
            </select>
            @error('appointment_time')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        @endif

        <!-- Notes -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">📝 Notes <span class="text-gray-400">(Optional)</span></label>
            <textarea wire:model="notes" rows="4"
                      class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none"
                      placeholder="Add any relevant information or instructions..."></textarea>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-2 px-6 rounded-lg shadow">
                💬 Book Appointment
            </button>
        </div>

    </form>
</div>
