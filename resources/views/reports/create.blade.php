@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="card p-6 md:p-8">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <span class="eyebrow">Buat Laporan</span>
                <h2 class="mt-4 text-2xl font-semibold tracking-tight text-slate-950">Kirim laporan baru</h2>
                <p class="mt-2 text-slate-600">Isi informasi inti secara singkat agar laporan mudah dipahami dan diproses.</p>
            </div>
            <a href="{{ route('reports.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Kembali ke daftar laporan</a>
        </div>

        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data" class="mt-8 space-y-6">
            @csrf
            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700">Judul laporan</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>

            <div>
                <label for="category" class="block text-sm font-semibold text-slate-700">Kategori</label>
                <select id="category" name="category" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Pilih kategori</option>
                    <option value="jalan rusak" {{ old('category') == 'jalan rusak' ? 'selected' : '' }}>Jalan rusak</option>
                    <option value="sampah" {{ old('category') == 'sampah' ? 'selected' : '' }}>Sampah</option>
                    <option value="pelayanan publik" {{ old('category') == 'pelayanan publik' ? 'selected' : '' }}>Pelayanan publik</option>
                    <option value="lainnya" {{ old('category') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>

            <div>
                <label for="location" class="block text-sm font-semibold text-slate-700">Lokasi</label>
                <input id="location" type="text" name="location" value="{{ old('location') }}" class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500" />
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700">Deskripsi</label>
                <textarea id="description" name="description" rows="6" required class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="images" class="block text-sm font-semibold text-slate-700">Foto / bukti (opsional)</label>
                <input id="images" type="file" name="images[]" multiple accept="image/*" class="mt-2 block w-full text-sm text-slate-700" />
            </div>

            <button type="submit" class="btn-primary w-full px-4 py-3 text-sm font-semibold">Kirim laporan</button>
        </form>
    </div>
</div>
@endsection
