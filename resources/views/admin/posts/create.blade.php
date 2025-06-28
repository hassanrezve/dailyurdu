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
            <label class="block text-gray-700">Categories <span class="text-red-500">*</span></label>
            <select name="categories[]" multiple required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" size="4">
                <option value="" disabled>Select at least one category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <p class="text-sm text-gray-500 mt-1">Hold Ctrl (or Cmd on Mac) to select multiple categories</p>
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
        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="featured" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ old('featured') ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">Featured Post (Show on Home Page)</span>
            </label>
            @error('featured')
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

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        ClassicEditor.create(document.querySelector('textarea[name="content"]'))
            .then(editor => {
                editor.ui.view.editable.element.style.minHeight = '400px';
            })
            .catch(error => console.error(error));
    });
</script>
@endpush
