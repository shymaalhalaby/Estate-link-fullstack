<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-3xl text-white leading-tight">
            {{ __('Add Estate') }}
        </h2>
    </x-slot>

    <!-- خلفية الصفحة -->
    <div class="p-8 bg-gradient-to-br from-navy to-babyblue min-h-screen">
        <div class="max-w-3xl mx-auto overflow-x-auto rounded-lg shadow p-1">
            <div class="bg-gradient-to-r from-babyblue to-white rounded-lg p-6">
                <form method="POST" action="{{ route('estates.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label class="block text-navy font-semibold">Title</label>
                        <input type="text" name="title" class="w-full border border-gray-300 rounded p-2" value="{{ old('title') }}" required>
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-navy font-semibold">Address</label>
                        <input type="text" name="address" class="w-full border border-gray-300 rounded p-2" value="{{ old('address') }}" required>
                    </div>

                    <!-- Type -->
                    <div>
                        <label class="block text-navy font-semibold">Type</label>
                        <select name="type" class="w-full border border-gray-300 rounded p-2" required>
                            <option value="sell">Sell</option>
                            <option value="rent">Rent</option>
                        </select>
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-navy font-semibold">Price</label>
                        <input type="number" name="price" class="w-full border border-gray-300 rounded p-2" value="{{ old('price') }}" required>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-navy font-semibold">Description</label>
                        <textarea name="description" class="w-full border border-gray-300 rounded p-2" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-navy font-semibold">Image</label>
                        <input type="file" name="image" class="w-full border border-gray-300 rounded p-2">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="bg-orange hover:bg-orange-dark text-white px-6 py-2 rounded font-semibold shadow transition">
                            Create Estate
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
