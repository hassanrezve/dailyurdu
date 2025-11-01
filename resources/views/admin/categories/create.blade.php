@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto px-3">
    <h1 class="text-2xl font-semibold mb-6">Create Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col sm:flex-row sm:justify-end gap-3">
            <a href="{{ route('admin.categories.index') }}" class="sm:mr-4 text-center text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Create</button>
        </div>
    </form>
</div>
@endsection
