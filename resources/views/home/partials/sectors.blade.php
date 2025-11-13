<section class="border-y border-white/5 bg-slate-950" id="sectores">
    <div class="mx-auto max-w-6xl px-4 py-14">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-cyan-200">Sectores estratégicos</p>
                <h2 class="mt-2 text-2xl font-semibold">Casos aplicados en la región</h2>
            </div>
            <a href="{{ route('catalog.index') }}" class="text-sm text-cyan-300">Ver catálogo completo →</a>
        </div>
        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($sectors as $sector)
                <a href="{{ route('catalog.index', ['sector' => $sector->id]) }}" class="rounded-2xl border border-white/5 bg-slate-900/60 p-5 transition hover:-translate-y-1 hover:border-cyan-300/50">
                    <p class="text-sm font-semibold" style="color: {{ $sector->color_code }}">{{ $sector->name }}</p>
                    <p class="mt-1 text-xs text-slate-400">{{ $sector->models_count ?? 0 }} modelos</p>
                </a>
            @empty
                <p class="text-sm text-slate-400">Aún no hay sectores registrados.</p>
            @endforelse
        </div>
    </div>
</section>
