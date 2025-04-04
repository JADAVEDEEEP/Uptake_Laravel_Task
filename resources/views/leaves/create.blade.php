<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Leave Request
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('leaves.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="days_requested" class="block text-lg">Leave Days</label>
                            <input type="number" name="days_requested" id="days_requested" class="border-gray-300 w-full p-2 rounded" value="{{ old('days_requested') }}">
                            @error('days_requested') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="leave_type" class="block text-lg">Leave Type</label>
                            <input type="text" name="leave_type" id="leave_type" class="border-gray-300 w-full p-2 rounded" value="{{ old('leave_type') }}">
                            @error('leave_type') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="start_date" class="block text-lg">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="border-gray-300 w-full p-2 rounded" value="{{ old('start_date') }}">
                            @error('start_date') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="end_date" class="block text-lg">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="border-gray-300 w-full p-2 rounded" value="{{ old('end_date') }}">
                            @error('end_date') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="reason" class="block text-lg">Reason</label>
                            <input type="text" name="reason" id="reason" class="border-gray-300 w-full p-2 rounded" value="{{ old('reason') }}">
                            @error('reason') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        

                        <button type="submit" class="bg-blue-500 text-white p-3 rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
