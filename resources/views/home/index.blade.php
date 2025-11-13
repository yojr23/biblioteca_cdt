@extends('layouts.app')

@section('content')
<!-- Onboarding Modal -->
<div x-data="{ show: !localStorage.getItem('onboarding_completed') }" 
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/90 backdrop-blur-sm"
     style="display: none;">
    <div class="relative max-w-2xl mx-4 bg-gradient-to-br from-slate-900 via-cyan-950 to-slate-900 rounded-3xl p-8 shadow-2xl border border-cyan-500/20"
         x-transition:enter="transition ease-out duration-300 delay-100"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100">
        
        <div class="absolute -top-4 -right-4 h-32 w-32 bg-cyan-500/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-4 -left-4 h-32 w-32 bg-purple-500/20 rounded-full blur-3xl"></div>
        
        <div class="relative">
            <div class="flex items-center justify-center mb-6">
                <div class="h-20 w-20 rounded-full bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center animate-pulse">
                    <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
            
            <h2 class="text-3xl font-bold text-center bg-gradient-to-r from-cyan-300 via-blue-300 to-purple-300 bg-clip-text text-transparent mb-4">
                ¡Bienvenido a la Biblioteca CDT!
            </h2>
            
            <p class="text-slate-300 text-center mb-6 leading-relaxed">
                Descubre <span class="text-cyan-400 font-semibold">más de 40 proyectos</span> de Inteligencia Artificial e IoT desarrollados en la región. 
                Navega por secciones, explora casos reales y encuentra la tecnología perfecta para tu proyecto.
            </p>
            
            <div class="grid grid-cols-3 gap-4 mb-8">
                <div class="text-center p-4 bg-white/5 rounded-2xl border border-cyan-500/20 transform hover:scale-105 transition-transform">
                    <div class="text-2xl mb-2">🚀</div>
                    <p class="text-xs text-slate-300">Proyectos innovadores</p>
                </div>
                <div class="text-center p-4 bg-white/5 rounded-2xl border border-purple-500/20 transform hover:scale-105 transition-transform">
                    <div class="text-2xl mb-2">🎯</div>
                    <p class="text-xs text-slate-300">Búsqueda inteligente</p>
                </div>
                <div class="text-center p-4 bg-white/5 rounded-2xl border border-blue-500/20 transform hover:scale-105 transition-transform">
                    <div class="text-2xl mb-2">💡</div>
                    <p class="text-xs text-slate-300">Casos de éxito</p>
                </div>
            </div>
            
            <button @click="show = false; localStorage.setItem('onboarding_completed', 'true')" 
                    class="w-full py-3 px-6 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-semibold rounded-xl shadow-lg shadow-cyan-500/30 transform hover:scale-105 transition-all">
                Comenzar a explorar
            </button>
        </div>
    </div>
</div>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-cyan-950/30 to-purple-950/20 text-white">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-cyan-500/20 blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -right-32 h-80 w-80 rounded-full bg-purple-500/20 blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-blue-500/20 blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <!-- Floating Icons Animation -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 text-4xl opacity-20 animate-float">🤖</div>
        <div class="absolute top-40 right-20 text-3xl opacity-20 animate-float" style="animation-delay: 0.5s;">💻</div>
        <div class="absolute bottom-40 left-1/4 text-3xl opacity-20 animate-float" style="animation-delay: 1s;">🔬</div>
        <div class="absolute bottom-20 right-1/4 text-4xl opacity-20 animate-float" style="animation-delay: 1.5s;">⚡</div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:py-32">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <!-- Left Content -->
            <div class="space-y-8 animate-fade-in-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500/10 border border-cyan-500/30 rounded-full backdrop-blur-sm">
                    <span class="flex h-2 w-2 rounded-full bg-cyan-400 animate-pulse"></span>
                    <span class="text-xs font-semibold uppercase tracking-wider text-cyan-300">CDT Smart Regions Center</span>
                </div>
                
                <h1 class="text-5xl sm:text-6xl font-bold leading-tight">
                    Innovación <span class="bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-400 bg-clip-text text-transparent">4.0</span><br/>
                    para territorios inteligentes
                </h1>
                
                <p class="text-lg text-slate-300 leading-relaxed max-w-xl">
                    Explora nuestra colección de <span class="text-cyan-400 font-semibold">modelos de IA</span>, 
                    <span class="text-purple-400 font-semibold">kits IoT</span> y soluciones listas para transferencia tecnológica. 
                    Casos reales desarrollados en Santander y el oriente colombiano.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('catalog.index') }}" 
                       class="group inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-semibold rounded-xl shadow-lg shadow-cyan-500/30 transform hover:scale-105 transition-all">
                        <span>Explorar Biblioteca</span>
                        <svg class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="#categorias" 
                       class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 text-white font-semibold rounded-xl transform hover:scale-105 transition-all">
                        Descubrir secciones
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 pt-8">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-2xl blur group-hover:blur-xl transition-all"></div>
                        <div class="relative p-6 bg-slate-900/50 backdrop-blur-sm border border-cyan-500/20 rounded-2xl transform hover:-translate-y-1 transition-transform">
                            <p class="text-4xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">+40</p>
                            <p class="text-sm text-slate-400 mt-1">Modelos IA/IoT</p>
                        </div>
                    </div>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-2xl blur group-hover:blur-xl transition-all"></div>
                        <div class="relative p-6 bg-slate-900/50 backdrop-blur-sm border border-purple-500/20 rounded-2xl transform hover:-translate-y-1 transition-transform">
                            <p class="text-4xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">12</p>
                            <p class="text-sm text-slate-400 mt-1">Sectores clave</p>
                        </div>
                    </div>
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-cyan-500/20 rounded-2xl blur group-hover:blur-xl transition-all"></div>
                        <div class="relative p-6 bg-slate-900/50 backdrop-blur-sm border border-blue-500/20 rounded-2xl transform hover:-translate-y-1 transition-transform">
                            <p class="text-4xl font-bold bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">100%</p>
                            <p class="text-sm text-slate-400 mt-1">Open Access</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content - Enhanced Carousel -->
            <div x-data="carouselComponent({ slides: @js($carouselSlides) })" 
                 x-init="init()" 
                 class="relative animate-fade-in-up"
                 style="animation-delay: 0.2s;">
                
                <div class="relative">
                    <!-- Glow Effect -->
                    <div class="absolute -inset-4 bg-gradient-to-r from-cyan-500/20 via-blue-500/20 to-purple-500/20 rounded-3xl blur-2xl"></div>
                    
                    <!-- Carousel Card -->
                    <div class="relative bg-gradient-to-br from-white to-slate-50 rounded-3xl shadow-2xl overflow-hidden transform hover:scale-105 transition-transform duration-500">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-slate-50 to-white border-b border-slate-200 px-6 py-4 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="flex gap-1.5">
                                    <div class="h-3 w-3 rounded-full bg-red-400"></div>
                                    <div class="h-3 w-3 rounded-full bg-yellow-400"></div>
                                    <div class="h-3 w-3 rounded-full bg-green-400"></div>
                                </div>
                                <span class="text-xs font-semibold text-slate-600 uppercase tracking-wider">Casos destacados</span>
                            </div>
                            <div class="flex gap-2">
                                <button type="button" @click="prev" 
                                        class="flex items-center justify-center h-8 w-8 rounded-lg bg-slate-100 hover:bg-cyan-500 hover:text-white text-slate-600 transform hover:scale-110 transition-all" 
                                        aria-label="Anterior">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <button type="button" @click="next" 
                                        class="flex items-center justify-center h-8 w-8 rounded-lg bg-slate-100 hover:bg-cyan-500 hover:text-white text-slate-600 transform hover:scale-110 transition-all" 
                                        aria-label="Siguiente">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-8" x-show="slides.length" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-cyan-50 rounded-full mb-4">
                                <span class="h-2 w-2 rounded-full bg-cyan-500"></span>
                                <span class="text-xs font-bold uppercase tracking-wider text-cyan-700" x-text="activeSlide.sector"></span>
                            </div>
                            
                            <h2 class="text-3xl font-bold text-slate-900 mb-4 leading-tight" x-text="activeSlide.title"></h2>
                            
                            <p class="text-slate-600 leading-relaxed mb-6" x-text="activeSlide.description"></p>
                            
                            <div class="flex items-center justify-between">
                                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-cyan-50 to-blue-50 rounded-xl border border-cyan-200">
                                    <svg class="h-5 w-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm font-bold text-cyan-700">TRL <span x-text="activeSlide.trl"></span></span>
                                </div>
                                
                                <a :href="activeSlide.slug ? '{{ url('/catalog') }}/' + activeSlide.slug : '{{ route('catalog.index') }}'" 
                                   class="group inline-flex items-center gap-2 px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-semibold rounded-xl shadow-lg transform hover:scale-105 transition-all">
                                    <span>Ver detalle</span>
                                    <svg class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        
                        <div class="p-8" x-show="!slides.length">
                            <p class="text-center text-slate-500">Cargando proyectos destacados...</p>
                        </div>
                        
                        <!-- Progress Indicators -->
                        <div class="px-8 pb-6 flex justify-center gap-2" x-show="slides.length > 1">
                            <template x-for="(slide, index) in slides" :key="index">
                                <button @click="active = index" 
                                        class="h-2 rounded-full transition-all"
                                        :class="active === index ? 'w-8 bg-cyan-500' : 'w-2 bg-slate-300 hover:bg-slate-400'">
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search by Categories Section -->
<section class="relative bg-gradient-to-b from-slate-50 to-white py-20" id="categorias">
    <div class="mx-auto max-w-7xl px-4">
        <div class="text-center mb-16 animate-fade-in-up">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-50 border border-cyan-200 rounded-full mb-4">
                <svg class="h-4 w-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                <span class="text-xs font-semibold uppercase tracking-wider text-cyan-700">Explora por categorías</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-bold text-slate-900 mb-4">
                Encuentra lo que <span class="bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">necesitas</span>
            </h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Navega por secciones visuales y descubre proyectos organizados por sector, tecnología y tipo de datos
            </p>
        </div>

        @include('home.partials.explore-panels', ['panelFilters' => $panelFilters])
    </div>
</section>

<!-- Sectors Section -->
@include('home.partials.sectors', ['sectors' => $sectors])

<!-- Highlights Section -->
@include('home.partials.highlights', ['highlights' => $highlights])

<!-- Most Viewed Section -->
@include('home.partials.most-viewed', ['mostViewed' => $mostViewed])

<!-- Mission Vision Section -->
@include('home.partials.mission-vision', ['organization' => $organization])

<!-- CTA Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-cyan-950 to-purple-950 text-white py-20">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-1/4 h-96 w-96 rounded-full bg-cyan-500/20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 h-96 w-96 rounded-full bg-purple-500/20 blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    </div>
    
    <div class="relative mx-auto max-w-4xl px-4 text-center">
        <h2 class="text-4xl sm:text-5xl font-bold mb-6">
            ¿Listo para <span class="bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">innovar</span>?
        </h2>
        <p class="text-xl text-slate-300 mb-10 max-w-2xl mx-auto">
            Accede a toda nuestra biblioteca de proyectos, descarga documentación y conecta con expertos del CDT
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('catalog.index') }}" 
               class="group inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-slate-900 font-bold rounded-xl shadow-lg transform hover:scale-105 transition-all">
                <span>Ver catálogo completo</span>
                <svg class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
            <a href="#contacto" 
               class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 text-white font-bold rounded-xl transform hover:scale-105 transition-all">
                Contactar al equipo
            </a>
        </div>
    </div>
</section>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out;
}
</style>

<script>
    document.addEventListener('alpine:init', () => {
        window.carouselComponent = ({ slides }) => ({
            slides,
            active: 0,
            interval: null,
            get activeSlide() {
                return this.slides[this.active] ?? {};
            },
            next() {
                this.active = (this.active + 1) % Math.max(this.slides.length, 1);
            },
            prev() {
                this.active = (this.active - 1 + Math.max(this.slides.length, 1)) % Math.max(this.slides.length, 1);
            },
            init() {
                if (this.slides.length > 1) {
                    this.interval = setInterval(() => this.next(), 5000);
                }
            },
        });
    });
</script>
@endsection
