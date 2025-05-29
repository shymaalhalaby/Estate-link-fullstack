<x-app-layout>
     <!-- Background Image Wrapper -->
    <div class="p-8 bg-gradient-to-br from-navy to-babyblue min-h-screen">

     <div class="p-4">
        <!-- Navigation Tabs -->
        <div class="flex space-x-4 border-b text-xl mb-4">
            @php $tab = request('type'); @endphp
            <a href="?type=sell" class="pb-2 {{ $tab == 'sell' ? 'border-b-2 border-orange text-orange font-semibold' : 'text-white hover:text-orange' }}">Buy</a>
            <a href="?type=rent" class="pb-2 {{ $tab == 'rent' ? 'border-b-2 border-orange text-orange font-semibold' : 'text-white hover:text-orange' }}">Rent</a>
        </div>

<form method="GET" action="{{ route('estates.index') }}" class="flex flex-wrap gap-2 mb-4">
    <input type="text" name="address" placeholder="Address"
        class="border rounded p-4 flex-1 min-w-[200px]" value="{{ request('address') }}">
    <input type="number" name="price" placeholder="Max Price"
        class="border rounded p-4 flex-1 min-w-[200px]" value="{{ request('price') }}">
    <button class="bg-orange text-white px-6 py-2 rounded">Search</button>
</form>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @forelse ($estates as $estate)
                <a href="{{ route('estates.show', $estate) }}" class="border rounded overflow-hidden hover:shadow-lg">
                    @if ($estate->image_path)
                        <img src="{{ asset(  $estate->image_path) }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg text-center font-bold border px-4 py-2 border-black text-black">{{ $estate->title }}</h3>
                        <p class="text-lg  text-babyblue">{{ $estate->address }}</p>
                        <p class="text-lg text-center text-orange">{{ ucfirst($estate->type) }} - ${{ $estate->price }}</p>
                    </div>
                </a>
            @empty
                <p>No estates found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
