@extends('layouts.app')

@section('title', 'سیاست - روزانہ اردو')

@section('content')
<main class="container mx-auto px-4 mt-[72px]">
    <!-- Top Banner Ad Space -->
    <div class="mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100">
            <div class="w-full h-[90px] bg-slate-100 rounded-xl flex items-center justify-center">
                <div class="text-center">
                    <div class="text-slate-400 text-sm font-semibold mb-1">Advertisement</div>
                    <div class="text-slate-500 text-xs urdu-text">اشتہار</div>
                    <div class="text-slate-400 text-xs mt-1">728 x 90 Banner</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Content -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-3">
            <!-- Category Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-slate-800 mb-4 urdu-text">سیاست</h1>
                <p class="text-slate-600 urdu-text text-lg">تازہ ترین سیاسی خبریں اور اپڈیٹس</p>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- News Article 1 -->
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

                <!-- News Article 2 -->
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

            <!-- In-Content Ad Space
            <div class="my-8">
                <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100">
                    <div class="w-full h-[250px] bg-slate-100 rounded-xl flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-slate-400 text-sm font-semibold mb-1">Advertisement</div>
                            <div class="text-slate-500 text-xs urdu-text">اشتہار</div>
                            <div class="text-slate-400 text-xs mt-1">300 x 250 Banner</div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- More News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- News Article 3 -->
                <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1576086213369-97a306d36557?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4">
                            <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">سیاست</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                            نئی حکومتی پالیسی کا اعلان
                        </h3>
                        <p class="text-slate-600 text-sm urdu-text leading-relaxed mb-4">
                            حکومت نے نئی پالیسی کا اعلان کیا جس سے عوام کو بہت فائدہ ہوگا...
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400 text-xs urdu-text">3 گھنٹے پہلے</span>
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-sm">تفصیل</a>
                        </div>
                    </div>
                </article>

                <!-- News Article 4 -->
                <article class="news-card bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1576085898323-218337e3e43c?w=400&h=250&fit=crop" alt="خبر" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4">
                            <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-xs urdu-text font-medium">سیاست</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-slate-800 mb-3 urdu-text leading-relaxed">
                            سیاسی جماعتوں کا اجلاس
                        </h3>
                        <p class="text-slate-600 text-sm urdu-text leading-relaxed mb-4">
                            سیاسی جماعتوں نے اہم اجلاس میں شرکت کی اور اہم فیصلے کیے...
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400 text-xs urdu-text">4 گھنٹے پہلے</span>
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-sm">تفصیل</a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Bottom Ad Space -->
            <div class="mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100">
                    <div class="w-full h-[90px] bg-slate-100 rounded-xl flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-slate-400 text-sm font-semibold mb-1">Advertisement</div>
                            <div class="text-slate-500 text-xs urdu-text">اشتہار</div>
                            <div class="text-slate-400 text-xs mt-1">728 x 90 Banner</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center space-x-2 space-x-reverse mb-12">
                <a href="#" class="bg-white text-slate-600 px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors">
                    <span class="urdu-text">پچھلا</span>
                </a>
                <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">1</a>
                <a href="#" class="bg-white text-slate-600 px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors">2</a>
                <a href="#" class="bg-white text-slate-600 px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors">3</a>
                <a href="#" class="bg-white text-slate-600 px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors">
                    <span class="urdu-text">اگلا</span>
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Sidebar Ad Space -->
            <div class="mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-4 border border-slate-100">
                    <div class="w-full h-[600px] bg-slate-100 rounded-xl flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-slate-400 text-sm font-semibold mb-1">Advertisement</div>
                            <div class="text-slate-500 text-xs urdu-text">اشتہار</div>
                            <div class="text-slate-400 text-xs mt-1">300 x 600 Banner</div>
                        </div>
                    </div>
                </div>
            </div>

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