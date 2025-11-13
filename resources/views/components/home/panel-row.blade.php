@props(['title', 'description' => null, 'gradient' => 'from-slate-800 to-slate-900'])
<div class="rounded-3xl border border-white/10 bg-gradient-to-r {{ $gradient }} p-6 shadow-lg shadow-slate-900/30">
    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-white/70">{{ $title }}</p>
            @if($description)
                <p class="text-sm text-white/70">{{ $description }}</p>
            @endif
        </div>
        <div class="flex flex-wrap gap-3 text-white">
            {{ $slot }}
        </div>
    </div>
</div>
