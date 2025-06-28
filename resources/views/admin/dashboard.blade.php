@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
            <p class="mt-1 text-sm text-gray-600">Welcome to the admin panel</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Posts</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $stats['total_posts'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Published Posts</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $stats['published_posts'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Categories</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $stats['total_categories'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Subscribers</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $stats['total_subscribers'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Posts and Popular Posts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Posts -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Recent Posts</h3>
                <div class="space-y-4">
                    @forelse($stats['recent_posts'] as $post)
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                @if($post->image_url)
                                    <img class="h-10 w-10 rounded object-cover" src="{{ asset($post->image_url) }}" alt="{{ $post->title }}">
                                @else
                                    <div class="h-10 w-10 rounded bg-gray-200 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="hover:text-blue-600">
                                        {{ $post->title }}
                                    </a>
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $post->created_at->diffForHumans() }} • 
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $post->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No posts yet.</p>
                    @endforelse
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.posts.index') }}" class="text-sm text-blue-600 hover:text-blue-500">View all posts →</a>
                </div>
            </div>
        </div>

        <!-- Popular Posts -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Popular Posts</h3>
                <div class="space-y-4">
                    @forelse($stats['popular_posts'] as $post)
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                @if($post->image_url)
                                    <img class="h-10 w-10 rounded object-cover" src="{{ asset($post->image_url) }}" alt="{{ $post->title }}">
                                @else
                                    <div class="h-10 w-10 rounded bg-gray-200 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="hover:text-blue-600">
                                        {{ $post->title }}
                                    </a>
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ number_format($post->views) }} views • {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No posts yet.</p>
                    @endforelse
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.posts.index') }}" class="text-sm text-blue-600 hover:text-blue-500">View all posts →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
            <div class="flex space-x-4">
                <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create Post
                </a>
                <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create Category
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 