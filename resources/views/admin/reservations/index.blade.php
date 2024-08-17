<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex justify-end my-4">
        <a href="{{ route('admin.reservations.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">New Reservation</a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Reservation Date</th>
                    <th scope="col" class="px-6 py-3">Table</th>
                    <th scope="col" class="px-6 py-3">Guests</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Reservations as $reservation)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$reservation->first_name}} {{$reservation->last_name}}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{$reservation->email}}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{$reservation->res_date}}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{$reservation->table_id}}
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{$reservation->guest_number}}
                        </td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{route('admin.reservations.edit',$reservation->id)}}" class="text-blue-600 dark:text-blue-500 hover:underline" >Edit</a>

                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
