<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edit Leave Request</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="max-w-4xl mx-auto my-10 p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Edit Leave Request</h2>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

   
        <form action="{{ route('leaves.update', $leaves->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            
            <div class="space-y-2">
                <label for="status" class="text-gray-700">Status</label>
                <textarea class="form-textarea w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="status" name="status" required>{{ old('status', $leaves->status) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Update Leave Request</button>
            </div>
        </form>
    </div>

</body>
</html>