<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-4 px-6 bg-white shadow-md rounded-md">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Size List') }}
            </h2>
            @can('apply-leave')
                <a href="{{ route('leaves.create') }}" class="bg-green-700 text-white px-5 py-2 rounded-md hover:bg-green-600 transition">
                    Apply Leave Request 
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                @if(session('success'))
                    <div class="bg-green-200 border-l-4 border-green-600 p-4 mb-3 rounded-md shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-200 border-l-4 border-red-600 p-4 mb-3 rounded-md shadow-sm">
                        {{ session('error') }}
                    </div>
                @endif
                
                <table class="w-full border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 border">ID</th>
                            <th class="py-3 px-6 border">User</th>
                            <th class="py-3 px-6 border">Leave Requested</th>
                            <th class="py-3 px-6 border">Leave Type</th>
                            
                            <th class="py-3 px-6 border">start_Date</th>
                            <th class="py-3 px-6 border">end_Date</th>
                            <th class="py-3 px-6 border">status</th>
                            <th class="py-3 px-6 border">reason</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($leaves as $leave)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-6">{{ $leave->id }}</td>
                                <td class="py-3 px-6">{{ $leave->user_id }}</td>
                                <td class="py-3 px-6">{{ $leave->days_requested }}</td>
                                <td class="py-3 px-6">{{ $leave-> leave_type}}</td>
                                <td class="py-3 px-6">{{ $leave->start_date }}</td>
                                <td class="py-3 px-6">{{ $leave->end_date }}</td>
                                <td class="py-3 px-6">{{ $leave->status }}</td>
                                <td class="py-3 px-6">{{ $leave->reason }}</td>
                                <td class="py-3 px-6 flex justify-center space-x-2">
                                    @can('approve-leave')
                                        <a href="{{ route('leaves.edit', $leave->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-400 transition">
                                            Approve Leave
                                        </a>
                                    @endcan
                                    @can('cancel-leave')
                                        <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this size?');">
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
</x-app-layout> 