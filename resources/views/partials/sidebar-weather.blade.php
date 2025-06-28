<div class="bg-gradient-to-br from-indigo-500 via-purple-500 to-indigo-600 text-white rounded-2xl p-6 mb-8 shadow-lg">
                <h3 class="text-xl font-bold mb-4 urdu-text">موسمی حالات</h3>
                <div class="space-y-4">
                    @php
                        $weatherList = isset($weather) ? $weather : (isset($globalWeather) ? $globalWeather : []);
                    @endphp
                    @foreach($weatherList as $city)
                        <div class="flex items-center justify-between bg-white/20 rounded-xl p-4 backdrop-blur-sm">
                            <div>
                                <p class="text-sm urdu-text opacity-90">{{ is_array($city) ? $city['name'] : $city->name }}</p>
                                <p class="text-2xl font-bold">{{ is_array($city) ? $city['temp'] : $city->temp }}</p>
                            </div>
                            <div class="text-yellow-300">
                                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>