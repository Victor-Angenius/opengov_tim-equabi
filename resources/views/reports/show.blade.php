@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="card p-6 md:p-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <span class="eyebrow">Detail</span>
                <h2 class="mt-4 text-2xl font-semibold tracking-tight text-slate-950">Detail laporan</h2>
                <p class="mt-2 text-slate-600">Informasi inti laporan ditampilkan lebih fokus agar mudah dibaca.</p>
            </div>
            <a href="{{ route('reports.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Kembali</a>
        </div>

        <div class="mt-8 grid gap-6 lg:grid-cols-[1fr_280px]">
            <div class="space-y-6">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div class="flex items-center justify-between gap-4">
                        <h3 class="text-xl font-semibold text-slate-900">{{ $report->title }}</h3>
                        <span class="status-tag {{ $report->status }}">{{ str_replace('_', ' ', ucfirst($report->status)) }}</span>
                    </div>
                    <p class="mt-4 text-slate-600">{{ $report->description }}</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h4 class="text-sm font-semibold text-slate-900">Kategori</h4>
                        <p class="mt-2 text-slate-600">{{ $report->category }}</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h4 class="text-sm font-semibold text-slate-900">Lokasi</h4>
                        <p class="mt-2 text-slate-600">{{ $report->location ?? 'Tidak diisi' }}</p>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-6">
                    <h4 class="text-sm font-semibold text-slate-900">Bukti Foto</h4>
                    <div class="mt-4 grid gap-3 sm:grid-cols-2">
                        @forelse($report->images ?? [] as $image)
                            <img src="{{ asset('storage/'.$image) }}" alt="Bukti laporan" class="h-52 w-full rounded-2xl object-cover" />
                        @empty
                            <p class="text-slate-600">Belum ada foto yang diunggah.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <aside class="space-y-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-6">
                    <h4 class="text-sm font-semibold text-slate-900">Data ringkas</h4>
                    <dl class="mt-4 space-y-4 text-sm text-slate-600">
                        <div>
                            <dt class="font-medium text-slate-900">Dilaporkan oleh</dt>
                            <dd>{{ $report->user->name }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-slate-900">Tanggal</dt>
                            <dd>{{ $report->created_at->format('d M Y H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-slate-900">Status terakhir</dt>
                            <dd>{{ $report->status }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-slate-900">Waktu resolution</dt>
                            <dd>{{ $report->resolved_at ? $report->resolved_at->diffForHumans() : 'Belum selesai' }}</dd>
                        </div>
                    </dl>
                </div>

                @can('update', $report)
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                        <h4 class="text-sm font-semibold text-slate-900">Tindakan admin</h4>
                        <p class="mt-2 text-sm text-slate-600">Bagian ini hanya tersedia untuk admin agar perubahan status tetap terkontrol.</p>
                        <form action="{{ route('reports.update', $report) }}" method="POST" class="mt-4 space-y-4">
                            @csrf
                            @method('PUT')

                            <label for="status" class="block text-sm font-semibold text-slate-700">Perbarui status</label>
                            <select id="status" name="status" class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500">
                                <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $report->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="resolved" {{ $report->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                            </select>

                            <button type="submit" class="btn-primary w-full px-4 py-3 text-sm font-semibold">Simpan status</button>
                        </form>
                    </div>
                @endcan
            </aside>
        </div>
    </div>
</div>
@endsection
