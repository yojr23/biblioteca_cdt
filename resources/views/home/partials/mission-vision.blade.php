<section class="bg-white" id="impacto">
    <div class="mx-auto max-w-6xl px-4 py-16">
        <div class="grid gap-8 lg:grid-cols-3">
            <article class="rounded-3xl border border-slate-100 bg-sky-50 p-8 shadow-sm">
                <p class="text-xs uppercase tracking-[0.4em] text-sky-600">Misión</p>
                <p class="mt-4 text-sm text-slate-700">{{ $organization['mission'] }}</p>
            </article>
            <article class="rounded-3xl border border-slate-100 bg-sky-50 p-8 shadow-sm">
                <p class="text-xs uppercase tracking-[0.4em] text-sky-600">Visión</p>
                <p class="mt-4 text-sm text-slate-700">{{ $organization['vision'] }}</p>
            </article>
            <article class="rounded-3xl border border-slate-100 bg-white p-8 shadow-sm">
                <p class="text-xs uppercase tracking-[0.4em] text-sky-600">Objetivos estratégicos</p>
                <ul class="mt-4 space-y-3 text-sm text-slate-700">
                    @foreach($organization['objectives'] as $objective)
                        <li class="flex items-start gap-3">
                            <span class="mt-1 h-2 w-2 rounded-full bg-sky-500"></span>
                            <span>{{ $objective }}</span>
                        </li>
                    @endforeach
                </ul>
            </article>
        </div>
    </div>
</section>
