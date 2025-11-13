<section class="bg-slate-950" id="destacados">
    <div class="mx-auto max-w-6xl px-4 py-16">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-cyan-200">Modelos destacados</p>
                <h2 class="mt-2 text-2xl font-semibold">Casos listos para transferirse</h2>
            </div>
            <a href="{{ route('catalog.index', ['highlighted' => true]) }}" class="text-sm text-cyan-300">Ver todos →</a>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-2">
            @forelse($highlights as $card)
                <article class="rounded-3xl border border-white/5 bg-slate-900/60 p-6">
                    <div class="flex items-center justify-between text-xs text-slate-400">
                        <span>{{ $card->sectorName }}</span>
                        <span>TRL {{ $card->trlLevel->value() }}</span>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-white">{{ $card->title }}</h3>
                    <p class="mt-2 text-sm text-slate-400">{{ $card->shortDescription }}</p>
                    <div class="mt-4 flex flex-wrap gap-2 text-xs">
                        @foreach($card->technologyTypes as $technology)
                            <span class="rounded-full border border-slate-700 px-3 py-1 text-slate-200">{{ $technology }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('catalog.show', $card->slug) }}" class="mt-6 inline-flex items-center text-sm font-semibold text-cyan-300">Ver detalle →</a>
                </article>
            @empty
                <p class="text-sm text-slate-400">Aún no hay modelos destacados.</p>
            @endforelse
        </div>
    </div>
</section>
