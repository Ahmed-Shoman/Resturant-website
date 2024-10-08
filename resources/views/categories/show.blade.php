<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($category->menus as $menu)

      <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
        <img class="w-full h-48" src="{{ asset($menu->image) }}"/>
        <div class="px-6 py-4">
          <div class="flex mb-2">
            <span class="px-6 py-0.5 text-sm bg-red-500 rounded-full text-red-50">{{ $menu->name }}</span>
          </div>
          <p class="leading-normal text-gray-700">{{ $menu->description}}</p>
        </div>
        <div class="flex items-center justify-between p-4">
          <span class="text-xl text-green-600">{{ $menu->price }}</span>
        </div>
      </div></div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
