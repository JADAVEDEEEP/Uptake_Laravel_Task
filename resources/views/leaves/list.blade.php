<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-4 px-6 bg-white shadow-md rounded-md">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Leave Portal') }}
            </h2>
            @can('apply-leave')
                <a href="{{ route('leaves.create') }}" class="bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-500 transition">
                    Apply Leave Request 
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-600 p-4 mb-3 rounded-md shadow-sm">
                        <p class="text-green-800">{{ session('success') }}</p>
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-600 p-4 mb-3 rounded-md shadow-sm">
                        <p class="text-red-800">{{ session('error') }}</p>
                    </div>
                @endif
                
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">ID</th>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">User</th>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">Username</th>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">Leave Requested</th>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">Leave Type</th>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">Start Date</th>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">End Date</th>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">Status</th>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">Reason</th>
                                <th class="py-3 px-6 border-b text-sm font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-center">
                            @foreach($leaves as $leave)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-6">{{ $leave->id }}</td>
                                    <td class="py-3 px-6">{{ $leave->user_id }}</td>
                                    <td class="py-3 px-6">{{ $leave->user->name }}</td>
                                    <td class="py-3 px-6">{{ $leave->days_requested }}</td>
                                    <td class="py-3 px-6">{{ $leave->leave_type }}</td>
                                    <td class="py-3 px-6">{{ $leave->start_date }}</td>
                                    <td class="py-3 px-6">{{ $leave->end_date }}</td>
                                    <td class="py-3 px-6">
                                        <span class="inline-block px-3 py-1 rounded-full text-white 
                                            {{ $leave->status === 'Approved' ? 'bg-green-500' : 
                                               ($leave->status === 'Pending' ? 'bg-yellow-500' : 'bg-red-500') }}">
                                            {{ $leave->status }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6">{{ $leave->reason }}</td>
                                    <td class="py-3 px-6 flex justify-center space-x-2">
                                        @can('approve-leave')
                                            <a href="{{ route('leaves.edit', $leave->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition">
                                                Approve/Reject Leave 
                                            </a>
                                        @endcan
                                        @can('cancel-leave')
                                            <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to Cancel this Leave?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-400 transition">
                                                    Cancel Leave
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
