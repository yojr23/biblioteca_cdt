@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white">
    <div class="mx-auto max-w-6xl px-4 py-16">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr] items-center">
            <div>
                <p class="uppercase tracking-[0.3em] text-xs text-cyan-300">Biblioteca Digital CDT</p>
                <h1 class="mt-4 text-4xl font-semibold leading-tight sm:text-5xl">
                    Modelos de IA + Kits IoT <span class="text-cyan-300">listos para activar</span> en tu territorio.
                </h1>
                <p class="mt-6 text-slate-300">
                    Explora proyectos con documentación técnica, demos y métricas de adopción. Filtra por sector, tipo de IA, datos o nivel TRL.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('catalog.index') }}" class="inline-flex items-center justify-center rounded-full bg-cyan-400 px-6 py-3 text-slate-900 font-semibold shadow-lg shadow-cyan-500/30">Ver catálogo</a>
                    <a href="#como-usar" class="inline-flex items-center justify-center rounded-full border border-slate-600 px-6 py-3 font-semibold text-slate-100">Cómo funciona</a>
                </div>
            </div>
            <div class="rounded-3xl border border-slate-800 bg-slate-900/60 p-6">
                <p class="text-sm text-slate-400">Búsqueda rápida</p>
                <form action="{{ route('catalog.index') }}" method="GET" class="mt-4 space-y-3">
                    <input type="text" name="search" placeholder="Buscar modelos, sectores, TRL..." class="w-full rounded-2xl border border-slate-800 bg-slate-950/80 px-4 py-3 text-sm focus:border-cyan-300 focus:outline-none">
                    <button type="submit" class="w-full rounded-2xl bg-cyan-400/90 px-4 py-3 text-slate-900 font-semibold">Buscar</button>
                </form>
                <div class="mt-6 text-xs text-slate-500">Filtra por sector, tipo IA, disponibilidad o TRL directamente en el catálogo.</div>
            </div>
        </div>
    </div>
</section>

<section class="border-t border-b border-slate-800/60 bg-slate-950" id="sectores">
    <div class="mx-auto max-w-6xl px-4 py-12">
        <h2 class="text-lg font-semibold text-white">Sectores activos</h2>
        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @forelse($sectors as $sector)
                <a href="{{ route('catalog.index', ['sector' => $sector->id]) }}" class="rounded-2xl border border-slate-800 bg-slate-900/60 p-4 transition hover:-translate-y-1 hover:border-cyan-300/50">
                    <p class="text-sm font-semibold" style="color: {{ $sector->color_code }}">{{ $sector->name }}</p>
                    <p class="text-xs text-slate-400">Explorar proyectos</p>
                </a>
            @empty
                <p class="text-sm text-slate-400">Aún no hay sectores registrados.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="bg-slate-950" id="destacados">
    <div class="mx-auto max-w-6xl px-4 py-14">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-white">Modelos destacados</h2>
            <a href="{{ route('catalog.index', ['highlighted' => true]) }}" class="text-sm text-cyan-300">Ver todos</a>
        </div>
        <div class="mt-8 grid gap-6 md:grid-cols-2">
            @forelse($highlights as $card)
                <article class="rounded-3xl border border-slate-800 bg-slate-900/60 p-6">
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
@endsection
