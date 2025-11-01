@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">Create Post</a>
</div>

<!-- Desktop/tablet table -->
<div class="hidden sm:block bg-white shadow overflow-x-auto sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categories</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Views</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($posts as $post)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @foreach($post->categories as $cat)
                            <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded mr-1">{{ $cat->name }}</span>
                        @endforeach
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $post->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ ucfirst($post->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($post->featured)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                ⭐ Featured
                            </span>
                        @else
                            <span class="text-gray-400 text-xs">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($post->views) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </table>
</div>

<!-- Mobile card list -->
<div class="sm:hidden space-y-3 mx-auto px-3">
    @forelse($posts as $post)
        <div class="bg-white rounded border shadow p-3">
            <div class="flex items-start justify-between gap-2">
                <div class="min-w-0">
                    <div class="text-base font-semibold truncate">{{ $post->title }}</div>
                    <div class="mt-1 space-x-1 space-y-1">
                        @foreach($post->categories as $cat)
                            <span class="inline-block bg-gray-100 text-gray-800 text-[11px] px-2 py-0.5 rounded">{{ $cat->name }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="text-right shrink-0">
                    <div class="text-xs {{ $post->status === 'published' ? 'text-green-700' : 'text-yellow-700' }}">
                        {{ ucfirst($post->status) }}
                    </div>
                    <div class="text-xs text-gray-500">{{ number_format($post->views) }} views</div>
                </div>
            </div>
            <div class="mt-2 flex items-center justify-between">
                <div class="text-xs">
                    @if($post->featured)
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-purple-100 text-purple-800">Featured</span>
                    @endif
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 text-sm">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 text-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-gray-500">No posts found.</p>
    @endforelse
</div>

<div class="mt-4">
    {{ $posts->links() }}
</div>
@endsection 
