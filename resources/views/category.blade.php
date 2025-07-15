@extends('layouts.app')

@section('title', 'سیاست - روزانہ اردو')

@section('content')
<main class="container mx-auto px-4 mt-[72px]">
    <!-- Top Banner Ad Space -->
    <div class="mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100">

                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1790652247481380"
                        crossorigin="anonymous"></script>
                <!-- category top -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1790652247481380"
                     data-ad-slot="7683062902"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>

        </div>
    </div>

    <!-- Category Content -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-3">
            <!-- Category Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-slate-800 my-4 urdu-text">{{$category->name}}</h1>
                <p class="text-slate-600 urdu-text text-lg mt-4">تازہ ترین خبریں اور اپڈیٹس</p>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- News Article 1 -->
                @foreach($posts as $post)
                <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                    <div class="relative">
                        <a href="{{ $post->url() }}">
                            <img src="{{$post->image}}" alt="{{$category->name}}" class="w-full h-48 object-cover">
                        </a>
                        <div class="absolute top-4 right-4">
                            <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">سیاست</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-loose">
                            <a href="{{ $post->url() }}">{{$post->title}}</a>
                        </h3>
                        <p class="text-slate-600 text-sm urdu-text leading-loose mb-4">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400 text-xs urdu-text">{{$post->date}}</span>
                            <span class="text-slate-400 text-xs urdu-text">👁️ {{$post->views}} بار دیکھا گیا</span>
                            <a href="{{$post->url()}}" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-sm">تفصیل</a>
                        </div>
                    </div>
                </article>
                @endforeach

            </div>



            <!-- Bottom Ad Space -->
            <div class="mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100">

                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1790652247481380"
                                crossorigin="anonymous"></script>
                        <!-- category bottom -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-1790652247481380"
                             data-ad-slot="2388799893"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>

                </div>
            </div>

            {{$posts->links()}}
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <x-sidebar/>
        </div>
    </div>
</main>
@endsection
