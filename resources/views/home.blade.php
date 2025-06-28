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
                        <span class="urdu-text font-semibold text-lg">اہم خبر: پاکستان میں نئی ٹیکنالوجی کا اعلان</span>
                    </div>
                </div>
            </div>

            <!-- Featured Article -->
            <article class="news-card bg-white rounded-3xl shadow-lg overflow-hidden mb-12 border border-slate-100">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1576086213369-97a306d36557?w=800&h=400&fit=crop" alt="خبر کی تصویر" class="w-full h-80 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-4 right-4">
                        <span class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm urdu-text font-medium">سیاست</span>
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center space-x-2 space-x-reverse text-slate-500 text-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="urdu-text">2 گھنٹے پہلے</span>
        </div>
        </div>
                    <h2 class="text-3xl font-bold text-slate-800 mb-4 urdu-text leading-relaxed">
                        پاکستان میں نئی حکومتی پالیسی کا اعلان - شہریوں کے لیے بہتری کے اقدامات
                    </h2>
                    <p class="text-slate-600 urdu-text leading-relaxed mb-6 text-lg">
                        وزیر اعظم نے آج ایک اہم پریس کانفرنس میں نئی پالیسی کا اعلان کیا جس کا مقصد عوام کی فلاح و بہبود میں بہتری لانا ہے۔ اس پالیسی کے تحت مختلف شعبوں میں اصلاحات کی جائیں گی اور عوام کو بہتر سہولات فراہم کی جائیں گی۔
                    </p>
                    <div class="flex items-center justify-between">
                        <a href="#" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold urdu-text hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            مکمل خبر پڑھیں
                        </a>
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <button class="text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                                </svg>
                            </button>
                            <button class="text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </article>

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
                                        <img src="{{ asset($post->image) }}" alt="خبر" class="w-full h-48 object-cover">
                                        <div class="absolute top-4 right-4">
                                            <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">{{ $category->name }}</span>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                            {{ $post->title }}
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
            <!-- Latest News -->
            @include("partials.sidebar-latest-news")
       
            <!-- Popular Articles -->
            @include("partials.sidebar-popular-articles")
                 <!-- Weather Widget -->
         
                 @include("partials.sidebar-weather")
        </div>
    </div>
</main>
@endsection
