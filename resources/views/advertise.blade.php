@extends('layouts.app')

@section('title', 'اشتہارات - روزانہ اردو')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-slate-800 mb-8 urdu-text">اشتہارات</h1>

        <!-- Advertising Information -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-slate-800 mb-6 urdu-text">ہمارے ساتھ اشتہار دیں</h2>
            <p class="text-slate-600 mb-6 urdu-text leading-relaxed">
                روزانہ اردو پاکستان کی سب سے بڑی اردو نیوز ویب سائٹ ہے، جہاں آپ اپنے کاروبار کو فروغ دینے کے لیے اشتہارات دے سکتے ہیں۔ ہماری ویب سائٹ پر روزانہ لاکھوں صارفین آتے ہیں، جو آپ کے کاروبار کے لیے بہترین موقع ہے۔
            </p>

            <!-- Advertising Options -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-slate-50 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 urdu-text">بینر اشتہارات</h3>
                    <ul class="space-y-2 text-slate-600 urdu-text">
                        <li>• 728 x 90 پکسل بینر</li>
                        <li>• 300 x 250 پکسل بینر</li>
                        <li>• 160 x 600 پکسل بینر</li>
                    </ul>
                </div>
                <div class="bg-slate-50 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-4 urdu-text">اسپانسرڈ پوسٹس</h3>
                    <ul class="space-y-2 text-slate-600 urdu-text">
                        <li>• خصوصی اسپانسرڈ آرٹیکلز</li>
                        <li>• برانڈڈ کنٹینٹ</li>
                        <li>• نیوز لیٹر اسپانسرشپ</li>
                    </ul>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-8">
                <h3 class="text-2xl font-bold text-slate-800 mb-6 urdu-text">رابطہ کریں</h3>
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="subject" value="Advertising Inquiry">
                    
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
                        <label for="message" class="block text-sm font-medium text-slate-700 mb-2 urdu-text">پیغام</label>
                        <textarea name="message" id="message" rows="4" required class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 urdu-text">
                        پیغام بھیجیں
                    </button>
                </form>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-slate-800 mb-6 urdu-text">ہماری خصوصیات</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2 urdu-text">بڑا صارفین کا حلقہ</h3>
                    <p class="text-slate-600 urdu-text">روزانہ لاکھوں صارفین</p>
                </div>
                <div class="text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2 urdu-text">اعلیٰ کارکردگی</h3>
                    <p class="text-slate-600 urdu-text">بہتر کلک تھرو ریٹ</p>
                </div>
                <div class="text-center">
                    <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 mb-2 urdu-text">24/7 سپورٹ</h3>
                    <p class="text-slate-600 urdu-text">ہمیشہ آپ کی خدمت میں</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 