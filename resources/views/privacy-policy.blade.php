@extends('layouts.app')

@section('title', 'روزانہ اردو - تازہ ترین خبریں')

@section('content')
    <main class="container mx-auto px-4 py-12 mt-[72px]">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl leading-[3] font-bold text-slate-800 mb-8 urdu-text gradient-text text-center">رازداری کی پالیسی</h1>
            
            <!-- Introduction -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">تعارف</h2>
                <p class="text-slate-600 urdu-text leading-relaxed mb-4">
                    روزانہ اردو آپ کی رازداری کا احترام کرتی ہے۔ یہ رازداری کی پالیسی بتاتی ہے کہ ہم آپ کی ذاتی معلومات کو کیسے جمع، استعمال اور محفوظ کرتے ہیں۔
                </p>
            </div>

            <!-- Information Collection -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">معلومات کی جمع آوری</h2>
                <div class="space-y-4">
                    <p class="text-slate-600 urdu-text leading-relaxed">
                        ہم درج ذیل معلومات جمع کرتے ہیں:
                    </p>
                    <ul class="list-disc list-inside text-slate-600 urdu-text space-y-2 mr-4">
                        <li>آپ کا نام اور ای میل ایڈریس</li>
                        <li>آپ کا IP ایڈریس</li>
                        <li>آپ کی براؤزنگ کی تاریخ</li>
                        <li>آپ کی دلچسپی کے موضوعات</li>
                    </ul>
                </div>
            </div>

            <!-- Information Usage -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">معلومات کا استعمال</h2>
                <div class="space-y-4">
                    <p class="text-slate-600 urdu-text leading-relaxed">
                        ہم آپ کی معلومات کا استعمال درج ذیل مقاصد کے لیے کرتے ہیں:
                    </p>
                    <ul class="list-disc list-inside text-slate-600 urdu-text space-y-2 mr-4">
                        <li>آپ کو تازہ ترین خبریں بھیجنے کے لیے</li>
                        <li>ہماری ویب سائٹ کو بہتر بنانے کے لیے</li>
                        <li>آپ کی دلچسپی کے مطابق مواد فراہم کرنے کے لیے</li>
                        <li>سیکیورٹی اور دھوکہ دہی کی روک تھام کے لیے</li>
                    </ul>
                </div>
            </div>

            <!-- Information Protection -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">معلومات کی حفاظت</h2>
                <p class="text-slate-600 urdu-text leading-relaxed">
                    ہم آپ کی معلومات کی حفاظت کے لیے درج ذیل اقدامات کرتے ہیں:
                </p>
                <ul class="list-disc list-inside text-slate-600 urdu-text space-y-2 mr-4 mt-4">
                    <li>ایس ایس ایل انکرپشن کا استعمال</li>
                    <li>محفوظ سرورز کا استعمال</li>
                    <li>رسائی کنٹرول کی پالیسیاں</li>
                    <li>باقاعدہ سیکیورٹی آڈٹ</li>
                </ul>
            </div>

            <!-- Cookies -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">کوکیز</h2>
                <p class="text-slate-600 urdu-text leading-relaxed">
                    ہماری ویب سائٹ کوکیز کا استعمال کرتی ہے۔ کوکیز چھوٹی ٹیکسٹ فائلیں ہیں جو آپ کے کمپیوٹر پر محفوظ کی جاتی ہیں۔ یہ ہمیں آپ کی ویب سائٹ کے استعمال کو سمجھنے میں مدد کرتی ہیں۔
                </p>
            </div>

            <!-- Third Party -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">تیسرے فریق</h2>
                <p class="text-slate-600 urdu-text leading-relaxed">
                    ہم آپ کی معلومات کو تیسرے فریق کے ساتھ شیئر نہیں کرتے، سوائے اس کے کہ:
                </p>
                <ul class="list-disc list-inside text-slate-600 urdu-text space-y-2 mr-4 mt-4">
                    <li>قانونی ضرورت ہو</li>
                    <li>آپ کی اجازت ہو</li>
                    <li>ہماری سروس فراہم کرنے کے لیے ضروری ہو</li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="bg-white rounded-3xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 urdu-text">رابطہ</h2>
                <p class="text-slate-600 urdu-text leading-relaxed">
                    اگر آپ کے کوئی سوالات ہیں تو براہ کرم ہم سے رابطہ کریں:
                </p>
                <div class="mt-4 space-y-2">
                    <p class="text-slate-600 urdu-text">ای میل: privacy@urdunews.com</p>
                    <p class="text-slate-600 urdu-text">فون: +92-21-1234567</p>
                </div>
            </div>
        </div>
    </main>

    @endsection