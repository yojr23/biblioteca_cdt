<section class="bg-slate-950">
    <div class="mx-auto max-w-6xl px-4 pb-20">
        <div class="rounded-3xl border border-white/5 bg-slate-900/70 p-6">
            <p class="text-xs uppercase tracking-[0.3em] text-cyan-200">Más explorados</p>
            <div class="mt-6 grid gap-6 md:grid-cols-2">
                @forelse($mostViewed as $card)
                    <article class="rounded-2xl border border-white/5 bg-slate-900/40 p-5">
                        <p class="text-xs text-slate-400">{{ $card->sectorName }} · TRL {{ $card->trlLevel->value() }}</p>
                        <h3 class="mt-2 text-lg font-semibold text-white">{{ $card->title }}</h3>
                        <p class="mt-2 text-sm text-slate-400">{{ \Illuminate\Support\Str::limit($card->shortDescription, 150) }}</p>
                        <a href="{{ route('catalog.show', $card->slug) }}" class="mt-4 inline-flex text-sm text-cyan-300">Ver caso →</a>
                    </article>
                @empty
                    <p class="text-sm text-slate-400">Aún no hay métricas registradas.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
