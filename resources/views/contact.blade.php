@extends('layouts.app')

@section('title', 'روزانہ اردو - تازہ ترین خبریں')

@section('content')
    <main class="container mx-auto px-4 py-12 mt-[72px]">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold leading-[3] text-slate-800 mb-8 urdu-text gradient-text text-center">رابطہ</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-gradient-to-r shadow-lg from-indigo-50 to-purple-50 rounded-xl p-8">

                    <h2 class="text-2xl font-bold text-slate-800 mb-6 urdu-text">ہم سے رابطہ کریں</h2>
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">نام</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">ای میل</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">موضوع</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">پیغام</label>
                            <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-xl font-medium hover:shadow-lg transition-all duration-300 transform hover:scale-105 urdu-text">
                            پیغام بھیجیں
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Office Address -->
                    <div class="bg-white rounded-3xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">دفتری پتہ</h2>
                        <div class="flex items-start space-x-4 space-x-reverse">
                            <div class="bg-indigo-100 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-slate-600 urdu-text leading-relaxed">
                                    Washington, D.C ,United States of America
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Numbers -->
                    <div class="bg-white rounded-3xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">فون نمبر</h2>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4 space-x-reverse">
                                <div class="bg-indigo-100 p-3 rounded-xl">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-600 urdu-text">+92-21-1234567</p>
                                    <p class="text-slate-500 text-sm urdu-text">دفتری نمبر</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 space-x-reverse">
                                <div class="bg-indigo-100 p-3 rounded-xl">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-600 urdu-text">+92-300-1234567</p>
                                    <p class="text-slate-500 text-sm urdu-text">ہیلپ لائن</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email Addresses -->
                    <div class="bg-white rounded-3xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">ای میل</h2>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4 space-x-reverse">
                                <div class="bg-indigo-100 p-3 rounded-xl">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-600 urdu-text">dailyurduonline@gmail.com</p>
                                    <p class="text-slate-500 text-sm urdu-text">عام معلومات</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white rounded-3xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">سوشل میڈیا</h2>
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
                </div>
            </div>
        </div>
    </main>
    @endsection
