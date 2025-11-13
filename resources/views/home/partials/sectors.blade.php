<section class="bg-gradient-to-b from-white to-sky-50" id="sectores">
    <div class="mx-auto max-w-6xl px-4 py-16">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-sky-600">Sectores estratégicos</p>
                <h2 class="mt-2 text-3xl font-semibold text-slate-900">Casos aplicados en la región</h2>
            </div>
            <a href="{{ route('catalog.index') }}" class="text-sm font-semibold text-sky-600">Ver catálogo completo →</a>
        </div>
        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($sectors as $sector)
                <a href="{{ route('catalog.index', ['sector' => $sector->id]) }}" class="rounded-2xl border border-slate-100 bg-white/70 p-5 shadow-sm transition hover:-translate-y-1 hover:border-sky-300/50">
                    <p class="text-sm font-semibold text-slate-900">{{ $sector->name }}</p>
                    <p class="mt-1 text-xs text-slate-500">{{ $sector->models_count ?? 0 }} modelos</p>
                </a>
            @empty
                <p class="text-sm text-slate-500">Aún no hay sectores registrados.</p>
            @endforelse
        </div>
    </div>
</section>
