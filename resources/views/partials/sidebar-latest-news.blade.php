<div class="bg-white rounded-2xl shadow-lg p-6 mb-8 border border-slate-100">
                <h3 class="text-2xl font-bold text-slate-800 mb-6 urdu-text flex items-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-indigo-600 to-purple-600 rounded-full ml-3"></div>
                    تازہ ترین خبریں
                </h3>
                <div class="space-y-5">
                    @php
                        $newsList = isset($latestNews) ? $latestNews : (isset($globalLatestNews) ? $globalLatestNews : []);
                    @endphp
                    @foreach($newsList as $news)
                        <div class="flex items-start space-x-3 space-x-reverse p-3 rounded-lg hover:bg-slate-50 transition-colors">
                            <div class="bg-red-500 w-3 h-3 rounded-full mt-2 flex-shrink-0 animate-pulse"></div>
                            <div>
                                <h4 class="font-semibold text-slate-800 urdu-text text-sm leading-relaxed">
                                    @if(is_object($news) && isset($news->slug))
                                        <a href="{{ route('post.show', $news->slug) }}" class="hover:text-indigo-600 transition-colors">{{ $news->title }}</a>
                                    @else
                                        {{ is_object($news) ? $news->title : $news['title'] }}
                                    @endif
                                </h4>
                                <p class="text-slate-500 text-xs mt-1 urdu-text">
                                    {{ is_object($news) && isset($news->created_at) ? $news->created_at->diffForHumans() : (isset($news['time']) ? $news['time'] : '') }}
                                    @if(is_object($news) && isset($news->views))
                                        <span class="ml-2 text-slate-400">👁️ {{ $news->views }} بار دیکھا گیا</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
