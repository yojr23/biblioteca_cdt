<section class="bg-white" id="destacados">
    <div class="mx-auto max-w-6xl px-4 py-16">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-sky-600">Modelos destacados</p>
                <h2 class="mt-2 text-3xl font-semibold text-slate-900">Casos listos para transferirse</h2>
            </div>
            <a href="{{ route('catalog.index', ['highlighted' => true]) }}" class="text-sm font-semibold text-sky-600">Ver todos →</a>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-2">
            @forelse($highlights as $card)
                <article class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between text-xs text-slate-500">
                        <span>{{ $card->sectorName }}</span>
                        <span>TRL {{ $card->trlLevel->value() }}</span>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-slate-900">{{ $card->title }}</h3>
                    <p class="mt-2 text-sm text-slate-500">{{ $card->shortDescription }}</p>
                    <div class="mt-4 flex flex-wrap gap-2 text-xs">
                        @foreach($card->technologyTypes as $technology)
                            <span class="rounded-full border border-slate-200 px-3 py-1 text-slate-600">{{ $technology }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('catalog.show', $card->slug) }}" class="mt-6 inline-flex items-center text-sm font-semibold text-sky-600">Ver detalle →</a>
                </article>
            @empty
                <p class="text-sm text-slate-500">Aún no hay modelos destacados.</p>
            @endforelse
        </div>
    </div>
</section>
