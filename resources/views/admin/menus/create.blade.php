<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menus Form</title>
    <style>
        /* Tailwind CSS CDN */
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <a href="{{ route('admin.menus.index') }}" class="inline-block mb-4 text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-500 dark:hover:bg-purple-600 dark:focus:ring-purple-800">Menus Index</a>
        
        <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            @error('name') 
            <div class="text-sm text-red-400"> {{$message}}  </div>
            @enderror
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            @error('image') 
            <div class="text-sm text-red-400"> {{$message}}  </div>
            @enderror
            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                <input type="text" id="price" name="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            @error('price') 
            <div class="text-sm text-red-400"> {{$message}}  </div>
            @enderror
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea id="description" name="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            @error('description') 
            <div class="text-sm text-red-400"> {{$message}}  </div>
            @enderror
            <div class="mb-4">
                <label for="categories" class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                <select id="categories" name="categories[]" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('categories') 
            <div class="text-sm text-red-400"> {{$message}}  </div>
            @enderror
            <div class="flex justify-end">
                <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">Store</button>
            </div>
        </form>
    </div>
</body>
</html>
