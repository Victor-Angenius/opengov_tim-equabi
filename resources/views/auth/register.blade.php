@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <div class="card p-8">
        <h2 class="text-2xl font-semibold text-slate-900">Buat akun Opengov</h2>
        <p class="mt-2 text-slate-600">Daftar untuk mengirim aspirasi dan memantau respons layanan publik.</p>

        <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Nama lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Kata sandi</label>
                <input id="password" type="password" name="password" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Konfirmasi kata sandi</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <button type="submit" class="btn-primary w-full rounded-xl px-4 py-3 text-sm font-semibold">Daftar</button>
        </form>
    </div>
</div>
@endsection
