<x-guest-layout>
    <div class="container w-1/3 mx-auto px-3 py-9">

        <form  method="POST" action="{{route('reservations.step.one')}}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 " enctype="multipart/form-data">
            @csrf
            @error('firstname')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            <div class="mb-6">
                <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">firstname</label>
                <input type="text" id="firstname" name="firstname" value="{{$Reservation->firstname ??''}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('firstname') is-invalid @enderror"  >
            </div>
            @error('lastname')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            <div class="mb-6">
                <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">lastname</label>
                <input type="text" id="lastname" name="lastname"  value="{{$Reservation->lastname ??''}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('lastname') is-invalid @enderror" >
            </div>
            @error('tel_number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            <div class="mb-6">
                <label for="tel_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tel_number</label>
                <input type="string" id="tel_number" name="tel_number"  value="{{$Reservation->tel_number ??''}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" >
            </div>
            @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                <input type="email" id="email" name="email"  value="{{$Reservation->email ??''}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>
            @error('res_data')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-6">
        <label for="res_data" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">res_data</label>
        <input type="datetime-local" id="res_data" name="res_data"
            min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
            max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
            value="{{ $Reservation ? $Reservation->res_data->format('Y-m-d\TH:i:s') : '' }}>"
         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="YYYY-MM-DD HH:MM" >
    </div>


              @error('gust_number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
            <div class="mb-6">
                <label for="gust_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">gust_number</label>
                <input type="number" id="gust_number" name="gust_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>

            <div class="mb-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next Step</button>
            </div>
        </form>

    </div>
</x-guest-layout>
