@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="card p-8">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-slate-900">Ubah Status Laporan</h2>
                <p class="mt-2 text-slate-600">Perbarui status untuk mendukung transparansi proses pelaporan.</p>
            </div>
            <a href="{{ route('reports.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Kembali ke daftar</a>
        </div>

        <form method="POST" action="{{ route('reports.update', $report) }}" class="mt-8 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="status" class="block text-sm font-medium text-slate-700">Status laporan</label>
                <select id="status" name="status" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500">
                    <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $report->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="resolved" {{ $report->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>
            <button type="submit" class="btn-primary w-full rounded-xl px-4 py-3 text-sm font-semibold">Perbarui status</button>
        </form>
    </div>
</div>
@endsection