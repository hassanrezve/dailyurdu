                                                                                    <!-- Top Banner -->
                                                                                    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-800 text-white py-3">
                                                                                        <div class="container mx-auto px-4">
                                                                                            <div class="flex flex-col sm:flex-row items-center sm:justify-between text-sm gap-y-2">
                                                                                                <div class="flex flex-wrap items-center justify-center space-x-4 space-x-reverse gap-y-2 w-full sm:w-auto">
                                                                                                    <div class="flex items-center space-x-2 space-x-reverse">
                                                                                                        <div class="w-2 h-2 bg-green-400 rounded-full pulse-ring"></div>
                                                                                                        <span class="urdu-text">لائیو</span>
                                                                                                    </div>
                                                                                                    <span class="urdu-text">آج: {{ now()->format('l، d F Y') }}</span>
                                                                                                    <!-- Quick Search -->
                                                                                                    <form action="{{ route('news.search') }}" method="GET" class="relative group hidden sm:block">
                                                                                                        <input type="text" name="q" class="w-32 sm:w-48 pl-8 pr-3 py-1 text-sm bg-white/10 border border-white/20 rounded-full focus:outline-none focus:ring-2 focus:ring-white/30 text-white placeholder-white/70 transition-all duration-300 group-hover:w-64" placeholder="تلاش کریں..." value="{{ request('q') }}">
                                                                                                        <button type="submit" class="absolute left-2 top-1/2 transform -translate-y-1/2 text-white/70 hover:text-white">
                                                                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                                                                                            </svg>
                                                                                                        </button>
                                                                                                    </form>
                                                                                                    <!-- Social Media Icons -->
                                                                                                    <div class="flex items-center space-x-3 space-x-reverse mr-0 sm:mr-4 mt-2 sm:mt-0">
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
                                                                                                <div class="flex flex-wrap items-center justify-center space-x-4 space-x-reverse gap-y-2 w-full sm:w-auto mt-2 sm:mt-0">
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
                                                                                        <div class="min-h-screen px-4 flex flex-col justify-center items-center">
                                                                                            <div class="fixed inset-0" aria-hidden="true">
                                                                                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                                                            </div>
                                                                                            <div class="w-full max-w-full my-2 sm:max-w-2xl sm:my-8 p-4 sm:p-6 text-right transition-all transform bg-white shadow-xl rounded-2xl overflow-y-auto z-10">
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
                                                                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                                                                                        @if(isset($popularSearches) && count($popularSearches))
                                                                                                            @foreach($popularSearches as $term)
                                                                                                                <button class="popular-search-btn w-full text-right px-3 py-2 bg-slate-100 hover:bg-slate-200 rounded-lg text-slate-700 text-sm urdu-text transition-colors truncate" title="{{ $term }}">{{ $term }}</button>
                                                                                                            @endforeach
                                                                                                        @else
                                                                                                            <span class="text-slate-400 text-xs urdu-text">کوئی مقبول تلاش نہیں</span>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Header -->
                                                                                    <header class="bg-white shadow-xl relative z-30 overflow-visible">
                                                                                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-50 to-purple-50 opacity-50"></div>
                                                                                        <div class="container mx-auto px-4 relative z-30 overflow-visible">
                                                                                            <!-- Header Section - Desktop Layout -->
                                                                                            <div class="hidden lg:flex items-center justify-between py-8 min-h-[120px]">
                                                                                                    <div class="flex items-center space-x-6 space-x-reverse">
                                                                                                        <div class="relative">
                                                                                                                <a href="{{ route('home') }}">
                                                                                                                    <img src="{{ asset('logo.webp') }}" alt="logo" class="w-[120px] h-[120px] object-contain floating">
                                                                                                                </a>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <!-- Google Ads Banner Space (Center) -->
                                                                                                    <div class="flex-1 mx-8">
{{--                                                                                                        <div class="ad-banner rounded-xl p-4 w-full h-24 flex items-center justify-center">--}}
                                                                                                        <div class="rounded-xl p-4 w-full h-24 flex items-center justify-center">

                                                                                                                <!-- header -->
                                                                                                                <ins class="adsbygoogle"
                                                                                                                     style="display:block"
                                                                                                                     data-ad-client="ca-pub-1790652247481380"
                                                                                                                     data-ad-slot="1871700663"
                                                                                                                     data-ad-format="auto"
                                                                                                                     data-full-width-responsive="true"></ins>
                                                                                                                <script>
                                                                                                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                                                                                                </script>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            <!-- Header Section - Mobile Layout -->
                                                                                            <div class="lg:hidden py-6">
                                                                                                <!-- Title and Logo Row -->
                                                                                                <div class="flex flex-col sm:flex-row items-center justify-between mb-6 gap-4">
                                                                                                    <div class="flex items-center justify-between w-full">
                                                                                                        <a href="{{ route('home') }}">
                                                                                                            <img src="{{ asset('logo.jpg') }}" alt="logo" class="w-16 h-16 object-contain floating">
                                                                                                        </a>
                                                                                                        <button id="mobileMenuButton" class="block lg:hidden p-2 rounded-md border border-slate-200 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                                                                            <svg class="w-7 h-7 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                                                                                            </svg>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Mobile Ad Banner -->
                                                                                                <div class="w-full flex justify-center mb-4 hidden sm:flex">
                                                                                                    <div class="ad-banner rounded-xl p-2 w-full max-w-xs h-16 flex items-center justify-center">
                                                                                                            <!-- header -->
                                                                                                            <ins class="adsbygoogle"
                                                                                                                 style="display:block"
                                                                                                                 data-ad-client="ca-pub-1790652247481380"
                                                                                                                 data-ad-slot="1871700663"
                                                                                                                 data-ad-format="auto"
                                                                                                                 data-full-width-responsive="true"></ins>
                                                                                                            <script>
                                                                                                                (adsbygoogle = window.adsbygoogle || []).push({});
                                                                                                            </script>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        @php
                                                                                            $categories = \App\Models\Category::where('id', '!=', 1)->get();
                                                                                            $visible = $categories->take(10);
                                                                                            $more = $categories->slice(10);
                                                                                        @endphp

                                                                                        <!-- Sticky Nav Placeholder -->
                                                                                        <div id="mainNavPlaceholder" style="height:0;"></div>
                                                                                        <!-- Desktop Nav -->
                                                                                        <nav id="mainNav" class="bg-white border-t border-slate-200 animated-border px-8 py-4">
                                                                                                <div class="container mx-auto px-4">

                                                                                                        <!-- Home --><ul class="flex flex-wrap justify-center gap-2 py-4 px-2">
                                                                                                        <li>
                                                                                                            <a href="{{ route('home') }}"
                                                                                                            class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50">
                                                                                                                صفحہ اول
                                                                                                            </a>
                                                                                                        </li>

                                                                                                        <!-- Visible Categories -->
                                                                                                        @foreach($visible as $category)
                                                                                                            <li>
                                                                                                                <a href="{{ $category->url() }}"
                                                                                                                class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50">
                                                                                                                    {{ $category->name }}
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        @endforeach

                                                                                                        <!-- Dropdown for More -->
                                                                                                        @if($more->count())
                                                                                                            <li class="relative group z-50">
                                                                                                                <a href="#" onclick="event.preventDefault();"
                                                                                                                class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50">
                                                                                                                    مزید
                                                                                                                </a>
                                                                                                                <ul class="absolute right-0 top-full mt-2 bg-white border border-slate-200 rounded-lg shadow-xl hidden group-hover:block z-50 text-right min-w-[180px]">
                                                                                                                    @foreach($more as $category)
                                                                                                                        <li>
                                                                                                                            <a href="{{ $category->url() }}"
                                                                                                                            class="block w-full px-4 py-2 text-slate-700 hover:bg-slate-100 urdu-text text-sm">
                                                                                                                                {{ $category->name }}
                                                                                                                            </a>
                                                                                                                        </li>
                                                                                                                    @endforeach
                                                                                                                </ul>
                                                                                                            </li>
                                                                                                        @endif
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </nav>
                                                                                        <!-- Mobile Nav -->
                                                                                        <nav id="mobileNav" class="bg-white border-t border-slate-200 animated-border z-20 lg:hidden hidden">
                                                                                            <div class="container mx-auto px-4">
                                                                                                <ul class="flex flex-col py-4 gap-2">
                                                                                                    <li>
                                                                                                        <a href="{{ route('home') }}" class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50 block">صفحہ اول</a>
                                                                                                    </li>
                                                                                                    @foreach($visible as $category)
                                                                                                        <li>
                                                                                                            <a href="{{ $category->url() }}" class="text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50 block">{{ $category->name }}</a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                    @if($more->count())
                                                                                                        <li>
                                                                                                            <button id="mobileMoreButton" type="button" class="w-full text-right text-slate-700 hover:text-indigo-600 transition-all duration-300 urdu-text font-medium px-4 py-2 rounded-lg hover:bg-indigo-50 block cursor-pointer select-none">مزید</button>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                </ul>
                                                                                            </div>
                                                                                        </nav>
                                                                                    </header>

                                                                                    <!-- Mobile More Overlay -->
                                                                                    <div id="mobileMoreOverlay" class="fixed inset-0 bg-black bg-opacity-60 z-[300] hidden flex-col justify-center items-center">
                                                                                        <div class="w-full max-w-sm mx-auto bg-white rounded-2xl shadow-2xl p-6 mt-16 relative">
                                                                                            <button id="closeMobileMore" class="absolute left-4 top-4 text-slate-400 hover:text-slate-700">
                                                                                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                                                                </svg>
                                                                                            </button>
                                                                                            <h3 class="text-xl font-bold mb-4 urdu-text text-right">مزید کیٹگریز</h3>
                                                                                            <ul class="space-y-2 text-right">
                                                                                                @foreach($more as $category)
                                                                                                    <li>
                                                                                                        <a href="{{ $category->url() }}" class="block w-full px-4 py-2 text-slate-700 hover:bg-slate-100 urdu-text text-base rounded-lg">{{ $category->name }}</a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                    <script>
                                                                                    (function() {
                                                                                    // Mobile menu toggle
                                                                                    var mobileMenuButton = document.getElementById('mobileMenuButton');
                                                                                    var mobileNav = document.getElementById('mobileNav');
                                                                                    if (mobileMenuButton && mobileNav) {
                                                                                        mobileMenuButton.addEventListener('click', function() {
                                                                                            mobileNav.classList.toggle('hidden');
                                                                                        });
                                                                                    }

                                                                                    // Search modal toggle
                                                                                    var searchButton = document.getElementById('searchButton');
                                                                                    var searchModal = document.getElementById('searchModal');
                                                                                    var closeSearchModal = document.getElementById('closeSearchModal');
                                                                                    if (searchButton && searchModal) {
                                                                                        searchButton.addEventListener('click', function() {
                                                                                            searchModal.classList.remove('hidden');
                                                                                        });
                                                                                    }
                                                                                    if (closeSearchModal && searchModal) {
                                                                                        closeSearchModal.addEventListener('click', function() {
                                                                                            searchModal.classList.add('hidden');
                                                                                        });
                                                                                    }

                                                                                    // Mobile More overlay logic
                                                                                    var mobileMoreButton = document.getElementById('mobileMoreButton');
                                                                                    var mobileMoreOverlay = document.getElementById('mobileMoreOverlay');
                                                                                    var closeMobileMore = document.getElementById('closeMobileMore');
                                                                                    if (mobileMoreButton && mobileMoreOverlay && mobileNav) {
                                                                                        mobileMoreButton.addEventListener('click', function() {
                                                                                            mobileNav.classList.add('hidden');
                                                                                            mobileMoreOverlay.classList.remove('hidden');
                                                                                            mobileMoreOverlay.classList.add('flex');
                                                                                        });
                                                                                    }
                                                                                    if (closeMobileMore && mobileMoreOverlay && mobileNav) {
                                                                                        closeMobileMore.addEventListener('click', function() {
                                                                                            mobileMoreOverlay.classList.add('hidden');
                                                                                            mobileMoreOverlay.classList.remove('flex');
                                                                                            mobileNav.classList.remove('hidden');
                                                                                        });
                                                                                    }

                                                                                    // Popular search term click: immediately search for that term
                                                                                    var popularSearchButtons = document.querySelectorAll('.popular-search-btn');
                                                                                    var searchForm = document.querySelector('#searchModal form');
                                                                                    var searchInput = document.getElementById('searchInput');
                                                                                    if (popularSearchButtons && searchForm && searchInput) {
                                                                                        popularSearchButtons.forEach(function(btn) {
                                                                                            btn.addEventListener('click', function(e) {
                                                                                                e.preventDefault();
                                                                                                searchInput.value = btn.textContent;
                                                                                                // Do NOT submit the form automatically
                                                                                            });
                                                                                        });
                                                                                    }

                                                                                    })();
                                                                                    </script>
