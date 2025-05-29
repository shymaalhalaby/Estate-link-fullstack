<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-3xl text-white leading-tight">
            {{ $estate->title }}
        </h2>
        <p class="text-center text-white mt-2"><strong>TheOwner:</strong> {{ $estate->user->name }}</p>
    </x-slot>

    <!-- Page background -->
    <div class="p-8 bg-gradient-to-br from-navy to-babyblue min-h-screen">

        <!-- Estate card -->
        <div class="max-w-4xl mx-auto bg-white bg-opacity-80 shadow-xl rounded-lg p-6">
            @if ($estate->image_path)
                <img src="{{ asset( $estate->image_path) }}" class="w-full h-64 object-cover mb-6 rounded">
            @endif

            <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                <p><strong class="text-navy">Address:</strong> {{ $estate->address }}</p>
                <p><strong class="text-navy">Type:</strong> {{ ucfirst($estate->type) }}</p>
                <p><strong class="text-navy">Price:</strong> <span class="text-orange">${{ $estate->price }}</span></p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-navy mb-2">Description</h3>
                <p class="text-gray-800 leading-relaxed">{{ $estate->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
