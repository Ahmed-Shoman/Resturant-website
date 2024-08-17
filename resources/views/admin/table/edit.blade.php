<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Edit Form</title>
    <style>
        /* Tailwind CSS CDN */
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        <a href="{{ route('admin.tables.index') }}"
            class="inline-block mb-6 text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-500 dark:hover:bg-purple-600 dark:focus:ring-purple-800">
            Table
        </a>

        <form method="POST" action="{{ route('admin.tables.update', $table->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" value="{{ $table->name }}"
                    class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500"
                    required>
            </div>

            <div class="mb-6">
                <label for="guest_number" class="block text-gray-700 text-sm font-bold mb-2">Guest Number</label>
                <input type="number" id="guest_number" name="guest_number" value="{{ $table->guest_number }}"
                    class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-500"
                    required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Table
                </button>
            </div>
        </form>
    </div>
</body>
