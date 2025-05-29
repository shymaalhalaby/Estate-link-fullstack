<x-app-layout>
     <x-slot name="header">
        <h2 class=" text-center font-semibold text-3xl text-white leading-tight">
            {{ __('Add , Edit And Delete Your Estates') }}
        </h2>
    </x-slot>
    <!-- خلفية الصفحة -->
   <div class="p-8 bg-gradient-to-br from-navy to-babyblue min-h-screen">




        <!-- زر إضافة عقار جديد -->
        <div class="mb-6 text-right">
            <a href="{{ route('estates.create') }}" class="bg-orange hover:bg-orange-dark text-white px-6 py-2 rounded font-semibold shadow">
                + Add New Estate
            </a>
        </div>

        <!-- جدول العقارات مع خلفية متدرجة -->
        <div class="overflow-x-auto rounded-lg shadow p-1">
            <div class="bg-gradient-to-r from-white via-babyblue to-white rounded-lg p-6">
                @if($estates->count())
                    <table class="min-w-full table-auto border-collapse border border-gray-300 text-sm sm:text-base bg-white bg-opacity-70 rounded">
                        <thead class="bg-babyblue text-navy font-semibold">
                            <tr>
                                <th class="border px-4 text-lg py-2">Image</th>
                                <th class="border px-4 text-lg py-2">Title</th>
                                <th class="border px-4 text-lg py-2">Address</th>
                                <th class="border px-4 text-lg py-2">Type</th>
                                <th class="border px-4 text-lg py-2">Price</th>
                                <th class="border px-4 text-lg py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($estates as $estate)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2 text-center">
                                    @if($estate->image_path)
                                        <img src="{{ asset(  $estate->image_path) }}" class="h-16 w-24 object-cover rounded mx-auto">
                                    @else
                                        <span class="text-gray-400 italic">No Image</span>
                                    @endif
                                </td>
                                <td class="border text-center items-center text-lg font-semibold ">{{ $estate->title }}</td>
                                <td class="border text-center px-4 py-2">{{ $estate->address }}</td>
                                <td class="border text-center px-4 py-2">{{ $estate->type }}</td>
                                <td class="border text-center  text-orange px-4 py-2">${{ $estate->price }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('estates.edit', $estate) }}" class="bg-babyblue text-navy px-6 py-2 w-28 inline-block text-center rounded hover:bg-orange hover:shadow transition">Edit</a>
                                    <form action="{{ route('estates.destroy', $estate) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-babyblue text-navy px-6 py-2 w-28 inline-block text-center rounded hover:bg-red-600 hover:shadow transition">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-700">You have no estates yet.</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
