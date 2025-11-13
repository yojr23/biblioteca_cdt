@if(!empty($badges))
    <div class="mt-6 rounded-2xl border border-slate-800 bg-slate-900/70 p-4 text-white">
        <p class="text-xs uppercase tracking-[0.3em] text-cyan-300">Tus insignias</p>
        <div class="mt-3 flex flex-wrap gap-2 text-sm">
            @foreach($badges as $badge)
                <span class="rounded-full border border-cyan-400/40 bg-cyan-400/10 px-3 py-1 text-cyan-200">{{ $badge }}</span>
            @endforeach
        </div>
    </div>
@else
    <div class="mt-6 rounded-2xl border border-slate-800 bg-slate-900/40 p-4 text-xs text-slate-400">
        Explora más sectores para desbloquear insignias personalizadas.
    </div>
@endif
