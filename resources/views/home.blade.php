@extends('layouts.app')

@section('title', 'Daily Urdu – Daily Urdu News')

@section('content')
<!-- Main Content -->
<main class="container mx-auto px-4 py-12 mt-[72px]">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main News Section -->
        <div class="lg:col-span-3">
            <!-- Breaking News Banner -->
            <div class="relative mb-8 overflow-hidden">
                <div class="bg-gradient-to-r from-red-500 via-red-600 to-red-700 text-white p-4 rounded-2xl shadow-lg">
                    <div class="flex items-center">
                        <div class="bg-white text-red-600 px-4 py-2 rounded-full text-sm font-bold ml-4 animate-pulse">
                            <span class="urdu-text">لیڈ خبر</span>
                        </div>
                        <span class="urdu-text font-semibold text-lg">اہم خبر: {{ $feature ? $feature->title : 'تازہ ترین خبریں' }}</span>
                    </div>
                </div>
            </div>

            <!-- Featured Article -->
            @if($feature)
            <article class="news-card bg-white rounded-3xl shadow-lg overflow-hidden mb-12 border border-slate-100">
                <div class="relative">
                    <a href="{{ route('post.show', $feature->slug) }}">
                        <img src="{{ $feature->image }}" alt="{{ $feature->title }}" class="w-full h-80 object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </a>
                    <div class="absolute bottom-4 right-4">
                        @if($feature->categories->isNotEmpty())
                            <span class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm urdu-text font-medium">{{ $feature->categories->first()->name }}</span>
                        @endif
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center space-x-2 space-x-reverse text-slate-500 text-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="urdu-text">{{ $feature->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-800 mb-4 urdu-text leading-relaxed">
                        <a href="{{ route('post.show', $feature->slug) }}">{{ $feature->title }}</a>
                    </h2>
                    <p class="text-slate-600 urdu-text leading-relaxed mb-6 text-lg">
                        {{ Str::limit(strip_tags(html_entity_decode($feature->content)), 200) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('post.show', $feature->slug) }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold urdu-text hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            مکمل خبر پڑھیں
                        </a>
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <span class="text-slate-400 text-sm urdu-text">👁️ {{ $feature->views }} بار دیکھا گیا</span>
                        </div>
                    </div>
                </div>
            </article>
            @endif

            <!-- Category Sections -->
            @foreach($categories as $category)
                @if($category->posts->isNotEmpty())
                    <div class="mb-12">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-slate-800 urdu-text flex items-center">
                                <div class="w-1 h-8 bg-gradient-to-b from-indigo-600 to-purple-600 rounded-full ml-3"></div>
                                {{ $category->name }}
                            </h3>
                            <a href="{{ route('news.category', $category->slug) }}" class="text-indigo-600 hover:text-indigo-800 urdu-text text-sm">
                                تمام خبریں دیکھیں
                            </a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($category->posts as $post)
                                <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                                    <div class="relative">
                                        <a href="{{ route('post.show', $post->slug) }}">
                                            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                                        </a>
                                        <div class="absolute top-4 right-4">
                                            <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">{{ $category->name }}</span>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                            <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>
                                        <p class="text-slate-600 text-sm urdu-text leading-relaxed mb-4">
                                            {{ Str::limit(strip_tags($post->content), 120) }}
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-slate-400 text-xs urdu-text">{{ $post->created_at->diffForHumans() }}</span>
                                            <span class="text-slate-400 text-xs urdu-text">👁️ {{ $post->views }} بار دیکھا گیا</span>
                                            <a href="{{ route('post.show', $post->slug) }}" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-sm">تفصیل</a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
         <x-sidebar/>
        </div>
    </div>
</main>
@endsection
