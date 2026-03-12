<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

               <form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block mb-1 font-bold">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="border p-2 w-full">
        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-bold">Description</label>
        <textarea name="description" class="border p-2 w-full">{{ old('description') }}</textarea>
        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- Save Button (Submit) -->
    <button type="submit" class="bg-gray-500 hover:bg-gray-500 text-white px-6 py-2 rounded">
        Save
    </button>

    <!-- Cancel Button (Link back) -->
    <a href="{{ route('admin.categories.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
        Cancel
    </a>
</form>

            </div>
        </div>
    </div>
</x-app-layout>
