<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Biblioteca CDT') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom gradient background */
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #0c4a6e 50%, #075985 75%, #0e7490 100%);
        }
    </style>
</head>
<body class="min-h-full bg-gradient-to-br from-slate-50 to-slate-100 text-slate-900 antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Enhanced Header -->
        <header class="sticky top-0 z-40 backdrop-blur-lg bg-white/80 border-b border-slate-200/50 shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-4">
                <div class="flex items-center justify-between gap-4">
                    <!-- Logo -->
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg shadow-cyan-500/30">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <a href="{{ route('home') }}" class="text-lg font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent hover:from-cyan-700 hover:to-blue-700 transition-all">
                                CDT Smart Regions
                            </a>
                            <p class="text-xs text-slate-500 font-medium">Biblioteca de modelos IA + IoT</p>
                        </div>
                    </div>
                    
                    <!-- Navigation -->
                    <nav class="hidden md:flex items-center gap-6">
                        <a class="text-sm font-semibold text-slate-700 hover:text-cyan-600 transition-colors flex items-center gap-2 group" 
                           href="{{ route('catalog.index') }}">
                            <svg class="h-4 w-4 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                            </svg>
                            Biblioteca
                        </a>
                        <a class="text-sm font-semibold text-slate-700 hover:text-cyan-600 transition-colors flex items-center gap-2 group" 
                           href="#categorias">
                            <svg class="h-4 w-4 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Categorías
                        </a>
                        <a class="text-sm font-semibold text-slate-700 hover:text-cyan-600 transition-colors flex items-center gap-2 group" 
                           href="#sobre-cdt">
                            <svg class="h-4 w-4 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Sobre el CDT
                        </a>
                    </nav>
                    
                    <!-- CTA Button -->
                    <a href="{{ route('catalog.index') }}" 
                       class="hidden sm:inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-cyan-500/30 transform hover:scale-105 transition-all">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Explorar
                    </a>
                    
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors" 
                            onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <svg class="h-6 w-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 space-y-3 border-t border-slate-200 pt-4">
                    <a class="block px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-lg transition-colors" 
                       href="{{ route('catalog.index') }}">
                        📚 Biblioteca
                    </a>
                    <a class="block px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-lg transition-colors" 
                       href="#categorias">
                        🏷️ Categorías
                    </a>
                    <a class="block px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-lg transition-colors" 
                       href="#sobre-cdt">
                        ℹ️ Sobre el CDT
                    </a>
                </div>
            </div>
        </header>

        <main class="flex-1">
            {{ $slot ?? '' }}
            @yield('content')
        </main>

        <!-- Enhanced Footer -->
        <footer class="relative bg-gradient-to-br from-slate-900 via-cyan-950 to-slate-900 text-white">
            <div class="absolute inset-0 overflow-hidden opacity-30">
                <div class="absolute -top-24 left-1/4 h-96 w-96 rounded-full bg-cyan-500/20 blur-3xl"></div>
                <div class="absolute -bottom-24 right-1/4 h-96 w-96 rounded-full bg-blue-500/20 blur-3xl"></div>
            </div>
            
            <div class="relative mx-auto max-w-7xl px-4 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <!-- Brand -->
                    <div class="md:col-span-2">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">CDT Smart Regions</h3>
                                <p class="text-sm text-slate-400">Centro de Desarrollo Tecnológico</p>
                            </div>
                        </div>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-md">
                            Impulsando la innovación 4.0 en territorios inteligentes a través de IA, IoT y transferencia tecnológica.
                        </p>
                    </div>
                    
                    <!-- Links -->
                    <div>
                        <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-wider">Navegación</h4>
                        <ul class="space-y-2 text-sm text-slate-400">
                            <li><a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors">Inicio</a></li>
                            <li><a href="{{ route('catalog.index') }}" class="hover:text-cyan-400 transition-colors">Biblioteca</a></li>
                            <li><a href="#categorias" class="hover:text-cyan-400 transition-colors">Categorías</a></li>
                            <li><a href="#sobre-cdt" class="hover:text-cyan-400 transition-colors">Sobre el CDT</a></li>
                        </ul>
                    </div>
                    
                    <!-- Contact -->
                    <div>
                        <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-wider">Contacto</h4>
                        <ul class="space-y-2 text-sm text-slate-400">
                            <li class="flex items-start gap-2">
                                <svg class="h-5 w-5 text-cyan-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Universidad Autónoma de Bucaramanga</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="h-5 w-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <a href="mailto:cdt@unab.edu.co" class="hover:text-cyan-400 transition-colors">cdt@unab.edu.co</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Bottom Bar -->
                <div class="pt-8 border-t border-slate-800/50 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500">
                    <p>&copy; {{ date('Y') }} CDT Smart Regions Center - UNAB. Todos los derechos reservados.</p>
                    <div class="flex items-center gap-4">
                        <span class="flex items-center gap-2">
                            <span class="flex h-2 w-2 rounded-full bg-green-400 animate-pulse"></span>
                            Sistema activo
                        </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Scroll to Top Button -->
    <button id="scroll-to-top" 
            class="fixed bottom-8 right-8 h-12 w-12 rounded-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white shadow-lg shadow-cyan-500/30 opacity-0 invisible transition-all hover:scale-110 z-50"
            onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
        <svg class="h-6 w-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>
    
    <script>
        // Scroll to top button visibility
        window.addEventListener('scroll', () => {
            const button = document.getElementById('scroll-to-top');
            if (window.scrollY > 300) {
                button.classList.remove('opacity-0', 'invisible');
                button.classList.add('opacity-100', 'visible');
            } else {
                button.classList.add('opacity-0', 'invisible');
                button.classList.remove('opacity-100', 'visible');
            }
        });
    </script>
</body>
</html>
