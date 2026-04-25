@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-slate-900">Kelola Akun Admin</h2>
            <p class="mt-2 text-slate-600">Halaman ini khusus admin untuk melihat daftar admin aktif dan menambahkan akun admin baru.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn-primary inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold">Tambah admin baru</a>
    </div>

    <div class="grid gap-4 md:grid-cols-2">
        <div class="rounded-3xl border border-blue-200 bg-blue-50 p-5">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-700">Hak akses admin</p>
            <p class="mt-3 text-sm text-blue-900">Melihat semua laporan, memperbarui status laporan, menghapus laporan, dan membuat akun admin baru.</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-5">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">Akun admin bawaan</p>
            <p class="mt-3 text-sm text-slate-700"><strong>Email:</strong> admin@opengov.test</p>
            <p class="mt-1 text-sm text-slate-700"><strong>Password:</strong> password</p>
        </div>
    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Role</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Dibuat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($admins as $admin)
                        <tr>
                            <td class="px-6 py-4 text-sm text-slate-900">{{ $admin->name }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $admin->email }}</td>
                            <td class="px-6 py-4 text-sm"><span class="role-badge admin">Admin</span></td>
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $admin->created_at?->format('d M Y H:i') ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-slate-500">Belum ada akun admin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
