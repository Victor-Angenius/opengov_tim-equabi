@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="card p-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-slate-900">Tambah Akun Admin</h2>
                <p class="mt-2 text-slate-600">Gunakan form ini untuk membuat admin baru yang bisa mengelola seluruh laporan.</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Kembali ke daftar admin</a>
        </div>

        <div class="mt-6 rounded-3xl border border-blue-200 bg-blue-50 p-5 text-sm text-blue-900">
            Admin baru akan memiliki akses untuk melihat semua laporan, memperbarui status, dan menambahkan admin lain.
        </div>

        <form method="POST" action="{{ route('admin.users.store') }}" class="mt-8 space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Nama admin</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email admin</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                <input id="password" type="password" name="password" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Konfirmasi password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>
            <button type="submit" class="btn-primary w-full rounded-xl px-4 py-3 text-sm font-semibold">Simpan akun admin</button>
        </form>
    </div>
</div>
@endsection
