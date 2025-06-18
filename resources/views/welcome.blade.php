<!DOCTYPE html>
<html lang="ur" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اردو نیوز - Urdu News</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Nastaliq Urdu', serif;
        }
        .urdu-text {
            font-family: 'Noto Nastaliq Urdu', serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-800 to-blue-900 text-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="bg-white text-blue-800 p-2 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold urdu-text">اردو نیوز</h1>
                        <p class="text-blue-200 text-sm">تازہ ترین خبریں</p>
                    </div>
                </div>
                <div class="text-left">
                    <div class="text-sm text-blue-200">آج کی تاریخ</div>
                    <div class="font-semibold">17 جون 2025</div>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="bg-blue-900 border-t border-blue-700">
            <div class="container mx-auto px-4">
                <ul class="flex space-x-8 space-x-reverse py-3">
                    <li><a href="#" class="text-white hover:text-blue-200 transition-colors urdu-text">صفحہ اول</a></li>
                    <li><a href="#" class="text-white hover:text-blue-200 transition-colors urdu-text">سیاست</a></li>
                    <li><a href="#" class="text-white hover:text-blue-200 transition-colors urdu-text">کھیل</a></li>
                    <li><a href="#" class="text-white hover:text-blue-200 transition-colors urdu-text">تجارت</a></li>
                    <li><a href="#" class="text-white hover:text-blue-200 transition-colors urdu-text">تکنالوجی</a></li>
                    <li><a href="#" class="text-white hover:text-blue-200 transition-colors urdu-text">تفریح</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main News Section -->
            <div class="lg:col-span-2">
                <!-- Breaking News Banner -->
                <div class="bg-red-600 text-white p-3 rounded-lg mb-6 animate-pulse">
                    <div class="flex items-center">
                        <span class="bg-white text-red-600 px-2 py-1 rounded text-sm font-bold ml-3">خبر فوری</span>
                        <span class="urdu-text font-semibold">اہم خبر: پاکستان میں نئی ٹیکنالوجی کا اعلان</span>
                    </div>
                </div>

                <!-- Featured Article -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                    <img src="https://via.placeholder.com/600x300" alt="خبر کی تصویر" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm urdu-text">سیاست</span>
                            <span class="text-gray-500 text-sm mr-3">2 گھنٹے پہلے</span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-3 urdu-text leading-relaxed">
                            پاکستان میں نئی حکومتی پالیسی کا اعلان - شہریوں کے لیے بہتری کے اقدامات
                        </h2>
                        <p class="text-gray-600 urdu-text leading-relaxed mb-4">
                            وزیر اعظم نے آج ایک اہم پریس کانفرنس میں نئی پالیسی کا اعلان کیا جس کا مقصد عوام کی فلاح و بہبود میں بہتری لانا ہے۔ اس پالیسی کے تحت مختلف شعبوں میں اصلاحات کی جائیں گی۔
                        </p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold urdu-text">مکمل خبر پڑھیں</a>
                    </div>
                </article>

                <!-- News Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <article class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="https://via.placeholder.com/300x200" alt="خبر" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs urdu-text">کھیل</span>
                            <h3 class="text-lg font-semibold text-gray-800 mt-2 mb-2 urdu-text">
                                پاکستان کرکٹ ٹیم کی شاندار جیت
                            </h3>
                            <p class="text-gray-600 text-sm urdu-text">
                                قومی کرکٹ ٹیم نے آج بین الاقوامی میچ میں زبردست کارکردگی کا مظاہرہ کیا...
                            </p>
                        </div>
                    </article>

                    <article class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="https://via.placeholder.com/300x200" alt="خبر" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs urdu-text">تکنالوجی</span>
                            <h3 class="text-lg font-semibold text-gray-800 mt-2 mb-2 urdu-text">
                                نئی موبائل ایپ کا اجراء
                            </h3>
                            <p class="text-gray-600 text-sm urdu-text">
                                پاکستانی ڈویلپرز نے ایک نئی ایپ بنائی ہے جو عوام کی روزمرہ کی ضروریات پورا کرے گی...
                            </p>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Latest News -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 urdu-text border-b border-gray-200 pb-2">
                        تازہ ترین خبریں
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3 space-x-reverse">
                            <div class="bg-red-500 w-2 h-2 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800 urdu-text text-sm">
                                    کراچی میں بارش کے بعد حالات
                                </h4>
                                <p class="text-gray-500 text-xs mt-1">30 منٹ پہلے</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 space-x-reverse">
                            <div class="bg-blue-500 w-2 h-2 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800 urdu-text text-sm">
                                    لاہور میں تعلیمی اصلاحات
                                </h4>
                                <p class="text-gray-500 text-xs mt-1">1 گھنٹہ پہلے</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 space-x-reverse">
                            <div class="bg-green-500 w-2 h-2 rounded-full mt-2 flex-shrink-0"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800 urdu-text text-sm">
                                    اسلام آباد میں نئی پروجیکٹ
                                </h4>
                                <p class="text-gray-500 text-xs mt-1">2 گھنٹے پہلے</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Weather Widget -->
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 text-white rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-bold mb-3 urdu-text">موسمی حالات</h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm urdu-text">کراچی</p>
                            <p class="text-3xl font-bold">32°C</p>
                        </div>
                        <div class="text-right">
                            <svg class="w-12 h-12 text-yellow-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm mt-2 urdu-text">صاف اور دھوپ والا دن</p>
                </div>

                <!-- Popular Articles -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 urdu-text border-b border-gray-200 pb-2">
                        مقبول خبریں
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <span class="bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold">1</span>
                            <p class="text-sm font-medium text-gray-800 urdu-text">پیٹرول کی قیمتوں میں تبدیلی</p>
                        </div>
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <span class="bg-orange-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold">2</span>
                            <p class="text-sm font-medium text-gray-800 urdu-text">نئے تعلیمی نصاب کا اعلان</p>
                        </div>
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <span class="bg-yellow-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold">3</span>
                            <p class="text-sm font-medium text-gray-800 urdu-text">صحت کی نئی مہم کا آغاز</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <h4 class="text-lg font-bold mb-3 urdu-text">رابطہ</h4>
                    <p class="text-gray-300 text-sm urdu-text">ای میل: info@urdunews.com</p>
                    <p class="text-gray-300 text-sm urdu-text">فون: +92-21-1234567</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-3 urdu-text">اہم لنکس</h4>
                    <ul class="space-y-1">
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm urdu-text">ہمارے بارے میں</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm urdu-text">اشتہارات</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm urdu-text">کیریئر</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-3 urdu-text">کیٹگریز</h4>
                    <ul class="space-y-1">
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm urdu-text">قومی خبریں</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm urdu-text">بین الاقوامی</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm urdu-text">کھیل</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-3 urdu-text">سوشل میڈیا</h4>
                    <div class="flex space-x-3 space-x-reverse">
                        <a href="#" class="bg-blue-600 hover:bg-blue-700 p-2 rounded">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="bg-blue-800 hover:bg-blue-900 p-2 rounded">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-6 text-center">
                <p class="text-gray-400 text-sm urdu-text">© 2025 اردو نیوز - تمام حقوق محفوظ ہیں</p>
            </div>
        </div>
    </footer>
</body>
</html>