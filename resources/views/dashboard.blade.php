@extends('layouts.app')

@section('content')
<div class="grid gap-6 xl:grid-cols-[1.5fr_1fr]">
    <section class="card p-6 md:p-8">
        <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
            <div>
                <span class="eyebrow">Dashboard</span>
                <h2 class="mt-4 text-2xl font-semibold tracking-tight text-slate-950">Ringkasan layanan</h2>
                <p class="mt-2 text-slate-600">Tampilan singkat untuk melihat laporan, status, dan aktivitas terbaru.</p>
                <div class="mt-4 flex flex-wrap items-center gap-3">
                    <span class="role-badge {{ auth()->user()->isAdmin() ? 'admin' : 'user' }}">{{ $roleLabel }}</span>
                    <p class="text-sm text-slate-700">{{ $roleDescription }}</p>
                </div>
            </div>
            <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-700">
                <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                Impact Score: <strong>{{ $impactScore }}%</strong>
            </div>
        </div>

        <div class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Total laporan</p>
                <p class="mt-3 text-3xl font-semibold text-slate-900">{{ $totalReports }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Selesai</p>
                <p class="mt-3 text-3xl font-semibold text-emerald-600">{{ $resolvedNumber }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Dalam proses</p>
                <p class="mt-3 text-3xl font-semibold text-blue-700">{{ $inProgressNumber }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Menunggu</p>
                <p class="mt-3 text-3xl font-semibold text-orange-600">{{ $pendingNumber }}</p>
            </div>
        </div>

        <div class="mt-8 grid gap-4 md:grid-cols-2">
            <div class="rounded-2xl border {{ auth()->user()->isAdmin() ? 'border-blue-200 bg-blue-50' : 'border-green-200 bg-green-50' }} p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] {{ auth()->user()->isAdmin() ? 'text-blue-700' : 'text-green-700' }}">Perbedaan role</p>
                <p class="mt-3 text-sm {{ auth()->user()->isAdmin() ? 'text-blue-900' : 'text-green-900' }}">
                    @if (auth()->user()->isAdmin())
                        Anda sedang melihat seluruh laporan dari semua pengguna. Anda juga bisa membuka detail laporan untuk mengubah statusnya.
                    @else
                        Anda sedang melihat ringkasan laporan milik akun Anda sendiri. Status laporan diperbarui oleh admin.
                    @endif
                </p>
            </div>
            @can('manage-admins')
                <div class="rounded-2xl border border-slate-200 bg-white p-5">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Manajemen admin</p>
                    <p class="mt-3 text-sm text-slate-700">Perlu menambahkan petugas atau operator baru? Buat akun admin tambahan dari menu kelola admin.</p>
                    <a href="{{ route('admin.users.create') }}" class="btn-primary mt-4 inline-flex items-center px-4 py-2 text-sm font-semibold text-white">Buat admin baru</a>
                </div>
            @endcan
        </div>

        <div class="mt-8 grid gap-4 lg:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Edukasi</p>
                <h3 class="mt-3 text-lg font-semibold text-slate-900">Pelajari cara membuat aduan yang efektif</h3>
                <p class="mt-3 text-sm text-slate-700">Pusat edukasi membantu warga memahami hak, etika digital, dan langkah menyusun laporan yang lebih jelas.</p>
                <a href="{{ route('education') }}" class="mt-4 inline-flex items-center text-sm font-semibold text-slate-900">Buka Pusat Edukasi</a>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Panduan layanan</p>
                <h3 class="mt-3 text-lg font-semibold text-slate-900">Temukan alur layanan dan checklist dengan cepat</h3>
                <p class="mt-3 text-sm text-slate-700">Panduan layanan membantu warga memilih kanal yang tepat sebelum datang atau mengajukan permohonan.</p>
                <a href="{{ route('service-guide') }}" class="mt-4 inline-flex items-center text-sm font-semibold text-slate-900">Lihat Panduan Layanan</a>
            </div>
        </div>

        <div class="mt-8 space-y-6">
            <div class="rounded-2xl border border-slate-200 bg-white p-6">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Waktu respon rata-rata</h3>
                        <p class="mt-1 text-sm text-slate-600">Estimasi efisiensi proses layanan berdasarkan laporan terselesaikan.</p>
                    </div>
                    <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-700">{{ $averageResponse }} menit</span>
                </div>
                <div class="mt-6 h-4 overflow-hidden rounded-full bg-slate-100">
                    <div class="h-full rounded-full bg-slate-900" style="width: {{ min($averageResponse, 100) }}%"></div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6">
                <h3 class="text-lg font-semibold text-slate-900">Laporan terbaru</h3>
                <div class="mt-4 space-y-4">
                    @forelse($recentReports as $report)
                        <article class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h4 class="font-semibold text-slate-900">{{ $report->title }}</h4>
                                    <p class="text-sm text-slate-600">{{ Str::limit($report->description, 100) }}</p>
                                </div>
                                <span class="status-tag {{ $report->status }}">{{ str_replace('_', ' ', ucfirst($report->status)) }}</span>
                            </div>
                            <div class="mt-3 text-xs text-slate-500">
                                {{ $report->category }} / {{ $report->created_at->format('d M Y') }}
                            </div>
                        </article>
                    @empty
                        <p class="text-slate-600">Belum ada laporan baru.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <aside class="space-y-4">
        <div class="card p-6">
            <h3 class="text-lg font-semibold text-slate-900">Tentang platform</h3>
            <p class="mt-3 text-slate-600">OpenGov membantu warga menyampaikan aspirasi, memantau status, dan memahami layanan dalam tampilan yang lebih ringkas.</p>
            <ul class="mt-5 space-y-3 text-sm text-slate-700">
                <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-blue-600"></span>Pelaporan real-time dengan status terukur.</li>
                <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-green-600"></span>Peningkatan efisiensi waktu pelayanan.</li>
                <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-slate-400"></span>Fitur aksesibilitas untuk dukungan visual dan pembacaan halaman.</li>
            </ul>
        </div>

        <div class="card p-6">
            <h3 class="text-lg font-semibold text-slate-900">Dampak singkat</h3>
            <p class="mt-3 text-slate-600">Ringkasan ini memperlihatkan partisipasi warga dan tingkat penyelesaian layanan secara cepat.</p>
            <div class="mt-6 grid gap-3">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Estimasi partisipasi aktif</p>
                    <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $totalReports }} pengguna</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Persentase penyelesaian</p>
                    <p class="mt-2 text-2xl font-semibold text-emerald-600">{{ $impactScore }}%</p>
                </div>
            </div>
        </div>
    </aside>
</div>
@endsection
