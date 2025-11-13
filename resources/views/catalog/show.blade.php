@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-5xl px-4 py-12 text-white">
    <a href="{{ route('catalog.index') }}" class="text-sm text-cyan-300">← Volver al catálogo</a>

    <div class="mt-6 rounded-3xl border border-slate-800 bg-slate-900/60 p-8">
        <p class="text-xs uppercase tracking-[0.4em] text-cyan-300">{{ $model->sector?->name }}</p>
        <h1 class="mt-3 text-3xl font-semibold">{{ $model->title }}</h1>
        <p class="mt-3 text-sm text-slate-400">{{ $model->short_description }}</p>
        <div class="mt-6 flex flex-wrap gap-3 text-xs text-slate-300">
            <span class="rounded-full border border-slate-700 px-3 py-1">TRL {{ $model->trl_level }}</span>
            @foreach($model->technologyTypes as $tech)
                <span class="rounded-full border border-slate-700 px-3 py-1">{{ $tech->name }}</span>
            @endforeach
        </div>
        @if($canViewRestricted)
            <div class="mt-6 prose prose-invert max-w-none">
                {!! nl2br(e($model->long_description_private ?? $model->long_description_public)) !!}
            </div>
        @else
            <div class="mt-6 text-sm text-slate-400">
                {{ $model->long_description_public }}
                <p class="mt-4 text-xs text-slate-500">Inicia sesión para acceder a la documentación completa.</p>
            </div>
        @endif
    </div>

    <section class="mt-10">
        <h2 class="text-lg font-semibold text-white">Recursos</h2>
        <div class="mt-4 grid gap-4">
            @forelse($resourceEmbeds as $resource)
                <div class="rounded-2xl border border-slate-800 bg-slate-900/50 p-4">
                    <p class="text-sm font-semibold">{{ ucfirst($resource->provider) }}</p>
                    <p class="text-xs text-slate-400">{{ $resource->type }}</p>
                    @if($resource->isBlurred)
                        <div class="mt-4 h-32 rounded-xl bg-slate-800/60 blur-sm"></div>
                        <p class="mt-2 text-xs text-slate-400">{{ $resource->ctaLabel }}</p>
                    @else
                        <a href="{{ route('resources.open', ['resource' => $resource->resourceId, 'model' => $model->id]) }}" class="mt-4 inline-flex text-sm text-cyan-300">Abrir recurso →</a>
                    @endif
                </div>
            @empty
                <p class="text-sm text-slate-400">Este modelo aún no tiene recursos asociados.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
