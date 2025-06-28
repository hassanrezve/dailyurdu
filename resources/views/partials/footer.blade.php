<!-- Footer -->
<footer class="bg-gradient-to-r from-slate-800 via-slate-900 to-slate-800 text-white mt-20">
    <div class="container mx-auto px-4 py-12">
        <!-- Search and Newsletter Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12 pb-8 border-b border-slate-700">
            <!-- Search Section -->
            <div>
                <h4 class="text-xl font-bold mb-4 urdu-text">تلاش کریں</h4>
                <div class="my-3 flex flex-wrap gap-2">
                    @foreach($footerCategories as $category)
                        <button class="footer-search-btn px-3 py-1 bg-slate-700/50 hover:bg-slate-600 rounded-full text-slate-300 text-sm urdu-text transition-colors">{{ $category->name }}</button>
                    @endforeach
                </div>
                <form action="{{ route('news.search') }}" method="GET" class="relative" id="footerSearchForm">
                    <input type="text" name="q" class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-white placeholder-slate-400" placeholder="خبر، موضوع یا کلیدی الفاظ لکھیں..." id="footerSearchInput">
                    <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-indigo-400 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Newsletter Section -->
            <div>
                <h4 class="text-xl font-bold mb-4 urdu-text">نیوز لیٹر</h4>
                <p class="text-slate-400 mb-4 urdu-text">تازہ ترین خبروں کے لیے ہمارے نیوز لیٹر میں شامل ہوں</p>
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="email" name="email" class="flex-1 px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-white placeholder-slate-400 w-full sm:w-auto" placeholder="آپ کا ای میل ایڈریس">
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 rounded-xl text-white font-medium transition-all duration-300 transform hover:scale-105 urdu-text w-full sm:w-auto">
                        سبسکرائب
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Contact Information -->
            <div>
                <h4 class="text-xl font-bold mb-4 urdu-text gradient-text">رابطہ</h4>
                <div class="space-y-2">
                    <p class="text-slate-300 text-sm urdu-text flex items-center">
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        info@urdunews.com
                    </p>
                    <p class="text-slate-300 text-sm urdu-text flex items-center">
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        +92-21-1234567
                    </p>
                </div>
            </div>

            <!-- Important Links -->
            <div>
                <h4 class="text-xl font-bold mb-4 urdu-text">اہم لنکس</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="text-slate-300 hover:text-white text-sm urdu-text transition-colors">ہمارے بارے میں</a></li>
                    <li><a href="{{ route('contact') }}" class="text-slate-300 hover:text-white text-sm urdu-text transition-colors">رابطہ</a></li>
                    <li><a href="{{ route('privacy.policy') }}" class="text-slate-300 hover:text-white text-sm urdu-text transition-colors">رازداری کی پالیسی</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h4 class="text-xl font-bold mb-4 urdu-text">کیٹگریز</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('news.category', 'national') }}" class="text-slate-300 hover:text-white text-sm urdu-text transition-colors">قومی خبریں</a></li>
                    <li><a href="{{ route('news.category', 'international') }}" class="text-slate-300 hover:text-white text-sm urdu-text transition-colors">بین الاقوامی</a></li>
                    <li><a href="{{ route('news.category', 'sports') }}" class="text-slate-300 hover:text-white text-sm urdu-text transition-colors">کھیل</a></li>
                    <li><a href="{{ route('news.category', 'business') }}" class="text-slate-300 hover:text-white text-sm urdu-text transition-colors">معیشت</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h4 class="text-xl font-bold mb-4 urdu-text">سوشل میڈیا</h4>
                <div class="flex space-x-3 space-x-reverse">
                    <a href="#" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 p-3 rounded-xl transition-all duration-300 transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 p-3 rounded-xl transition-all duration-300 transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                        </svg>
                    </a>
                    <a href="#" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 p-3 rounded-xl transition-all duration-300 transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-slate-700 mt-8 pt-6 text-center">
            <p class="text-slate-400 text-sm urdu-text">© {{ date('Y') }} اردو نیوز - تمام حقوق محفوظ ہیں | Made with ❤️ in Pakistan</p>
        </div>
    </div>
</footer>

<script>
document.querySelectorAll('.footer-search-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        var input = document.getElementById('footerSearchInput');
        // Only fill the input, do NOT submit the form
        if (input) {
            input.value = btn.textContent;
        }
    });
});
</script> 