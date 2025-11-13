@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-5xl px-4 py-12 text-white">
    <a href="{{ route('catalog.index') }}" class="text-sm text-cyan-300">← Volver al catálogo</a>

    <div class="mt-6 rounded-3xl border border-slate-800 bg-slate-900/60 p-8">
        <p class="text-xs uppercase tracking-[0.4em]" style="color: {{ $model->sectorColor->value() }}">{{ $model->sectorName }}</p>
        <h1 class="mt-3 text-3xl font-semibold">{{ $model->title }}</h1>
        <p class="mt-3 text-sm text-slate-400">{{ $model->shortDescription }}</p>
        <div class="mt-6 flex flex-wrap gap-3 text-xs text-slate-300">
            <span class="rounded-full border border-slate-700 px-3 py-1">TRL {{ $model->trlLevel->value() }}</span>
            @foreach($model->technologyTypes as $tech)
                <span class="rounded-full border border-slate-700 px-3 py-1">{{ $tech }}</span>
            @endforeach
        </div>
        <div class="mt-4 flex flex-wrap gap-2 text-xs text-slate-400">
            @foreach($model->availabilityOptions as $option)
                <span class="rounded-full border border-slate-800 px-3 py-1">{{ str($option->value)->headline() }}</span>
            @endforeach
            @foreach($model->datasetTypes as $dataset)
                <span class="rounded-full border border-slate-800 px-3 py-1">{{ $dataset }}</span>
            @endforeach
        </div>
        @if($canViewRestricted)
            <div class="mt-6 prose prose-invert max-w-none">
                {!! nl2br(e($model->longDescriptionPrivate ?? $model->longDescriptionPublic)) !!}
            </div>
        @else
            <div class="mt-6 text-sm text-slate-400">
                {{ $model->longDescriptionPublic }}
                <p class="mt-4 text-xs text-slate-500">Inicia sesión para acceder a la documentación completa.</p>
            </div>
        @endif
        @include('catalog.partials.gamification-panel', ['badges' => $badges])
    </div>

    <section class="mt-10">
        <h2 class="text-lg font-semibold text-white">Recursos</h2>
        <div class="mt-4 grid gap-4">
            @forelse($model->resources as $resource)
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
