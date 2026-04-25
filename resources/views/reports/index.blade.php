@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            <span class="eyebrow">Laporan</span>
            <h2 class="mt-4 text-2xl font-semibold tracking-tight text-slate-950">Daftar laporan</h2>
            <p class="mt-2 text-slate-600">Pantau status laporan dan ajukan laporan baru dengan tampilan yang lebih ringkas.</p>
            <p class="mt-3 text-sm text-slate-700">
                @if (auth()->user()->isAdmin())
                    Sebagai <strong>admin</strong>, Anda melihat seluruh laporan dari semua pengguna dan dapat memperbarui statusnya.
                @else
                    Sebagai <strong>user</strong>, Anda hanya melihat laporan milik Anda sendiri.
                @endif
            </p>
        </div>
        <a href="{{ route('reports.create') }}" class="btn-primary inline-flex items-center justify-center px-5 py-3 text-sm font-semibold">Buat laporan baru</a>
    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Tanggal</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($reports as $report)
                        <tr class="transition hover:bg-slate-50/80">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">{{ $report->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">{{ $report->category }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="status-tag {{ $report->status }}">{{ str_replace('_', ' ', ucfirst($report->status)) }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $report->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <a href="{{ route('reports.show', $report) }}" class="text-blue-600 hover:text-blue-800">Lihat</a>
                                @can('update', $report)
                                    <a href="{{ route('reports.edit', $report) }}" class="text-slate-600 hover:text-slate-900">Edit</a>
                                @endcan
                                @can('delete', $report)
                                    <form action="{{ route('reports.destroy', $report) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Hapus laporan ini?');">Hapus</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-500">Belum ada laporan. Silakan buat laporan baru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-slate-200 bg-slate-50 px-6 py-4 text-sm text-slate-600">
            {{ $reports->links() }}
        </div>
    </div>
</div>
@endsection
