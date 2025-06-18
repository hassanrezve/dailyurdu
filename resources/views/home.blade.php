@extends('layouts.app')

@section('title', 'روزانہ اردو - تازہ ترین خبریں')

@section('content')
<!-- Main Content -->
<main class="container mx-auto px-4 py-12 mt-[72px]">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main News Section -->
        <div class="lg:col-span-3">
            <!-- Breaking News Banner -->
            <div class="relative mb-8 overflow-hidden">
                <div class="bg-gradient-to-r from-red-500 via-red-600 to-red-700 text-white p-4 rounded-2xl shadow-lg">
                    <div class="flex items-center">
                        <div class="bg-white text-red-600 px-4 py-2 rounded-full text-sm font-bold ml-4 animate-pulse">
                            <span class="urdu-text">خبر فوری</span>
                        </div>
                        <span class="urdu-text font-semibold text-lg">اہم خبر: پاکستان میں نئی ٹیکنالوجی کا اعلان</span>
                    </div>
                </div>
            </div>

            <!-- Featured Article -->
            <article class="news-card bg-white rounded-3xl shadow-lg overflow-hidden mb-12 border border-slate-100">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1576086213369-97a306d36557?w=800&h=400&fit=crop" alt="خبر کی تصویر" class="w-full h-80 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-4 right-4">
                        <span class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm urdu-text font-medium">سیاست</span>
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center space-x-2 space-x-reverse text-slate-500 text-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="urdu-text">2 گھنٹے پہلے</span>
        </div>
        </div>
                    <h2 class="text-3xl font-bold text-slate-800 mb-4 urdu-text leading-relaxed">
                        پاکستان میں نئی حکومتی پالیسی کا اعلان - شہریوں کے لیے بہتری کے اقدامات
                    </h2>
                    <p class="text-slate-600 urdu-text leading-relaxed mb-6 text-lg">
                        وزیر اعظم نے آج ایک اہم پریس کانفرنس میں نئی پالیسی کا اعلان کیا جس کا مقصد عوام کی فلاح و بہبود میں بہتری لانا ہے۔ اس پالیسی کے تحت مختلف شعبوں میں اصلاحات کی جائیں گی اور عوام کو بہتر سہولات فراہم کی جائیں گی۔
                    </p>
                    <div class="flex items-center justify-between">
                        <a href="#" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl font-semibold urdu-text hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            مکمل خبر پڑھیں
                        </a>
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <button class="text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                                </svg>
                            </button>
                            <button class="text-slate-400 hover:text-indigo-600 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Category Sections -->
            <!-- Politics Section -->
            <div class="mb-12">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-slate-800 urdu-text flex items-center">
                        <div class="w-1 h-8 bg-gradient-to-b from-indigo-600 to-purple-600 rounded-full ml-3"></div>
                        سیاسی خبریں
                    </h3>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800 urdu-text text-sm">تمام خبریں دیکھیں</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1540910419892-4a36d2c3266c?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">سیاست</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                قومی اسمبلی میں اہم بل کی منظوری
                            </h3>
                            <p class="text-slate-600 text-sm urdu-text leading-relaxed mb-4">
                                قومی اسمبلی نے آج ایک اہم بل کی منظوری دے دی جس سے عوام کو بہت فائدہ ہوگا...
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400 text-xs urdu-text">1 گھنٹہ پہلے</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-sm">تفصیل</a>
                            </div>
                        </div>
                    </article>
                    <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                    <div class="relative">
                            <img src="https://images.unsplash.com/photo-1576085898323-218337e3e43c?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">سیاست</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                وزیر خارجہ کا اہم بیان
                            </h3>
                            <p class="text-slate-600 text-sm urdu-text leading-relaxed mb-4">
                                وزیر خارجہ نے بین الاقوامی تعلقات کے حوالے سے اہم بیان دیا...
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400 text-xs urdu-text">2 گھنٹے پہلے</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-sm">تفصیل</a>
                        </div>
                    </div>
                    </article>
                </div>
            </div>

            <!-- Sports Section -->
            <div class="mb-12">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-slate-800 urdu-text flex items-center">
                        <div class="w-1 h-8 bg-gradient-to-b from-emerald-600 to-green-600 rounded-full ml-3"></div>
                        کھیل
                    </h3>
                    <a href="#" class="text-emerald-600 hover:text-emerald-800 urdu-text text-sm">تمام خبریں دیکھیں</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="bg-emerald-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">کرکٹ</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                پاکستان کرکٹ ٹیم کی شاندار جیت
                            </h3>
                            <p class="text-slate-600 text-sm urdu-text leading-relaxed mb-4">
                                قومی کرکٹ ٹیم نے آج بین الاقوامی میچ میں زبردست کارکردگی کا مظاہرہ کیا...
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400 text-xs urdu-text">3 گھنٹے پہلے</span>
                                <a href="#" class="text-emerald-600 hover:text-emerald-800 font-medium urdu-text text-sm">تفصیل</a>
                            </div>
                        </div>
                    </article>
                    <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="bg-emerald-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">فٹ بال</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                نیشنل لیگ میں اہم میچ
                            </h3>
                            <p class="text-slate-600 text-sm urdu-text leading-relaxed mb-4">
                                نیشنل فٹ بال لیگ میں آج ایک اہم میچ کھیلا گیا...
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400 text-xs urdu-text">4 گھنٹے پہلے</span>
                                <a href="#" class="text-emerald-600 hover:text-emerald-800 font-medium urdu-text text-sm">تفصیل</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Technology Section -->
            <div class="mb-12">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-slate-800 urdu-text flex items-center">
                        <div class="w-1 h-8 bg-gradient-to-b from-violet-600 to-purple-600 rounded-full ml-3"></div>
                        تکنالوجی
                    </h3>
                    <a href="#" class="text-violet-600 hover:text-violet-800 urdu-text text-sm">تمام خبریں دیکھیں</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="bg-violet-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">موبائل</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                نئی موبائل ایپ کا اجراء
                            </h3>
                            <p class="text-slate-600 text-sm urdu-text leading-relaxed mb-4">
                                پاکستانی ڈویلپرز نے ایک نئی ایپ بنائی ہے جو عوام کی روزمرہ کی ضروریات پورا کرے گی...
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400 text-xs urdu-text">5 گھنٹے پہلے</span>
                                <a href="#" class="text-violet-600 hover:text-violet-800 font-medium urdu-text text-sm">تفصیل</a>
                            </div>
                        </div>
                    </article>
                    <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1507413245164-6160d8298b31?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="bg-violet-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">سائنس</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                                سائنس دانوں کی نئی دریافت
                            </h3>
                            <p class="text-slate-600 text-sm urdu-text leading-relaxed mb-4">
                                پاکستانی سائنس دانوں نے ایک اہم دریافت کی ہے جو مستقبل میں بہت فائدہ مند ثابت ہوگی...
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400 text-xs urdu-text">6 گھنٹے پہلے</span>
                                <a href="#" class="text-violet-600 hover:text-violet-800 font-medium urdu-text text-sm">تفصیل</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Latest News -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 border border-slate-100">
                <h3 class="text-2xl font-bold text-slate-800 mb-6 urdu-text flex items-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-indigo-600 to-purple-600 rounded-full ml-3"></div>
                    تازہ ترین خبریں
                </h3>
                <div class="space-y-5">
                    <div class="flex items-start space-x-3 space-x-reverse p-3 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="bg-red-500 w-3 h-3 rounded-full mt-2 flex-shrink-0 animate-pulse"></div>
                        <div>
                            <h4 class="font-semibold text-slate-800 urdu-text text-sm leading-relaxed">
                                کراچی میں بارش کے بعد حالات بہتر
                            </h4>
                            <p class="text-slate-500 text-xs mt-1 urdu-text">30 منٹ پہلے</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse p-3 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="bg-indigo-500 w-3 h-3 rounded-full mt-2 flex-shrink-0"></div>
                        <div>
                            <h4 class="font-semibold text-slate-800 urdu-text text-sm leading-relaxed">
                                لاہور میں تعلیمی اصلاحات کا آغاز
                            </h4>
                            <p class="text-slate-500 text-xs mt-1 urdu-text">1 گھنٹہ پہلے</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse p-3 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="bg-emerald-500 w-3 h-3 rounded-full mt-2 flex-shrink-0"></div>
                        <div>
                            <h4 class="font-semibold text-slate-800 urdu-text text-sm leading-relaxed">
                                اسلام آباد میں نئے پروجیکٹ کا اعلان
                            </h4>
                            <p class="text-slate-500 text-xs mt-1 urdu-text">2 گھنٹے پہلے</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weather Widget -->
            <div class="bg-gradient-to-br from-indigo-500 via-purple-500 to-indigo-600 text-white rounded-2xl p-6 mb-8 shadow-lg">
                <h3 class="text-xl font-bold mb-4 urdu-text">موسمی حالات</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between bg-white/20 rounded-xl p-4 backdrop-blur-sm">
                        <div>
                            <p class="text-sm urdu-text opacity-90">کراچی</p>
                            <p class="text-2xl font-bold">32°C</p>
                        </div>
                        <div class="text-yellow-300">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between bg-white/20 rounded-xl p-4 backdrop-blur-sm">
                        <div>
                            <p class="text-sm urdu-text opacity-90">لاہور</p>
                            <p class="text-2xl font-bold">28°C</p>
                        </div>
                        <div class="text-gray-300">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular Articles -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-slate-100">
                <h3 class="text-2xl font-bold text-slate-800 mb-6 urdu-text flex items-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-orange-500 to-red-500 rounded-full ml-3"></div>
                    مقبول خبریں
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold shadow-lg">1</div>
                        <p class="text-sm font-medium text-slate-800 urdu-text leading-relaxed">پیٹرول کی قیمتوں میں اہم تبدیلی</p>
                    </div>
                    <div class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="bg-gradient-to-r from-orange-500 to-yellow-500 text-white w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold shadow-lg">2</div>
                        <p class="text-sm font-medium text-slate-800 urdu-text leading-relaxed">نئے تعلیمی نصاب کا اعلان</p>
                    </div>
                    <div class="flex items-center space-x-3 space-x-reverse p-3 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="bg-gradient-to-r from-yellow-500 to-green-500 text-white w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold shadow-lg">3</div>
                        <p class="text-sm font-medium text-slate-800 urdu-text leading-relaxed">صحت کی نئی مہم کا آغاز</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection