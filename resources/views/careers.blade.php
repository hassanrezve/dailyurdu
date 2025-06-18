@extends('layouts.app')

@section('title', 'کیریئرز - روزانہ اردو')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-slate-800 mb-8 urdu-text">کیریئرز</h1>

        <!-- Introduction -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-slate-800 mb-6 urdu-text">ہمارے ساتھ کام کریں</h2>
            <p class="text-slate-600 mb-6 urdu-text leading-relaxed">
                روزانہ اردو میں ہم اپنے ٹیم ممبران کو ایک مثبت اور تخلیقی ماحول فراہم کرتے ہیں۔ اگر آپ صحافت، ڈیجیٹل میڈیا، یا ٹیکنالوجی میں دلچسپی رکھتے ہیں، تو ہمارے ساتھ کام کرنے کا موقع آپ کے لیے ہے۔
            </p>

            <!-- Current Openings -->
            <div class="space-y-6 mb-8">
                <h3 class="text-xl font-bold text-slate-800 mb-4 urdu-text">موجودہ آسامیاں</h3>
                
                <!-- Job Card 1 -->
                <div class="bg-slate-50 rounded-xl p-6 hover:shadow-md transition-shadow duration-300">
                    <h4 class="text-lg font-semibold text-slate-800 mb-2 urdu-text">سینئر نیوز ایڈیٹر</h4>
                    <p class="text-slate-600 mb-4 urdu-text">ہم ایک تجربہ کار سینئر نیوز ایڈیٹر کی تلاش میں ہیں جو ہماری نیوز ٹیم کی قیادت کر سکیں۔</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm urdu-text">فل ٹائم</span>
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm urdu-text">کراچی</span>
                        <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm urdu-text">5+ سال کا تجربہ</span>
                    </div>
                </div>

                <!-- Job Card 2 -->
                <div class="bg-slate-50 rounded-xl p-6 hover:shadow-md transition-shadow duration-300">
                    <h4 class="text-lg font-semibold text-slate-800 mb-2 urdu-text">ڈیجیٹل مارکیٹنگ مینیجر</h4>
                    <p class="text-slate-600 mb-4 urdu-text">ہم ایک تخلیقی اور تجربہ کار ڈیجیٹل مارکیٹنگ مینیجر کی تلاش میں ہیں۔</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm urdu-text">فل ٹائم</span>
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm urdu-text">لاہور</span>
                        <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm urdu-text">3+ سال کا تجربہ</span>
                    </div>
                </div>

                <!-- Job Card 3 -->
                <div class="bg-slate-50 rounded-xl p-6 hover:shadow-md transition-shadow duration-300">
                    <h4 class="text-lg font-semibold text-slate-800 mb-2 urdu-text">ویب ڈویلپر</h4>
                    <p class="text-slate-600 mb-4 urdu-text">ہم ایک مہارت یافتہ ویب ڈویلپر کی تلاش میں ہیں جو ہماری ویب سائٹ کو بہتر بنا سکیں۔</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm urdu-text">فل ٹائم</span>
                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm urdu-text">ریموٹ</span>
                        <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm urdu-text">2+ سال کا تجربہ</span>
                    </div>
                </div>
            </div>

            <!-- Application Form -->
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-8">
                <h3 class="text-2xl font-bold text-slate-800 mb-6 urdu-text">درخواست فارم</h3>
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="subject" value="Job Application">
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">نام</label>
                        <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">ای میل</label>
                        <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">فون نمبر</label>
                        <input type="tel" name="phone" id="phone" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="position" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">عہدہ</label>
                        <select name="position" id="position" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">عہدہ منتخب کریں</option>
                            <option value="senior-news-editor">سینئر نیوز ایڈیٹر</option>
                            <option value="digital-marketing-manager">ڈیجیٹل مارکیٹنگ مینیجر</option>
                            <option value="web-developer">ویب ڈویلپر</option>
                        </select>
                    </div>

                    <div>
                        <label for="resume" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">ریزیومے</label>
                        <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">پیغام</label>
                        <textarea name="message" id="message" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 urdu-text">
                        درخواست بھیجیں
                    </button>
                </form>
            </div>
        </div>

        <!-- Benefits -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-slate-800 mb-6 urdu-text">ہماری خصوصیات</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2 urdu-text">لچکدار اوقات</h3>
                    <p class="text-slate-600 urdu-text">کام کے اوقات میں لچک</p>
                </div>
                <div class="text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2 urdu-text">ترقی کے مواقع</h3>
                    <p class="text-slate-600 urdu-text">مسلسل سیکھنے کا موقع</p>
                </div>
                <div class="text-center">
                    <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2 urdu-text">بہترین ٹیم</h3>
                    <p class="text-slate-600 urdu-text">مثبت کام کا ماحول</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 