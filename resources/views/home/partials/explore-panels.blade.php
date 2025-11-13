<section class="relative py-16" id="explora">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden opacity-40">
        <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 2px 2px, #06b6d4 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="relative mx-auto max-w-7xl px-4">
        <div class="max-w-2xl mx-auto text-center mb-12 animate-fade-in-up">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-cyan-50 to-blue-50 border border-cyan-200 rounded-full mb-4">
                <svg class="h-4 w-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                <span class="text-xs font-semibold uppercase tracking-wider text-cyan-700">Navegación por categorías</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-slate-900">
                Explora las rutas del <span class="bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">catálogo</span>
            </h2>
        </div>
        
        <div class="space-y-6">
            <!-- Sector Panel -->
            <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-cyan-50 to-blue-50 border border-cyan-200/50 p-8 shadow-lg hover:shadow-2xl transition-all duration-500 animate-fade-in-up">
                <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-gradient-to-br from-cyan-400/20 to-blue-400/20 blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-slate-900">Sector</h3>
                                    <p class="text-sm text-slate-600">Casos aplicados en verticales clave</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('catalog.index') }}" class="text-cyan-600 hover:text-cyan-700 text-sm font-semibold flex items-center gap-1 group/link">
                            Ver todos
                            <svg class="h-4 w-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <div class="flex flex-wrap gap-3">
                        @foreach($panelFilters['sectors'] as $filter)
                            <a href="{{ route('catalog.index', ['search' => $filter['value']]) }}" 
                               class="group/item relative overflow-hidden px-6 py-3 bg-white hover:bg-gradient-to-r hover:from-cyan-500 hover:to-blue-600 border border-cyan-200 hover:border-transparent text-slate-700 hover:text-white font-semibold text-sm rounded-xl shadow-sm hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                <span class="relative z-10">{{ $filter['label'] }}</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-cyan-400/0 to-blue-400/0 group-hover/item:from-cyan-400/20 group-hover/item:to-blue-400/20 transition-all"></div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Prospective Panel -->
            <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-200/50 p-8 shadow-lg hover:shadow-2xl transition-all duration-500 animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="absolute -left-20 -bottom-20 h-64 w-64 rounded-full bg-gradient-to-br from-purple-400/20 to-pink-400/20 blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-slate-900">Prospectiva</h3>
                                    <p class="text-sm text-slate-600">Tecnologías habilitadoras del roadmap</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-3">
                        @foreach($panelFilters['prospective'] as $filter)
                            <a href="{{ route('catalog.index', ['search' => $filter['value']]) }}" 
                               class="group/item inline-flex items-center gap-2 px-6 py-3 bg-white hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-600 border border-purple-200 hover:border-transparent text-slate-700 hover:text-white font-semibold text-sm rounded-xl shadow-sm hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                <span class="text-lg">{{ $filter['icon'] }}</span>
                                <span>{{ $filter['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Technology Types Panel -->
            <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-50 to-cyan-50 border border-blue-200/50 p-8 shadow-lg hover:shadow-2xl transition-all duration-500 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="absolute -right-20 -bottom-20 h-64 w-64 rounded-full bg-gradient-to-br from-blue-400/20 to-cyan-400/20 blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-600 flex items-center justify-center shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-slate-900">Tipos de IA</h3>
                                    <p class="text-sm text-slate-600">Modelos por capacidad cognitiva</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-3">
                        @foreach($panelFilters['technologyTypes'] as $type)
                            <a href="{{ route('catalog.index', ['technology_types' => [$type->id]]) }}" 
                               class="group/item px-5 py-2.5 bg-white hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-600 border border-blue-200 hover:border-transparent text-slate-700 hover:text-white font-bold text-xs uppercase tracking-wider rounded-lg shadow-sm hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                {{ $type->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Two Column Grid for Remaining Panels -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Availability Panel -->
                <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-200/50 p-6 shadow-lg hover:shadow-2xl transition-all duration-500 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="absolute -right-12 -top-12 h-48 w-48 rounded-full bg-gradient-to-br from-emerald-400/20 to-teal-400/20 blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
                    
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-lg">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-900">Disponibilidad</h3>
                                <p class="text-xs text-slate-600">Experiencia de despliegue</p>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            @foreach($panelFilters['availability'] as $option)
                                <a href="{{ route('catalog.index', ['availability' => [$option->value]]) }}" 
                                   class="px-4 py-2 bg-white hover:bg-gradient-to-r hover:from-emerald-500 hover:to-teal-600 border border-emerald-200 hover:border-transparent text-slate-700 hover:text-white font-semibold text-xs rounded-lg shadow-sm hover:shadow-md transform hover:scale-105 transition-all duration-300">
                                    {{ str($option->value)->headline() }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Dataset Types Panel -->
                <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-orange-50 to-amber-50 border border-orange-200/50 p-6 shadow-lg hover:shadow-2xl transition-all duration-500 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <div class="absolute -left-12 -bottom-12 h-48 w-48 rounded-full bg-gradient-to-br from-orange-400/20 to-amber-400/20 blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
                    
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center shadow-lg">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-900">Tipo de datos</h3>
                                <p class="text-xs text-slate-600">Datasets de los modelos</p>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            @foreach($panelFilters['datasets'] as $dataset)
                                <a href="{{ route('catalog.index', ['dataset_types' => [$dataset->id]]) }}" 
                                   class="px-4 py-2 bg-white hover:bg-gradient-to-r hover:from-orange-500 hover:to-amber-600 border border-orange-200 hover:border-transparent text-slate-700 hover:text-white font-semibold text-xs rounded-lg shadow-sm hover:shadow-md transform hover:scale-105 transition-all duration-300">
                                    {{ $dataset->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
