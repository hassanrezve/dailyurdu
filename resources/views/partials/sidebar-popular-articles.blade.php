<div class="bg-white rounded-2xl mb-8 shadow-lg p-6 border border-slate-100">
    <h3 class="text-2xl font-bold text-slate-800 mb-6 urdu-text flex items-center">
        <div class="w-1 h-8 bg-gradient-to-b from-orange-500 to-red-500 rounded-full ml-3"></div>
        مقبول خبریں
    </h3>
    <div class="space-y-4">
        @php
            $articles = isset($popularArticles) ? $popularArticles : (isset($recentArticles) ? $recentArticles : []);
        @endphp
        @foreach($articles as $i => $article)
            <div class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg hover:bg-slate-50 transition-colors">
                <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold shadow-lg">{{ $i+1 }}</div>
                <div>
                    <p class="text-sm font-medium text-slate-800 urdu-text leading-relaxed mb-1">
                        @if(is_object($article) && isset($article->slug))
                            <a href="{{ route('post.show', $article->slug) }}" class="hover:text-indigo-600 transition-colors">{{ $article->title }}</a>
                        @else
                            {{ is_object($article) ? $article->title : $article['title'] }}
                        @endif
                    </p>
                    <span class="text-slate-400 text-xs urdu-text">
                        {{ is_object($article) && isset($article->created_at) ? $article->created_at->diffForHumans() : (isset($article['time']) ? $article['time'] : '') }}
                        @if(is_object($article) && isset($article->views))
                            <span class="ml-2 text-slate-400">👁️ {{ $article->views }} بار دیکھا گیا</span>
                        @endif
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>