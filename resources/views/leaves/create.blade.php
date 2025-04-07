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

                       
                        <div class="mb-6">
                            <label for="days_requested" class="block text-lg font-semibold text-gray-700">Leave Days</label>
                            <input type="number" name="days_requested" id="days_requested" class="mt-2 block w-full border-gray-300 rounded-lg p-3 text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('days_requested') }}">
                            @error('days_requested') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                       
                        <div class="mb-6">
                            <label for="leave_type" class="block text-lg font-semibold text-gray-700">Leave Type</label>
                            <input type="text" name="leave_type" id="leave_type" class="mt-2 block w-full border-gray-300 rounded-lg p-3 text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('leave_type') }}">
                            @error('leave_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-6">
                            <label for="start_date" class="block text-lg font-semibold text-gray-700">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="mt-2 block w-full border-gray-300 rounded-lg p-3 text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('start_date') }}">
                            @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                       
                        <div class="mb-6">
                            <label for="end_date" class="block text-lg font-semibold text-gray-700">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="mt-2 block w-full border-gray-300 rounded-lg p-3 text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('end_date') }}">
                            @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                       
                        <div class="mb-6">
                            <label for="reason" class="block text-lg font-semibold text-gray-700">Reason</label>
                            <input type="text" name="reason" id="reason" class="mt-2 block w-full border-gray-300 rounded-lg p-3 text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('reason') }}">
                            @error('reason') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                       
                        <div class="mb-6 flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
