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

        <form method="POST" action="{{route('admin.reservations.store')}}">
            @csrf
            <div class="mb-6">
                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
                <input type="text" id="first_name" name="first_name" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2"> Last Name</label>
                <input type="text" id="last_name" name="last_name" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2"> Email</label>
                <input type="email" id="email" name="email" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="tel_number" class="block text-gray-700 text-sm font-bold mb-2"> Phone Number</label>
                <input type="tel_number" id="tel-number" name="tel_number" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="res_date" class="block text-gray-700 text-sm font-bold mb-2"> Reservation Date </label>
                <input type="datetime-local" id="res_date" name="res_date" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
            </div>

            <div class="mb-6">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                <select id="status" name="status" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
                    <option value="">Select Status</option>
                    <option value="pending">Pending</option>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="table_id" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                <select id="table_id" name="table_id" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500" required>
                  @foreach ($tables as $table)
                  <option value="{{$table->id}}">{{$table->name}}   ({{$table->guest_number}}-guests )</option>
                      
                  @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">Store</button>
            </div>
        </form>
    </div>
</body>
</html>
