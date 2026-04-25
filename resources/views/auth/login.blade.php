@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <div class="card p-8">
        <h2 class="text-2xl font-semibold text-slate-900">Masuk ke Opengov</h2>
        <p class="mt-2 text-slate-600">Gunakan akun Anda untuk mengakses dashboard pelaporan dan status layanan.</p>

        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Kata sandi</label>
                <input id="password" type="password" name="password" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div class="flex items-center justify-between">
                <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500" />
                    Remember me
                </label>
            </div>
            <button type="submit" class="btn-primary w-full rounded-xl px-4 py-3 text-sm font-semibold">Masuk</button>
        </form>
    </div>
</div>
@endsection
