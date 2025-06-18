@extends('layouts.app')

@section('title', 'وزیر اعظم کا اہم بیان - نئی پالیسی کا اعلان - روزانہ اردو')

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

    <!-- News Content -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-3">
            <!-- Article Header -->
            <div class="mb-8">
                <div class="flex items-center space-x-4 space-x-reverse mb-4">
                    <a href="#" class="bg-indigo-500 text-white px-4 py-2 rounded-full text-sm urdu-text font-medium">
                        سیاست
                    </a>
                    <span class="text-slate-500 text-sm urdu-text">2 گھنٹے پہلے</span>
                </div>
                <h1 class="text-4xl font-bold text-slate-800 mb-6 urdu-text leading-relaxed">
                    وزیر اعظم کا اہم بیان - نئی پالیسی کا اعلان
                </h1>
                <div class="flex items-center space-x-4 space-x-reverse text-slate-500 text-sm">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        <span class="urdu-text">احمد علی</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="urdu-text">اسلام آباد</span>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="https://images.unsplash.com/photo-1576085898323-218337e3e43c?w=800&h=400&fit=crop" alt="وزیر اعظم کا اہم بیان" class="w-full h-[400px] object-cover rounded-2xl">
                <p class="text-slate-500 text-sm mt-2 urdu-text text-center">وزیر اعظم پریس کانفرنس میں نئی پالیسی کا اعلان کرتے ہوئے</p>
            </div>

            <!-- In-Content Ad Space -->
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
            </div>

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none mb-8">
                <p class="urdu-text text-lg leading-relaxed">
                    وزیر اعظم نے آج ایک اہم پریس کانفرنس میں نئی پالیسی کا اعلان کیا جس کا مقصد عوام کی فلاح و بہبود میں بہتری لانا ہے۔ اس پالیسی کے تحت مختلف شعبوں میں اصلاحات کی جائیں گی اور عوام کو بہتر سہولات فراہم کی جائیں گی۔
                </p>
                <p class="urdu-text text-lg leading-relaxed">
                    نئی پالیسی کے تحت تعلیم، صحت، روزگار اور معیشت کے شعبوں میں اہم اقدامات کیے جائیں گے۔ وزیر اعظم نے کہا کہ حکومت عوام کی فلاح و بہبود کے لیے ہر ممکن کوشش کرے گی۔
                </p>
                <p class="urdu-text text-lg leading-relaxed">
                    پریس کانفرنس میں موجود صحافیوں سے بات کرتے ہوئے وزیر اعظم نے کہا کہ نئی پالیسی کے تحت تعلیمی اداروں میں معیار کو بہتر بنایا جائے گا اور طلباء کو جدید تعلیم فراہم کی جائے گی۔
                </p>
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

            <!-- Tags -->
            <div class="mb-8">
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="bg-slate-100 text-slate-600 px-4 py-2 rounded-full text-sm urdu-text hover:bg-slate-200 transition-colors">
                        #سیاست
                    </a>
                    <a href="#" class="bg-slate-100 text-slate-600 px-4 py-2 rounded-full text-sm urdu-text hover:bg-slate-200 transition-colors">
                        #وزیر_اعظم
                    </a>
                    <a href="#" class="bg-slate-100 text-slate-600 px-4 py-2 rounded-full text-sm urdu-text hover:bg-slate-200 transition-colors">
                        #نئی_پالیسی
                    </a>
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="flex items-center space-x-4 space-x-reverse mb-12">
                <span class="text-slate-600 urdu-text">شیئر کریں:</span>
                <a href="#" class="text-slate-400 hover:text-indigo-600 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                    </svg>
                </a>
                <a href="#" class="text-slate-400 hover:text-indigo-600 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                </a>
                <a href="#" class="text-slate-400 hover:text-indigo-600 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                </a>
            </div>

            <!-- Related News -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-slate-800 mb-6 urdu-text flex items-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-indigo-600 to-purple-600 rounded-full ml-3"></div>
                    متعلقہ خبریں
                </h3>
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
                            <div class="flex items-center justify-between">
                                <span class="text-slate-400 text-xs urdu-text">2 گھنٹے پہلے</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium urdu-text text-sm">تفصیل</a>
                            </div>
                        </div>
                    </article>
                </div>
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