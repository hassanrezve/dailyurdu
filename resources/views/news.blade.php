@extends('layouts.app')

@section('title', $post->title)

@section('content')
<main class="container mx-auto px-4 mt-[72px]">
    <!-- Top Banner Ad Space -->
    <div class="mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100">
            <div class="w-full h-[90px] bg-slate-100 rounded-xl flex items-center justify-center">
                <div class="text-center">
                    <div class="text-slate-400 text-sm font-semibold mb-1">Advertisement</div>
                    <div class="text-slate-500 text-xs urdu-text">اشتہار</div>
                    <div class="text-slate-400 text-xs mt-1">728 x 90 Banner</div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Content -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-3">
            <!-- Article Header -->
            <div class="mb-8">
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    @foreach($post->categories as $category)
                        <a href="{{$category->url()}}" class="bg-indigo-500 text-white px-4 py-2 rounded-full text-sm urdu-text font-medium">
                            {{$category->name}}
                        </a>
                   @endforeach
                </div>
                <span class="text-slate-500 text-sm urdu-text">{{$post->created_at->diffForHumans()}}</span>
                <h1 class="text-4xl mt-4 font-bold text-slate-800 mb-6 urdu-text leading-relaxed">
                   {{$post->title}}
                </h1>
                <p class="text-slate-400 text-xs urdu-text mb-3">👁️ {{$post->views}} بار دیکھا گیا</p>
                <div class="flex items-center space-x-4 space-x-reverse text-slate-500 text-sm">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        <span class="urdu-text">ایڈمن</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="urdu-text">پاکستان</span>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="{{$post->image}}" alt="{{$post->title}}" class="w-full h-[400px] object-cover rounded-2xl">
                <p class="text-slate-500 text-sm mt-2 urdu-text text-center">{{$post->title}}</p>
            </div>

            <!-- In-Content Ad Space -->
            <div class="my-8">
                <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100">
                    <div class="w-full h-[250px] bg-slate-100 rounded-xl flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-slate-400 text-sm font-semibold mb-1">Advertisement</div>
                            <div class="text-slate-500 text-xs urdu-text">اشتہار</div>
                            <div class="text-slate-400 text-xs mt-1">300 x 250 Banner</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none mb-8 leading-[3] font-medium text-xl">
                {!! $post->content !!}
            </div>

            <!-- Bottom Ad Space -->
            <div class="mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100">
                    <div class="w-full h-[90px] bg-slate-100 rounded-xl flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-slate-400 text-sm font-semibold mb-1">Advertisement</div>
                            <div class="text-slate-500 text-xs urdu-text">اشتہار</div>
                            <div class="text-slate-400 text-xs mt-1">728 x 90 Banner</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tags -->
            <div class="mb-8">
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="bg-slate-100 text-slate-600 px-4 py-2 rounded-full text-sm urdu-text hover:bg-slate-200 transition-colors">
                        #سیاست
                    </a>
                    <a href="#" class="bg-slate-100 text-slate-600 px-4 py-2 rounded-full text-sm urdu-text hover:bg-slate-200 transition-colors">
                        #وزیر_اعظم
                    </a>
                    <a href="#" class="bg-slate-100 text-slate-600 px-4 py-2 rounded-full text-sm urdu-text hover:bg-slate-200 transition-colors">
                        #نئی_پالیسی
                    </a>
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="flex items-center space-x-4 space-x-reverse mb-12">
                <span class="text-slate-600 urdu-text">شیئر کریں:</span>
                <button onclick="openShareModal()" class="text-slate-400 hover:text-indigo-600 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                    </svg>
                </button>
                <a href="#" class="text-slate-400 hover:text-indigo-600 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                </a>
                <a href="#" class="text-slate-400 hover:text-indigo-600 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                </a>
            </div>

            <!-- Related News -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-slate-800 mb-6 urdu-text flex items-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-indigo-600 to-purple-600 rounded-full ml-3"></div>
                    متعلقہ خبریں
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1540910419892-4a36d2c3266c?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">سیاست</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                قومی اسمبلی میں اہم بل کی منظوری
                            </h3>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400 text-xs urdu-text">1 گھنٹہ پہلے</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-sm">تفصیل</a>
                            </div>
                        </div>
                    </article>
                    <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1576085898323-218337e3e43c?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">سیاست</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                وزیر خارجہ کا اہم بیان
                            </h3>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400 text-xs urdu-text">2 گھنٹے پہلے</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-sm">تفصیل</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            @include('partials.sidebar-latest-news')
            @include('partials.sidebar-popular-articles')
            @include('partials.sidebar-weather')
        </div>
    </div>
</main>

<!-- Share Modal -->
<div id="shareModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6">
            <!-- Modal Header -->
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-slate-800 urdu-text">شیئر کریں</h3>
                <button onclick="closeShareModal()" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>

            <!-- Link Section -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 mb-2 urdu-text">پوسٹ کا لنک</label>
                <div class="flex">
                    <input type="text" id="shareLink" value="{{$post->url()}}" readonly class="flex-1 px-3 py-2 border border-slate-300 rounded-r-lg bg-slate-50 text-slate-600 text-sm">
                    <button onclick="copyLink()" class="bg-indigo-600 text-white px-4 py-2 rounded-l-lg hover:bg-indigo-700 transition-colors text-sm font-medium">
                        کاپی
                    </button>
                </div>
                <div id="copyMessage" class="text-green-600 text-xs mt-1 hidden urdu-text">لنک کاپی ہو گیا!</div>
            </div>

            <!-- Social Media Buttons -->
            <div class="space-y-3">
                <h4 class="text-sm font-medium text-slate-700 mb-3 urdu-text">سوشل میڈیا پر شیئر کریں</h4>

                <!-- Facebook -->
                <button onclick="shareToFacebook()" class="w-full flex items-center space-x-3 space-x-reverse p-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    <span class="urdu-text">فیس بک پر شیئر کریں</span>
                </button>

                <!-- Twitter/X -->
                <button onclick="shareToTwitter()" class="w-full flex items-center space-x-3 space-x-reverse p-3 bg-black text-white rounded-xl hover:bg-gray-800 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                    <span class="urdu-text">ٹویٹر پر شیئر کریں</span>
                </button>

                <!-- WhatsApp -->
                <button onclick="shareToWhatsApp()" class="w-full flex items-center space-x-3 space-x-reverse p-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                    </svg>
                    <span class="urdu-text">واٹس ایپ پر شیئر کریں</span>
                </button>

                <!-- Telegram -->
                <button onclick="shareToTelegram()" class="w-full flex items-center space-x-3 space-x-reverse p-3 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                    </svg>
                    <span class="urdu-text">ٹیلیگرام پر شیئر کریں</span>
                </button>

                <!-- LinkedIn -->
                <button onclick="shareToLinkedIn()" class="w-full flex items-center space-x-3 space-x-reverse p-3 bg-blue-700 text-white rounded-xl hover:bg-blue-800 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                    <span class="urdu-text">لنکڈ ان پر شیئر کریں</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openShareModal() {
        document.getElementById('shareModal').classList.remove('hidden');
    }

    function closeShareModal() {
        document.getElementById('shareModal').classList.add('hidden');
    }

    function copyLink() {
        const linkInput = document.getElementById('shareLink');
        linkInput.select();
        linkInput.setSelectionRange(0, 99999);
        document.execCommand('copy');

        const copyMessage = document.getElementById('copyMessage');
        copyMessage.classList.remove('hidden');
        setTimeout(() => {
            copyMessage.classList.add('hidden');
        }, 2000);
    }

    function shareToFacebook() {
        const url = encodeURIComponent(document.getElementById('shareLink').value);
        const text = encodeURIComponent('DailyUrdu');
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`, '_blank');
    }

    function shareToTwitter() {
        const url = encodeURIComponent(document.getElementById('shareLink').value);
        const text = encodeURIComponent('DailyUrdu');
        window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
    }

    function shareToWhatsApp() {
        const url = encodeURIComponent(document.getElementById('shareLink').value);
        const text = encodeURIComponent('DailyUrdu');
        window.open(`https://wa.me/?text=${text}%20${url}`, '_blank');
    }

    function shareToTelegram() {
        const url = encodeURIComponent(document.getElementById('shareLink').value);
        const text = encodeURIComponent('DailyUrdu');
        window.open(`https://t.me/share/url?url=${url}&text=${text}`, '_blank');
    }

    function shareToLinkedIn() {
        const url = encodeURIComponent(document.getElementById('shareLink').value);
        const text = encodeURIComponent('DailyUrdu');
        window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank');
    }

    // Close modal when clicking outside
    document.getElementById('shareModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeShareModal();
        }
    });
</script>
@endsection
