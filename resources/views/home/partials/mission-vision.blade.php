<section class="bg-slate-950" id="impacto">
    <div class="mx-auto max-w-6xl px-4 py-16">
        <div class="grid gap-8 md:grid-cols-2">
            <article class="rounded-3xl border border-white/10 bg-slate-900/60 p-6">
                <p class="text-xs uppercase tracking-[0.3em] text-cyan-200">Misión</p>
                <p class="mt-4 text-sm text-slate-200">{{ $organization['mission'] }}</p>
            </article>
            <article class="rounded-3xl border border-white/10 bg-slate-900/60 p-6">
                <p class="text-xs uppercase tracking-[0.3em] text-cyan-200">Visión</p>
                <p class="mt-4 text-sm text-slate-200">{{ $organization['vision'] }}</p>
            </article>
        </div>
        <div class="mt-8 rounded-3xl border border-white/10 bg-slate-900/60 p-6">
            <p class="text-xs uppercase tracking-[0.3em] text-cyan-200">Objetivos estratégicos</p>
            <div class="mt-4 grid gap-4 md:grid-cols-2">
                @foreach($organization['objectives'] as $objective)
                    <div class="flex items-start gap-3">
                        <span class="mt-1 h-2 w-2 rounded-full bg-cyan-300"></span>
                        <p class="text-sm text-slate-200">{{ $objective }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
