<section class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0 bg-[url('https://smartregionscenter.com.co/wp-content/uploads/2023/08/hero.jpg')] bg-cover bg-center opacity-15"></div>
    <div class="relative mx-auto max-w-6xl px-4 py-20">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] items-center">
            <div>
                <p class="uppercase tracking-[0.3em] text-xs text-cyan-200/80">CDT Smart Regions Center</p>
                <h1 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                    Impulsamos territorios inteligentes con <span class="text-cyan-300">Tecnologías 4.0</span>
                </h1>
                <p class="mt-6 text-slate-200">
                    Biblioteca viva con modelos de IA, kits IoT y recursos técnicos listos para transferirse a empresas, instituciones y ciudades del oriente colombiano.
                </p>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('catalog.index') }}" class="inline-flex items-center justify-center rounded-full bg-cyan-400 px-8 py-3 text-slate-900 font-semibold shadow-lg shadow-cyan-500/40">
                        Explorar Biblioteca
                    </a>
                    <a href="#impacto" class="inline-flex items-center justify-center rounded-full border border-white/20 px-8 py-3 font-semibold text-white/90 hover:border-cyan-300/60">
                        Impacto CDT
                    </a>
                </div>
            </div>
            <div x-data="{
                slides: @js($carouselSlides),
                active: 0,
                next() { this.active = (this.active + 1) % Math.max(this.slides.length, 1); },
                prev() { this.active = (this.active - 1 + Math.max(this.slides.length, 1)) % Math.max(this.slides.length, 1); }
            }" x-init="if (slides.length > 1) setInterval(() => next(), 6000)" class="rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-2xl shadow-slate-900/50">
                <div class="flex items-center justify-between text-xs text-slate-400">
                    <span>Proyectos destacados</span>
                    <div class="flex gap-2">
                        <button type="button" @click="prev" class="rounded-full border border-white/20 p-2 hover:text-cyan-300" aria-label="slide anterior">‹</button>
                        <button type="button" @click="next" class="rounded-full border border-white/20 p-2 hover:text-cyan-300" aria-label="slide siguiente">›</button>
                    </div>
                </div>
                <template x-if="slides.length">
                    <div class="mt-6" x-transition>
                        <p class="text-xs uppercase tracking-[0.3em] text-cyan-300" x-text="slides[active].sector"></p>
                        <h2 class="mt-3 text-2xl font-semibold" x-text="slides[active].title"></h2>
                        <p class="mt-3 text-sm text-slate-300" x-text="slides[active].description"></p>
                        <p class="mt-4 inline-flex items-center rounded-full border border-white/10 px-3 py-1 text-xs text-slate-200">TRL <span x-text="slides[active].trl" class="ml-1 font-semibold"></span></p>
                        <a :href="slides[active].slug ? '{{ url('/catalog') }}/' + slides[active].slug : '{{ route('catalog.index') }}'"
                           class="mt-4 inline-flex items-center text-sm font-semibold text-cyan-300">Ver caso →</a>
                    </div>
                </template>
                <template x-if="!slides.length">
                    <p class="mt-6 text-sm text-slate-400">Aún no hay modelos registrados para el carrusel.</p>
                </template>
            </div>
        </div>
    </div>
</section>
