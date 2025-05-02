<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel Image Upload</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Laravel Image Upload</h1>

        <!-- Single Upload Form -->
        <div class="bg-white p-6 rounded-lg shadow mb-8">
            <h2 class="text-xl font-semibold mb-4">Upload a Single Image</h2>
            <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data"
                class="flex items-center gap-4">
                @csrf
                <input type="file" name="image" required
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">Upload</button>
            </form>
        </div>

        <!-- Multiple Upload Form -->
        <div class="bg-white p-6 rounded-lg shadow mb-8">
            <h2 class="text-xl font-semibold mb-4">Upload Multiple Images</h2>
            <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data"
                class="flex items-center gap-4">
                @csrf
                <input type="file" name="images[]" multiple required
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">Upload</button>
            </form>
        </div>

        @if(session('success'))
            <p class="mb-6 text-green-600 font-semibold">{{ session('success') }}</p>
        @endif

        <!-- Uploaded Images -->
        <h2 class="text-2xl font-semibold mb-4">Uploaded Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($photos as $photo)
                <div class="bg-white rounded-lg shadow p-4 text-center">
                    <img src="{{ asset('images/' . $photo->image) }}" alt="Image" class="w-full h-40 object-cover rounded">
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $photos->links('pagination::tailwind') }}
        </div>
    </div>
</body>

</html>