<!-- Top Banner -->
<div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-800 text-white py-3">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between text-sm">
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="flex items-center space-x-2 space-x-reverse">
                    <div class="w-2 h-2 bg-green-400 rounded-full pulse-ring"></div>
                    <span class="urdu-text">لائیو</span>
                </div>
                <span class="urdu-text">آج: {{ now()->format('l، d F Y') }}</span>
                <!-- Quick Search -->
                <div class="relative group">
                    <input type="text" class="w-48 pl-8 pr-3 py-1 text-sm bg-white/10 border border-white/20 rounded-full focus:outline-none focus:ring-2 focus:ring-white/30 text-white placeholder-white/70 transition-all duration-300 group-hover:w-64" placeholder="تلاش کریں...">
                    <button class="absolute left-2 top-1/2 transform -translate-y-1/2 text-white/70 hover:text-white">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
                <!-- Social Media Icons -->
                <div class="flex items-center space-x-3 space-x-reverse mr-4">
                    <a href="#" class="hover:text-indigo-200 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-indigo-200 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-indigo-200 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="hover:text-indigo-200 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="{{ route('privacy.policy') }}" class="text-sm hover:text-indigo-200 transition-colors urdu-text">رازداری کی پالیسی</a>
                <a href="{{ route('about') }}" class="text-sm hover:text-indigo-200 transition-colors urdu-text">ہمارے بارے میں</a>
                <a href="{{ route('contact') }}" class="text-sm hover:text-indigo-200 transition-colors urdu-text">رابطہ</a>
                <button id="searchButton" class="hover:text-indigo-200 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Search Modal -->
<div id="searchModal" class="fixed inset-0 bg-black bg-opacity-50 z-[200] hidden">
    <div class="min-h-screen px-4 text-center">
        <div class="fixed inset-0" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="inline-block h-screen align-middle" aria-hidden="true">&#8203;</span>
        <div class="inline-block w-full max-w-2xl p-6 my-8 text-right align-middle transition-all transform bg-white shadow-xl rounded-2xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-2xl font-bold text-slate-800 urdu-text">تلاش کریں</h3>
                <button id="closeSearchModal" class="text-slate-500 hover:text-slate-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form action="{{ route('news.search') }}" method="GET">
                <div class="relative mb-6">
                    <input type="text" id="searchInput" name="q" class="w-full px-4 py-3 text-lg border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="خبر، موضوع یا کلیدی الفاظ لکھیں...">
                    <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Popular Searches -->
            <div class="border-t border-slate-200 pt-6">
                <h4 class="text-sm font-semibold text-slate-600 mb-3 urdu-text">مقبول تلاش</h4>
                <div class="flex flex-wrap gap-2">
                    <button class="px-3 py-1 bg-slate-100 hover:bg-slate-200 rounded-full text-slate-700 text-sm urdu-text transition-colors">کرکٹ</button>
                    <button class="px-3 py-1 bg-slate-100 hover:bg-slate-200 rounded-full text-slate-700 text-sm urdu-text transition-colors">سیاست</button>
                    <button class="px-3 py-1 bg-slate-100 hover:bg-slate-200 rounded-full text-slate-700 text-sm urdu-text transition-colors">تعلیم</button>
                    <button class="px-3 py-1 bg-slate-100 hover:bg-slate-200 rounded-full text-slate-700 text-sm urdu-text transition-colors">صحت</button>
                    <button class="px-3 py-1 bg-slate-100 hover:bg-slate-200 rounded-full text-slate-700 text-sm urdu-text transition-colors">تکنالوجی</button>
                    <button class="px-3 py-1 bg-slate-100 hover:bg-slate-200 rounded-full text-slate-700 text-sm urdu-text transition-colors">معیشت</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="bg-white shadow-xl relative">
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-50 to-purple-50 opacity-50"></div>
    <div class="container mx-auto px-4 relative">
        <!-- Header Section - Desktop Layout -->
        <div class="hidden lg:flex items-center justify-between py-8 min-h-[120px]">
                <div class="flex items-center space-x-6 space-x-reverse">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-indigo-600 to-purple-700 p-4 rounded-2xl shadow-lg floating">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="py-4">
                        <h1 class="text-4xl font-bold gradient-text urdu-text leading-loose">روزانہ اردو</h1>
                    </div>
                </div>

                <!-- Google Ads Banner Space (Center) -->
                <div class="flex-1 mx-8">
                    <div class="ad-banner rounded-xl p-4 w-full h-24 flex items-center justify-center">
                        <!-- Replace this div with your Google AdSense code -->
                        <div class="text-center">
                            <div class="text-slate-400 text-sm font-semibold mb-1">Advertisement</div>
                            <div class="text-slate-500 text-xs urdu-text">اشتہار</div>
                            <div class="text-slate-400 text-xs mt-1">728 x 90 Banner</div>
                            <!-- Google AdSense code goes here -->
                        </div>
                    </div>
                </div>
            </div>

        <!-- Header Section - Mobile Layout -->
        <div class="lg:hidden py-6">
            <!-- Title and Logo Row -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-indigo-600 to-purple-700 p-3 rounded-xl shadow-lg floating">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold gradient-text urdu-text leading-loose">روزانہ اردو</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav id="mainNav" class="bg-white border-t border-slate-200 animated-border">
        <div class="container mx-auto px-4">
            <ul class="flex space-x-8 space-x-reverse py-5 justify-center">
                <li><a href="{{ route('home') }}" class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50">صفحہ اول</a></li>
                <li><a href="{{ route('news.category', 'politics') }}" class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50">سیاست</a></li>
                <li><a href="{{ route('news.category', 'sports') }}" class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50">کھیل</a></li>
                <li><a href="{{ route('news.category', 'business') }}" class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50">تجارت</a></li>
                <li><a href="{{ route('news.category', 'technology') }}" class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50">تکنالوجی</a></li>
                <li><a href="{{ route('news.category', 'entertainment') }}" class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50">تفریح</a></li>
            </ul>
        </div>
    </nav>
</header> 