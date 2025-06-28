<!DOCTYPE html>
<html lang="ur" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{asset('wp-content/uploads/2024/12/cropped-dailyurdu.net_logo-192x192.png')}}" sizes="192x192">
        <title>@yield('title', 'Daily Urdu – Daily Urdu News')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Noto Nastaliq Urdu', serif;
            }
            .urdu-text {
                font-family: 'Noto Nastaliq Urdu', serif;
            }
            .glass-effect {
                backdrop-filter: blur(10px);
                background: rgba(255, 255, 255, 0.1);
            }
            .news-card {
                transition: all 0.3s ease;
            }
            .news-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            }
            .gradient-text {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            .animated-border {
                position: relative;
                overflow: hidden;
            }
            .animated-border::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 2px;
                background: linear-gradient(90deg, transparent, #667eea, transparent);
                animation: slide 2s infinite;
            }
            @keyframes slide {
                0% { left: -100%; }
                100% { left: 100%; }
            }
            .floating {
                animation: float 3s ease-in-out infinite;
            }
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
            .pulse-ring {
                animation: pulse-ring 1.5s infinite;
            }
            @keyframes pulse-ring {
                0% { transform: scale(0.8); opacity: 1; }
                100% { transform: scale(1.2); opacity: 0; }
            }
            .ad-banner {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                border: 2px dashed #cbd5e1;
                transition: all 0.3s ease;
            }
            .ad-banner:hover {
                border-color: #667eea;
                transform: scale(1.02);
            }
            /* Add smooth transition for navigation */
            #mainNav {
                transition: all 0.3s ease-in-out;
            }
            #mainNav.fixed {
                transform: translateY(0);
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }
            #mainNav:not(.fixed) {
                transform: translateY(0);
            }
        </style>
        @stack('styles')
    </head>
    <body class="bg-gradient-to-br from-slate-50 via-white to-slate-100 min-h-screen">
        @include('partials.header')
        

        <!-- Main Content -->
        <main class="container mx-auto px-4 mt-[72px]">
            @yield('content')
            </main>

        @include('partials.footer')

        <!-- Scroll to Top Button -->
        <button id="scrollToTop" class="fixed bottom-6 left-6 bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:scale-110 z-50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
            </svg>
        </button>

        <script>
            // Scroll to top functionality
            const scrollButton = document.getElementById('scrollToTop');
            const mainNav = document.getElementById('mainNav');
            let lastScrollTop = 0;
            
            window.addEventListener('scroll', () => {
                // Scroll to top button visibility
                if (window.pageYOffset > 300) {
                    scrollButton.classList.remove('opacity-0', 'invisible');
                    scrollButton.classList.add('opacity-100', 'visible');
                } else {
                    scrollButton.classList.add('opacity-0', 'invisible');
                    scrollButton.classList.remove('opacity-100', 'visible');
                }

                // Navigation sticky behavior
                const currentScroll = window.pageYOffset;
                
                if (currentScroll > lastScrollTop && currentScroll > 268) {
                    // Scrolling down & past threshold
                    if (!mainNav.classList.contains('fixed')) {
                        mainNav.style.height = mainNav.offsetHeight + 'px';
                        mainNav.classList.add('fixed', 'top-0', 'w-full', 'z-[100]');
                    }
                } else if (currentScroll < lastScrollTop || currentScroll <= 268) {
                    // Scrolling up or at top
                    mainNav.classList.remove('fixed', 'top-0', 'w-full', 'z-[100]');
                    mainNav.style.height = '';
                }
                lastScrollTop = currentScroll;
            });
            
            scrollButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Add smooth scrolling to all anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Search Modal Functionality
            const searchButton = document.getElementById('searchButton');
            const searchModal = document.getElementById('searchModal');
            const closeSearchModal = document.getElementById('closeSearchModal');
            const searchInput = document.getElementById('searchInput');

            searchButton.addEventListener('click', () => {
                searchModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                setTimeout(() => searchInput.focus(), 100);
            });

            closeSearchModal.addEventListener('click', () => {
                searchModal.classList.add('hidden');
                document.body.style.overflow = '';
            });

            searchModal.addEventListener('click', (e) => {
                if (e.target === searchModal) {
                    searchModal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !searchModal.classList.contains('hidden')) {
                    searchModal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });
        </script>
        @stack('scripts')
    </body>
</html>
