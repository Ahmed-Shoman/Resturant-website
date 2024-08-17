<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Form</title>
    <style>
        /* Tailwind CSS CDN */
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        <a href="{{ route('admin.tables.index') }}" class="inline-block mb-6 text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-500 dark:hover:bg-purple-600 dark:focus:ring-purple-800">Table Index</a>

        <form method="POST" action="{{route('admin.tables.store')}}">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="guest_number" class="block text-gray-700 text-sm font-bold mb-2">Guest Number</label>
                <input type="number" id="guest_number" name="guest_number" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                <select id="status" name="status" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
                    <option value="">Select Status</option>
                    <option value="pendig">Pending</option>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                <select id="status" name="location" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
                    <option value="">Select Location</option>
                    <option value="front">Front</option>
                    <option value="inside">Inside</option>
                    <option value="out">Out</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">Store</button>
            </div>
        </form>
    </div>
</body>
</html>
