
@extends('layouts.app')

@section('title', 'روزانہ اردو - تازہ ترین خبریں')

@section('content')
    <main class="container mx-auto px-4 py-12 mt-[72px]">
        <div class="max-w-4xl mx-auto">
            <!-- Article Header -->
            <div class="mb-8">
                <div class="flex items-center space-x-4 space-x-reverse mb-4">
                    <span class="bg-indigo-100 text-indigo-800 px-4 py-1 rounded-full text-sm urdu-text">سیاست</span>
                    <span class="text-slate-500 text-sm">2 گھنٹے پہلے</span>
                </div>
                <h1 class="text-4xl font-bold text-slate-800 mb-4 urdu-text">خبر کا عنوان یہاں آئے گا</h1>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=50&h=50&q=80" alt="Author" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-slate-800 font-medium urdu-text">مصنف کا نام</p>
                        <p class="text-slate-500 text-sm urdu-text">سینئر رپورٹر</p>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="https://images.unsplash.com/photo-1575505586569-646b2ca898fc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&h=600&q=80" alt="Featured Image" class="w-full h-[400px] object-cover rounded-3xl">
            </div>

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none mb-12">
                <p class="text-slate-700 leading-relaxed urdu-text mb-6">
                    یہاں خبر کا پہلا پیراگراف آئے گا۔ یہ پیراگراف خبر کی تفصیلات اور اہم نکات پر مشتمل ہوگا۔
                </p>
                <p class="text-slate-700 leading-relaxed urdu-text mb-6">
                    دوسرا پیراگراف یہاں آئے گا جس میں مزید تفصیلات اور معلومات شامل ہوں گی۔
                </p>
                <blockquote class="border-r-4 border-indigo-500 pr-4 my-8">
                    <p class="text-slate-700 italic urdu-text">
                        "یہاں کوئی اہم اقتباس یا بیان آئے گا جو خبر کی اہمیت کو اجاگر کرے گا۔"
                    </p>
                </blockquote>
                <p class="text-slate-700 leading-relaxed urdu-text mb-6">
                    تیسرا پیراگراف یہاں آئے گا جس میں مزید تفصیلات اور معلومات شامل ہوں گی۔
                </p>
            </div>

            <!-- Tags -->
            <div class="mb-12">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 urdu-text">ٹیگز</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-full text-sm transition-colors duration-300 urdu-text">سیاست</a>
                    <a href="#" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-full text-sm transition-colors duration-300 urdu-text">پاکستان</a>
                    <a href="#" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-full text-sm transition-colors duration-300 urdu-text">خارجہ پالیسی</a>
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="mb-12">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 urdu-text">شیئر کریں</h3>
                <div class="flex space-x-4 space-x-reverse">
                    <a href="#" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 p-3 rounded-xl transition-all duration-300 transform hover:scale-110">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 p-3 rounded-xl transition-all duration-300 transform hover:scale-110">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                        </svg>
                    </a>
                    <a href="#" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 p-3 rounded-xl transition-all duration-300 transform hover:scale-110">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Related Articles -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-slate-800 mb-6 urdu-text">متعلقہ خبریں</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Related Article 1 -->
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1575505586569-646b2ca898fc?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=300&q=80" alt="Related Article" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm urdu-text">سیاست</span>
                            <h4 class="text-xl font-bold text-slate-800 mt-3 mb-2 urdu-text">متعلقہ خبر کا عنوان</h4>
                            <p class="text-slate-600 text-sm urdu-text">2 گھنٹے پہلے</p>
                        </div>
                    </div>
                    <!-- Related Article 2 -->
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1575505586569-646b2ca898fc?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=300&q=80" alt="Related Article" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm urdu-text">سیاست</span>
                            <h4 class="text-xl font-bold text-slate-800 mt-3 mb-2 urdu-text">متعلقہ خبر کا عنوان</h4>
                            <p class="text-slate-600 text-sm urdu-text">2 گھنٹے پہلے</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    @endsection