<section class="relative overflow-hidden bg-gradient-to-b from-slate-900 via-sky-950 to-slate-950 text-white">
    <div class="absolute -top-16 -right-40 h-96 w-96 rounded-full bg-sky-400/30 blur-3xl"></div>
    <div class="relative mx-auto max-w-6xl px-4 py-24">
        <div class="grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
            <div>
                <p class="uppercase tracking-[0.4em] text-xs text-sky-200/80">CDT Smart Regions Center</p>
                <h1 class="mt-5 text-4xl font-semibold leading-tight sm:text-5xl">
                    Diseñamos <span class="text-sky-300">proyectos 4.0</span> para territorios inteligentes.
                </h1>
                <p class="mt-6 text-base text-slate-200">
                    La Biblioteca CDT reúne modelos de IA, kits IoT y documentación lista para transferirse a empresas, academia y gobierno. Conecta con experiencias reales desarrolladas en Santander y el oriente colombiano.
                </p>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('catalog.index') }}" class="inline-flex items-center justify-center rounded-full bg-white px-8 py-3 text-sm font-semibold text-slate-900 shadow-lg shadow-sky-500/40">
                        Explorar Biblioteca
                    </a>
                    <a href="#explora" class="inline-flex items-center justify-center rounded-full border border-white/30 px-8 py-3 text-sm font-semibold text-white/90 hover:border-sky-300">
                        Descubrir verticales
                    </a>
                </div>
                <div class="mt-10 grid grid-cols-2 gap-4 text-sm text-slate-200">
                    <div class="rounded-2xl border border-white/20 bg-white/5 p-4">
                        <p class="text-3xl font-semibold text-white">+40</p>
                        <p>Modelos IA/IoT</p>
                    </div>
                    <div class="rounded-2xl border border-white/20 bg-white/5 p-4">
                        <p class="text-3xl font-semibold text-white">12</p>
                        <p>Sectores estratégicos</p>
                    </div>
                </div>
            </div>
            <div x-data="carouselComponent({ slides: @js($carouselSlides) })" x-init="init()" class="rounded-4xl bg-white text-slate-900 shadow-2xl shadow-sky-900/30">
                <div class="border-b border-slate-100 px-6 py-4 flex items-center justify-between text-xs text-slate-500">
                    <span>Casos destacados</span>
                    <div class="flex gap-2">
                        <button type="button" @click="prev" class="rounded-full border border-slate-200 p-2 hover:text-sky-600" aria-label="Anterior">‹</button>
                        <button type="button" @click="next" class="rounded-full border border-slate-200 p-2 hover:text-sky-600" aria-label="Siguiente">›</button>
                    </div>
                </div>
                <div class="p-6" x-show="slides.length" x-transition>
                    <p class="text-xs font-semibold uppercase tracking-[0.4em] text-sky-600" x-text="activeSlide.sector"></p>
                    <h2 class="mt-3 text-2xl font-semibold text-slate-900" x-text="activeSlide.title"></h2>
                    <p class="mt-3 text-sm text-slate-500" x-text="activeSlide.description"></p>
                    <p class="mt-4 inline-flex items-center rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">TRL <span x-text="activeSlide.trl" class="ml-1"></span></p>
                    <a :href="activeSlide.slug ? '{{ url('/catalog') }}/' + activeSlide.slug : '{{ route('catalog.index') }}'" class="mt-4 inline-flex items-center text-sm font-semibold text-sky-600">Ver caso →</a>
                </div>
                <div class="p-6" x-show="!slides.length">
                    <p class="text-sm text-slate-500">Aún no hay modelos registrados para el carrusel.</p>
                </div>
            </div>
        </div>
    </div>
</section>
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
                    this.interval = setInterval(() => this.next(), 6000);
                }
            },
        });
    });
</script>
