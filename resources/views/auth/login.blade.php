@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-md px-4 py-16 text-white">
    <h1 class="text-2xl font-semibold">Inicia sesión</h1>
    <form method="POST" action="{{ url('/login') }}" class="mt-8 space-y-4">
        @csrf
        <div class="space-y-2">
            <label class="text-sm text-slate-300">Correo</label>
            <input type="email" name="email" required autofocus class="w-full rounded-2xl border border-slate-800 bg-slate-950 px-4 py-3">
        </div>
        <div class="space-y-2">
            <label class="text-sm text-slate-300">Contraseña</label>
            <input type="password" name="password" required class="w-full rounded-2xl border border-slate-800 bg-slate-950 px-4 py-3">
        </div>
        @error('email')
            <p class="text-sm text-red-400">{{ $message }}</p>
        @enderror
        <button type="submit" class="w-full rounded-2xl bg-cyan-400/90 px-4 py-3 text-slate-900 font-semibold">Entrar</button>
    </form>
</div>
@endsection
