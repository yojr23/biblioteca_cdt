<section class="bg-white" id="onboarding" x-data="onboardingTour()" x-init="init()">
    <div class="mx-auto max-w-6xl px-4 py-12">
        <div class="rounded-3xl border border-slate-100 bg-gradient-to-r from-sky-100 to-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.4em] text-sky-600">Onboarding interactivo</p>
                    <h2 class="mt-2 text-2xl font-semibold text-slate-900">Recorre la biblioteca en 3 pasos</h2>
                    <p class="text-sm text-slate-600">Guarda tu progreso y desbloquea insignias mientras exploras.</p>
                </div>
                <button type="button" @click="start" class="rounded-full bg-sky-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-sky-300/50">
                    Iniciar tour
                </button>
            </div>
            <div class="mt-6 grid gap-4 sm:grid-cols-3">
                <template x-for="(step, index) in steps" :key="step.title">
                    <div class="rounded-2xl border border-sky-100 bg-white p-4" :class="{ 'ring-2 ring-sky-500': index === current }">
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-sky-500" x-text="'Paso ' + (index + 1)"></p>
                        <h3 class="mt-2 text-sm font-semibold text-slate-900" x-text="step.title"></h3>
                        <p class="mt-1 text-xs text-slate-500" x-text="step.description"></p>
                        <a :href="step.link" class="mt-2 inline-flex text-xs font-semibold text-sky-600">Ir →</a>
                    </div>
                </template>
            </div>
            <div class="mt-4 flex items-center justify-between text-xs text-slate-500">
                <div>
                    <span x-text="current + 1"></span>/<span x-text="steps.length"></span> completados
                </div>
                <button type="button" @click="complete" class="text-sky-600 font-semibold" x-show="!completed">Marcar como completado</button>
                <p class="text-sky-500 font-semibold" x-show="completed">¡Tour completado! 🎉</p>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('alpine:init', () => {
        window.onboardingTour = () => ({
            steps: [
                { title: 'Descubre los sectores', description: 'Selecciona un vertical e identifica casos similares.', link: '#sectores' },
                { title: 'Filtra con precisión', description: 'Usa la vista catálogo y aplica filtros combinados.', link: '{{ route('catalog.index') }}' },
                { title: 'Accede a recursos', description: 'Abre los demos y documentación disponible.', link: '#destacados' },
            ],
            current: 0,
            completed: false,
            init() {
                this.completed = localStorage.getItem('cdt-onboarding-complete') === 'true';
            },
            start() {
                this.current = 0;
                this.completed = false;
                this.navigate();
            },
            navigate() {
                const link = this.steps[this.current].link;
                if (link.startsWith('#')) {
                    const target = document.querySelector(link);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                } else {
                    window.location.href = link;
                }
            },
            complete() {
                this.completed = true;
                localStorage.setItem('cdt-onboarding-complete', 'true');
            },
        });
    });
</script>
