@extends('layouts.app')

@section('title', 'روزانہ اردو - تازہ ترین خبریں')

@section('content')
    <main class="container mx-auto px-4 py-12 mt-[72px]">
        <!-- Hero Section -->
        <div class="bg-white rounded-3xl shadow-lg p-8 mb-12">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl leading-loose font-bold text-slate-800 mb-6 urdu-text gradient-text">ہمارے بارے میں</h1>
                <p class="text-lg text-slate-600 mb-8 urdu-text leading-relaxed">
                    روزانہ اردو پاکستان کی معروف اردو نیوز ویب سائٹ ہے جو 2020 سے اپنے قارئین کو تازہ ترین خبریں فراہم کر رہی ہے۔ ہماری کوشش ہے کہ ہم اپنے قارئین کو درست، غیر جانبدار اور معیاری خبریں فراہم کریں۔
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div class="p-6 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl">
                        <div class="text-4xl font-bold text-indigo-600 mb-2">5M+</div>
                        <p class="text-slate-600 urdu-text">روزانہ قارئین</p>
                    </div>
                    <div class="p-6 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl">
                        <div class="text-4xl font-bold text-indigo-600 mb-2">50+</div>
                        <p class="text-slate-600 urdu-text">صحافی</p>
                    </div>
                    <div class="p-6 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl">
                        <div class="text-4xl font-bold text-indigo-600 mb-2">24/7</div>
                        <p class="text-slate-600 urdu-text">نیوز کوریج</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission & Vision -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="bg-white rounded-3xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">ہمارا مشن</h2>
                <p class="text-slate-600 urdu-text leading-relaxed">
                    ہمارا مشن ہے کہ ہم اپنے قارئین کو درست اور معیاری خبریں فراہم کریں۔ ہماری کوشش ہے کہ ہم معاشرے میں مثبت تبدیلی لانے میں اپنا کردار ادا کریں۔
                </p>
            </div>
            <div class="bg-white rounded-3xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">ہماری ویژن</h2>
                <p class="text-slate-600 urdu-text leading-relaxed">
                    ہماری ویژن ہے کہ ہم پاکستان کی سب سے بڑی اور معتبر اردو نیوز ویب سائٹ بنیں۔ ہم چاہتے ہیں کہ ہماری خبریں پوری دنیا میں پڑھی جائیں۔
                </p>
            </div>
        </div>

        <!-- Team Section -->
        <!-- <div class="bg-white rounded-3xl shadow-lg p-8 mb-12">
            <h2 class="text-3xl font-bold text-slate-800 mb-8 urdu-text text-center">ہماری ٹیم</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300&h=300&fit=crop" alt="ایڈیٹر" class="w-48 h-48 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold text-slate-800 mb-2 urdu-text">احمد علی</h3>
                    <p class="text-slate-600 urdu-text">چیف ایڈیٹر</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=300&h=300&fit=crop" alt="نیوز ایڈیٹر" class="w-48 h-48 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold text-slate-800 mb-2 urdu-text">فاطمہ خان</h3>
                    <p class="text-slate-600 urdu-text">نیوز ایڈیٹر</p>
                </div>
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=300&h=300&fit=crop" alt="ٹیکنیکل ایڈیٹر" class="w-48 h-48 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-bold text-slate-800 mb-2 urdu-text">عمران حسین</h3>
                    <p class="text-slate-600 urdu-text">ٹیکنیکل ایڈیٹر</p>
                </div>
            </div>
        </div> -->

        <!-- Values Section -->
        <div class="bg-white rounded-3xl shadow-lg p-8">
            <h2 class="text-3xl font-bold text-slate-800 mb-8 urdu-text text-center">ہماری اقدار</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex items-start space-x-4 space-x-reverse">
                    <div class="bg-indigo-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2 urdu-text">درستگی</h3>
                        <p class="text-slate-600 urdu-text">ہم ہر خبر کی درستگی کو یقینی بناتے ہیں۔</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4 space-x-reverse">
                    <div class="bg-indigo-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2 urdu-text">بروقت</h3>
                        <p class="text-slate-600 urdu-text">ہم تازہ ترین خبریں فوری طور پر شائع کرتے ہیں۔</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4 space-x-reverse">
                    <div class="bg-indigo-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2 urdu-text">شفافیت</h3>
                        <p class="text-slate-600 urdu-text">ہم اپنے کام میں مکمل شفافیت برقرار رکھتے ہیں۔</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4 space-x-reverse">
                    <div class="bg-indigo-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2 urdu-text">قارئین کی خدمت</h3>
                        <p class="text-slate-600 urdu-text">ہم اپنے قارئین کی خدمت کو سب سے زیادہ اہمیت دیتے ہیں۔</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection