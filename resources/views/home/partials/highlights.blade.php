<section class="relative py-20 bg-white" id="destacados">
    <div class="mx-auto max-w-7xl px-4">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-12 animate-fade-in-up">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-full mb-3">
                    <svg class="h-4 w-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span class="text-xs font-semibold uppercase tracking-wider text-purple-700">Modelos destacados</span>
                </div>
                <h2 class="text-4xl font-bold text-slate-900">
                    Casos listos para <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">transferirse</span>
                </h2>
            </div>
            <a href="{{ route('catalog.index', ['highlighted' => true]) }}" 
               class="group inline-flex items-center gap-2 text-purple-600 hover:text-purple-700 font-semibold">
                Ver todos los destacados
                <svg class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid gap-8 md:grid-cols-2">
            @forelse($highlights as $index => $card)
                <article class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-white to-slate-50 border border-slate-200 p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500 animate-fade-in-up"
                         style="animation-delay: {{ $index * 0.1 }}s;">
                    
                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/0 via-pink-500/0 to-cyan-500/0 group-hover:from-purple-500/5 group-hover:via-pink-500/5 group-hover:to-cyan-500/5 transition-all duration-500"></div>
                    
                    <!-- Decorative blob -->
                    <div class="absolute -right-12 -top-12 h-32 w-32 rounded-full bg-gradient-to-br from-purple-400/20 to-pink-400/20 blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
                    
                    <!-- Header -->
                    <div class="relative flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="px-3 py-1 bg-gradient-to-r from-purple-100 to-pink-100 rounded-full">
                                <span class="text-xs font-bold text-purple-700">{{ $card->sectorName }}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 px-3 py-1 bg-cyan-50 rounded-full border border-cyan-200">
                            <svg class="h-4 w-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-xs font-bold text-cyan-700">TRL {{ $card->trlLevel->value() }}</span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="relative">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-purple-600 transition-colors">
                            {{ $card->title }}
                        </h3>
                        <p class="text-slate-600 leading-relaxed mb-6">
                            {{ $card->shortDescription }}
                        </p>
                        
                        <!-- Technology Tags -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach($card->technologyTypes as $technology)
                                <span class="px-3 py-1 bg-slate-100 group-hover:bg-purple-50 border border-slate-200 group-hover:border-purple-200 text-slate-700 group-hover:text-purple-700 text-xs font-semibold rounded-lg transition-colors">
                                    {{ $technology }}
                                </span>
                            @endforeach
                        </div>
                        
                        <!-- CTA -->
                        <a href="{{ route('catalog.show', $card->slug) }}" 
                           class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white font-semibold rounded-xl shadow-lg shadow-purple-500/30 transform hover:scale-105 transition-all">
                            <span>Ver detalle completo</span>
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Featured Badge -->
                    <div class="absolute top-4 right-4">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center shadow-lg animate-pulse">
                            <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-16">
                    <div class="inline-flex items-center justify-center h-20 w-20 rounded-full bg-gradient-to-br from-purple-100 to-pink-100 mb-4">
                        <svg class="h-10 w-10 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Próximamente modelos destacados</h3>
                    <p class="text-slate-500">Estamos preparando los mejores casos para ti.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
