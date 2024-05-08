<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Current Weather in {{ $weatherData['name'] }}</h1>
                        @if (isset($weatherData['weather'][0]['icon']))
                                <img src="http://openweathermap.org/img/wn/{{ $weatherData['weather'][0]['icon'] }}.png" alt="Weather Icon">
                            @endif
                        <p>Description: {{ $weatherData['weather'][0]['description'] }}</p>
                        <p>Temperature: {{ $weatherData['main']['temp'] }} &#8451;</p>
                        <p>Wind speed: {{ $weatherData['wind']['speed'] }} </p>
                        <p>Visibility: {{ $weatherData['visibility'] / 1000 }} km</p>
                    <p>Cloudiness: {{ $weatherData['clouds']['all'] }}%</p>
                        @if(isset($weatherData['rain']['1h']))
                    <p>Rain (Last 1 hr): {{ $weatherData['rain']['1h'] }} mm</p>
                        @endif
                        @if(isset($weatherData['snow']['1h']))
                    <p>Snow (Last 1 hr): {{ $weatherData['snow']['1h'] }} mm</p>
                        @endif
                    <p>Sunrise: {{ date('H:i', $weatherData['sys']['sunrise']) }}</p>
                    <p>Sunset: {{ date('H:i', $weatherData['sys']['sunset']) }}</p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>