<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Biblioteca CDT') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100">
    <div class="min-h-screen flex flex-col">
        <header class="border-b border-slate-800/60 bg-slate-900/70 backdrop-blur">
            <div class="mx-auto max-w-6xl px-4 py-4 flex items-center justify-between gap-4">
                <div>
                    <a href="{{ route('home') }}" class="text-lg font-semibold tracking-tight text-cyan-300">CDT Smart Regions</a>
                    <p class="text-xs text-slate-400">Biblioteca de modelos IA + IoT</p>
                </div>
                <nav class="flex items-center gap-4 text-sm text-slate-300">
                    <a class="hover:text-white transition" href="{{ route('catalog.index') }}">Biblioteca</a>
                    <a class="hover:text-white transition" href="#como-usar">Cómo usar</a>
                    <a class="hover:text-white transition" href="#sobre-cdt">Sobre el CDT</a>
                </nav>
            </div>
        </header>

        <main class="flex-1">
            {{ $slot ?? '' }}
            @yield('content')
        </main>

        <footer class="border-t border-slate-800/60 bg-slate-900/70">
            <div class="mx-auto max-w-6xl px-4 py-4 text-xs text-slate-500">
                &copy; {{ date('Y') }} CDT Smart Regions Center - Universidad Autónoma de Bucaramanga.
            </div>
        </footer>
    </div>
</body>
</html>
