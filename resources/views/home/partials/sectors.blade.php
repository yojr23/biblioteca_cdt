<section class="relative py-20 bg-gradient-to-b from-white to-slate-50" id="sectores">
    <div class="mx-auto max-w-7xl px-4">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12 animate-fade-in-up">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-50 border border-cyan-200 rounded-full mb-3">
                    <svg class="h-4 w-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wider text-cyan-700">Sectores estratégicos</span>
                </div>
                <h2 class="text-4xl font-bold text-slate-900">
                    Casos aplicados en <span class="bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">la región</span>
                </h2>
            </div>
            <a href="{{ route('catalog.index') }}" 
               class="group inline-flex items-center gap-2 text-cyan-600 hover:text-cyan-700 font-semibold">
                Ver catálogo completo
                <svg class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($sectors as $index => $sector)
                <a href="{{ route('catalog.index', ['sector' => $sector->id]) }}" 
                   class="group relative overflow-hidden rounded-2xl bg-white border border-slate-200 p-6 shadow-sm hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300 animate-fade-in-up"
                   style="animation-delay: {{ $index * 0.05 }}s;">
                    
                    <!-- Gradient overlay on hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/0 to-blue-600/0 group-hover:from-cyan-500/10 group-hover:to-blue-600/10 transition-all duration-300"></div>
                    
                    <!-- Icon -->
                    <div class="relative mb-4">
                        <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-cyan-100 to-blue-100 group-hover:from-cyan-500 group-hover:to-blue-600 flex items-center justify-center transform group-hover:scale-110 transition-all duration-300">
                            <svg class="h-6 w-6 text-cyan-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="relative">
                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-cyan-600 transition-colors mb-2">
                            {{ $sector->name }}
                        </h3>
                        <div class="flex items-center gap-2 text-sm">
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-slate-100 group-hover:bg-cyan-50 text-slate-600 group-hover:text-cyan-700 font-semibold transition-colors">
                                {{ $sector->models_count ?? 0 }} modelos
                            </span>
                        </div>
                    </div>
                    
                    <!-- Arrow indicator -->
                    <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300">
                        <svg class="h-6 w-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-slate-100 mb-4">
                        <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <p class="text-slate-500 font-medium">Aún no hay sectores registrados.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
