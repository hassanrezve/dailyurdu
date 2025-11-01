@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto px-3">
    <h1 class="text-2xl font-semibold mb-6">Edit Category</h1>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.categories.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection 