<section class="bg-slate-950" id="explora">
    <div class="mx-auto max-w-6xl px-4 py-16 text-white">
        <div class="max-w-2xl">
            <p class="text-xs uppercase tracking-[0.4em] text-sky-300">Explora por categorías</p>
            <h2 class="mt-3 text-3xl font-semibold">Navega por las rutas de filtrado del catálogo</h2>
        </div>
        <div class="mt-10 space-y-8">
            <x-home.panel-row title="Sector" description="Encuentra casos aplicados en verticales clave" gradient="from-sky-500/20 via-sky-400/10 to-slate-900">
                @foreach($panelFilters['sectors'] as $filter)
                    <a href="{{ route('catalog.index', ['search' => $filter['value']]) }}" class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm font-semibold text-white shadow-inner shadow-sky-900/40 hover:bg-white/10">
                        {{ $filter['label'] }}
                    </a>
                @endforeach
            </x-home.panel-row>

            <x-home.panel-row title="Prospectiva" description="Tecnologías habilitadoras que lideran el roadmap" gradient="from-sky-600/20 via-sky-500/10 to-slate-900">
                @foreach($panelFilters['prospective'] as $filter)
                    <a href="{{ route('catalog.index', ['search' => $filter['value']]) }}" class="flex items-center gap-2 rounded-2xl border border-white/10 bg-white/5 px-5 py-3 text-sm font-semibold text-white">
                        <span>{{ $filter['icon'] }}</span> {{ $filter['label'] }}
                    </a>
                @endforeach
            </x-home.panel-row>

            <x-home.panel-row title="Tipos de IA" description="Explora modelos por capacidad cognitiva" gradient="from-blue-600/20 via-sky-500/10 to-slate-900">
                @foreach($panelFilters['technologyTypes'] as $type)
                    <a href="{{ route('catalog.index', ['technology_types' => [$type->id]]) }}" class="rounded-2xl border border-white/10 bg-white/5 px-4 py-2 text-xs font-semibold text-white/90 uppercase tracking-wide">
                        {{ $type->name }}
                    </a>
                @endforeach
            </x-home.panel-row>

            <x-home.panel-row title="Disponibilidad para demostración" description="Selecciona según la experiencia de despliegue" gradient="from-indigo-600/20 via-indigo-500/10 to-slate-900">
                @foreach($panelFilters['availability'] as $option)
                    <a href="{{ route('catalog.index', ['availability' => [$option->value]]) }}" class="rounded-2xl border border-white/10 bg-white/5 px-4 py-2 text-xs font-semibold text-white/90">
                        {{ str($option->value)->headline() }}
                    </a>
                @endforeach
            </x-home.panel-row>

            <x-home.panel-row title="Tipo de datos" description="Filtra por datasets que alimentan los modelos" gradient="from-sky-700/20 via-blue-600/10 to-slate-900">
                @foreach($panelFilters['datasets'] as $dataset)
                    <a href="{{ route('catalog.index', ['dataset_types' => [$dataset->id]]) }}" class="rounded-2xl border border-white/10 bg-white/5 px-4 py-2 text-xs font-semibold text-white/90">
                        {{ $dataset->name }}
                    </a>
                @endforeach
            </x-home.panel-row>
        </div>
    </div>
</section>
