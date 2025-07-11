@extends('layouts.app')

@section('title', 'تلاش کے نتائج')

@section('content')
<main class="container mx-auto px-2 sm:px-4 py-6 sm:py-12 mt-[72px]">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 sm:gap-8">
        <!-- Main Search Results Section -->
        <div class="lg:col-span-3">
            <h1 class="text-2xl sm:text-3xl font-bold urdu-text mb-6 sm:mb-8">تلاش کے نتائج @if(isset($query) && $query) : <span class="text-indigo-600">"{{ $query }}"</span> @endif</h1>
            @forelse ($posts as $post)
                <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100 mb-6 sm:mb-8">
                    <div class="flex flex-col md:flex-row">
                        <a href="{{ route('post.show', $post->slug) }}">
                            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full md:w-64 h-48 object-cover" style="max-width: 100%;" onerror="this.onerror=null;this.src='{{ asset('noimage.png') }}';">
                        </a>
                        <div class="p-4 sm:p-6 flex-1">
                            <div class="flex flex-wrap gap-2 mb-2">
                                @foreach($post->categories as $category)
                                    <span class="bg-indigo-100 text-indigo-700 px-2 py-1.5 rounded-full text-xs urdu-text font-medium leading-normal">{{ $category->name }}</span>
                                @endforeach
                            </div>
                            <h2 class="text-lg sm:text-xl font-semibold text-slate-800 mb-2 sm:mb-3 urdu-text leading-relaxed">
                                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                            </h2>
                            <p class="text-slate-600 text-xs sm:text-sm urdu-text leading-relaxed mb-3 sm:mb-4">{!! Str::limit(strip_tags($post->content), 120) !!}</p>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                <span class="text-slate-400 text-xs urdu-text">{{ $post->created_at ? $post->created_at->diffForHumans() : '' }}</span>
                                <span class="text-slate-400 text-xs urdu-text">👁️ {{ $post->views }} بار دیکھا گیا</span>
                                <a href="{{ route('post.show', $post->slug) }}" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-xs sm:text-sm">تفصیل</a>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 text-center urdu-text text-lg sm:text-xl text-slate-500">
                    کوئی نتائج نہیں ملے۔
                </div>
            @endforelse
            <div class="mt-6 sm:mt-8">{{ $posts->appends(['q' => request('q')])->links() }}</div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 mt-8 lg:mt-0">
            <!-- Latest News -->
            <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 mb-6 sm:mb-8 border border-slate-100">
                <h3 class="text-xl sm:text-2xl font-bold text-slate-800 mb-4 sm:mb-6 urdu-text flex items-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-indigo-600 to-purple-600 rounded-full ml-3"></div>
                    تازہ ترین خبریں
                </h3>
                <div class="space-y-4 sm:space-y-5">
                    <div class="flex items-start space-x-2 sm:space-x-3 space-x-reverse p-2 sm:p-3 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="bg-red-500 w-3 h-3 rounded-full mt-2 flex-shrink-0 animate-pulse"></div>
                        <div>
                            <h4 class="font-semibold text-slate-800 urdu-text text-xs sm:text-sm leading-relaxed">کراچی میں بارش کے بعد حالات بہتر</h4>
                            <p class="text-slate-500 text-xs mt-1 urdu-text">30 منٹ پہلے</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-2 sm:space-x-3 space-x-reverse p-2 sm:p-3 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="bg-indigo-500 w-3 h-3 rounded-full mt-2 flex-shrink-0"></div>
                        <div>
                            <h4 class="font-semibold text-slate-800 urdu-text text-xs sm:text-sm leading-relaxed">لاہور میں تعلیمی اصلاحات کا آغاز</h4>
                            <p class="text-slate-500 text-xs mt-1 urdu-text">1 گھنٹہ پہلے</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-2 sm:space-x-3 space-x-reverse p-2 sm:p-3 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="bg-emerald-500 w-3 h-3 rounded-full mt-2 flex-shrink-0"></div>
                        <div>
                            <h4 class="font-semibold text-slate-800 urdu-text text-xs sm:text-sm leading-relaxed">اسلام آباد میں نئے پروجیکٹ کا اعلان</h4>
                            <p class="text-slate-500 text-xs mt-1 urdu-text">2 گھنٹے پہلے</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weather Widget -->
            <div class="bg-gradient-to-br from-indigo-500 via-purple-500 to-indigo-600 text-white rounded-2xl p-4 sm:p-6 mb-6 sm:mb-8 shadow-lg">
                <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4 urdu-text">موسمی حالات</h3>
                <div class="space-y-3 sm:space-y-4">
                    <div class="flex items-center justify-between bg-white/20 rounded-xl p-3 sm:p-4 backdrop-blur-sm">
                        <div>
                            <p class="text-xs sm:text-sm urdu-text opacity-90">کراچی</p>
                            <p class="text-lg sm:text-2xl font-bold">32°C</p>
                        </div>
                        <div class="text-yellow-300">
                            <svg class="w-8 sm:w-10 h-8 sm:h-10" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between bg-white/20 rounded-xl p-3 sm:p-4 backdrop-blur-sm">
                        <div>
                            <p class="text-xs sm:text-sm urdu-text opacity-90">لاہور</p>
                            <p class="text-lg sm:text-2xl font-bold">28°C</p>
                        </div>
                        <div class="text-gray-300">
                            <svg class="w-8 sm:w-10 h-8 sm:h-10" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular Articles -->
            <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 border border-slate-100">
                <h3 class="text-xl sm:text-2xl font-bold text-slate-800 mb-4 sm:mb-6 urdu-text flex items-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-orange-500 to-red-500 rounded-full ml-3"></div>
                    حالیہ مضامین
                </h3>
                <div class="space-y-3 sm:space-y-4">
                    @foreach($recentArticles as $i => $article)
                        <div class="flex items-center space-x-2 sm:space-x-3 space-x-reverse p-2 sm:p-3 rounded-lg hover:bg-slate-50 transition-colors">
                            <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white w-6 sm:w-8 h-6 sm:h-8 rounded-full flex items-center justify-center text-xs sm:text-sm font-bold shadow-lg">{{ $i+1 }}</div>
                            <div>
                                <p class="text-xs sm:text-sm font-medium text-slate-800 urdu-text leading-relaxed mb-1">{{ $article->title }}</p>
                                <span class="text-slate-400 text-xs urdu-text">{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
