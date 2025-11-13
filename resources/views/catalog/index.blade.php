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

    <div class="mt-10 grid gap-6 md:grid-cols-2">
        @forelse($models as $card)
            <article class="rounded-3xl border border-slate-800 bg-slate-900/60 p-6">
                <div class="flex items-center justify-between text-xs text-slate-400">
                    <span>{{ $card->sectorName }}</span>
                    <span>TRL {{ $card->trlLevel->value() }}</span>
                </div>
                <h2 class="mt-4 text-xl font-semibold text-white">{{ $card->title }}</h2>
                <p class="mt-2 text-sm text-slate-400">{{ $card->shortDescription }}</p>
                <a href="{{ route('catalog.show', $card->slug) }}" class="mt-4 inline-flex text-sm text-cyan-300">Ver detalle →</a>
            </article>
        @empty
            <p class="text-sm text-slate-400">Aún no hay modelos para mostrar.</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $paginator->withQueryString()->links() }}
    </div>
</div>
@endsection
