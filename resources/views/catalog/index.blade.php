@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-6xl px-4 py-12 text-white">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-cyan-300">Biblioteca</p>
            <h1 class="text-3xl font-semibold">Modelos disponibles</h1>
            <p class="text-sm text-slate-400">Explora {{ $paginator->total() }} modelos registrados.</p>
        </div>
        <a href="{{ route('home') }}" class="text-sm text-cyan-300">Volver al landing</a>
    </div>

    <div class="mt-10 grid gap-8 lg:grid-cols-[280px_1fr]">
        <aside class="rounded-3xl border border-white/5 bg-slate-900/70 p-5">
            <p class="text-xs uppercase tracking-[0.3em] text-cyan-200">Filtros</p>
            <form method="GET" action="{{ route('catalog.index') }}" class="mt-4 space-y-5 text-sm text-slate-200">
                <div>
                    <label class="text-xs uppercase text-slate-400">Buscar</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Título, sector, TRL" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950 px-4 py-2 text-sm">
                </div>

                <div>
                    <label class="text-xs uppercase text-slate-400">Sector</label>
                    <select name="sector" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950 px-3 py-2">
                        <option value="">Todos</option>
                        @foreach($sectors as $sector)
                            <option value="{{ $sector->id }}" @selected($filters->sectorId === $sector->id)>{{ $sector->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-xs uppercase text-slate-400">Tipo de IA</label>
                    <select name="technology_types[]" multiple class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950 px-3 py-2 text-xs h-28">
                        @foreach($technologyTypes as $type)
                            <option value="{{ $type->id }}" @selected(in_array($type->id, $filters->technologyTypeIds, true))>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-xs uppercase text-slate-400">Tipo de dato</label>
                    <select name="dataset_types[]" multiple class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950 px-3 py-2 text-xs h-28">
                        @foreach($datasetTypes as $datasetType)
                            <option value="{{ $datasetType->id }}" @selected(in_array($datasetType->id, $filters->datasetTypeIds, true))>{{ $datasetType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-xs uppercase text-slate-400">Disponibilidad</label>
                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach($availabilityOptions as $option)
                            <label class="inline-flex items-center gap-1 text-xs">
                                <input type="checkbox" name="availability[]" value="{{ $option->value }}" class="rounded border-white/20 bg-slate-950" @checked(collect($filters->availabilityOptions)->contains(fn($o) => $o->value === $option->value))>
                                {{ str($option->value)->headline() }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-xs uppercase text-slate-400">TRL Min</label>
                        <input type="number" min="1" max="9" name="trl_min" value="{{ $filters->trlMin }}" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950 px-3 py-2">
                    </div>
                    <div>
                        <label class="text-xs uppercase text-slate-400">TRL Max</label>
                        <input type="number" min="1" max="9" name="trl_max" value="{{ $filters->trlMax }}" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950 px-3 py-2">
                    </div>
                </div>

                <div>
                    <label class="text-xs uppercase text-slate-400">Tags</label>
                    <select name="tags[]" multiple class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950 px-3 py-2 text-xs h-24">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" @selected(in_array($tag->id, $filters->tagIds, true))>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-between text-xs text-slate-400">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="highlighted" value="1" class="rounded border-white/20 bg-slate-950" @checked($filters->onlyHighlighted)>
                        Solo destacados
                    </label>
                    <select name="sort_field" class="rounded-2xl border border-white/10 bg-slate-950 px-3 py-2">
                        <option value="published_at" @selected($filters->sortField === 'published_at' || $filters->sortField === null)>Recientes</option>
                        <option value="title" @selected($filters->sortField === 'title')>Título</option>
                        <option value="trl_level" @selected($filters->sortField === 'trl_level')>TRL</option>
                    </select>
                </div>

                <div>
                    <label class="text-xs uppercase text-slate-400">Dirección</label>
                    <select name="sort_direction" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950 px-3 py-2 text-xs">
                        <option value="desc" @selected($filters->sortDirection === 'desc' || $filters->sortDirection === null)>Descendente</option>
                        <option value="asc" @selected($filters->sortDirection === 'asc')>Ascendente</option>
                    </select>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 rounded-2xl bg-cyan-400/90 px-4 py-2 text-sm font-semibold text-slate-900">Aplicar</button>
                    <a href="{{ route('catalog.index') }}" class="rounded-2xl border border-white/15 px-4 py-2 text-sm text-white/80">Limpiar</a>
                </div>
            </form>
        </aside>

        <section>
            <div class="grid gap-6 md:grid-cols-2">
                @forelse($models as $card)
                    <article class="rounded-3xl border border-white/5 bg-slate-900/60 p-6">
                        <div class="flex items-center justify-between text-xs text-slate-400">
                            <span>{{ $card->sectorName }}</span>
                            <span>TRL {{ $card->trlLevel->value() }}</span>
                        </div>
                        <h2 class="mt-4 text-xl font-semibold text-white">{{ $card->title }}</h2>
                        <p class="mt-2 text-sm text-slate-400">{{ $card->shortDescription }}</p>
                        <div class="mt-4 flex flex-wrap gap-2 text-xs">
                            @foreach($card->technologyTypes as $technology)
                                <span class="rounded-full border border-slate-700 px-3 py-1 text-slate-200">{{ $technology }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('catalog.show', $card->slug) }}" class="mt-4 inline-flex text-sm text-cyan-300">Ver detalle →</a>
                    </article>
                @empty
                    <p class="text-sm text-slate-400">Aún no hay modelos para mostrar.</p>
                @endforelse
            </div>

            <div class="mt-10">
                {{ $paginator->withQueryString()->links() }}
            </div>
        </section>
    </div>
</div>
@endsection
