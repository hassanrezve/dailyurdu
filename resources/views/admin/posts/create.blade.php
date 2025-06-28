@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-semibold mb-6">Create Post</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Categories</label>
            <select name="categories[]" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categories')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Image</label>
            <input type="file" name="image_url" class="mt-1 block w-full">
            @error('image_url')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Status</label>
            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.posts.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create</button>
        </div>
    </form>
</div>
@endsection 