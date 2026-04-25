@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <section class="rounded-[2rem] border border-amber-200 bg-gradient-to-r from-amber-50 via-orange-50 to-white p-8 shadow-sm">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-amber-700">Pusat Edukasi Warga</p>
            <h2 class="mt-3 text-3xl font-semibold text-slate-900">Belajar memahami pelayanan publik dengan bahasa yang lebih sederhana</h2>
            <p class="mt-4 text-slate-700">Fitur ini membantu masyarakat memahami cara menyampaikan aduan, mengenali hak dalam pelayanan publik, dan menggunakan kanal digital secara bertanggung jawab.</p>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-3">
        @foreach ($topics as $topic)
            <article class="card p-6">
                <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-amber-700">{{ $topic['badge'] }}</span>
                <h3 class="mt-4 text-xl font-semibold text-slate-900">{{ $topic['title'] }}</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">{{ $topic['summary'] }}</p>
                <ul class="mt-5 space-y-3 text-sm text-slate-700">
                    @foreach ($topic['points'] as $point)
                        <li class="flex items-start gap-3">
                            <span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-amber-500"></span>
                            <span>{{ $point }}</span>
                        </li>
                    @endforeach
                </ul>
            </article>
        @endforeach
    </section>

    <section class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
        <div class="card p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-slate-500">Alur Belajar Cepat</p>
            <h3 class="mt-3 text-2xl font-semibold text-slate-900">5 langkah agar warga lebih siap menggunakan layanan digital pemerintahan</h3>
            <div class="mt-6 space-y-4">
                @foreach ($learningSteps as $index => $step)
                    <div class="flex items-start gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-slate-900 text-sm font-semibold text-white">{{ $index + 1 }}</div>
                        <p class="text-sm leading-6 text-slate-700">{{ $step }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <aside class="card p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-slate-500">Aksi Lanjutan</p>
            <h3 class="mt-3 text-2xl font-semibold text-slate-900">Siap melapor atau butuh panduan?</h3>
            <p class="mt-4 text-sm leading-6 text-slate-600">Setelah membaca edukasi, warga bisa langsung mengirim laporan atau membuka panduan layanan untuk memeriksa prosedur yang sesuai.</p>
            <div class="mt-6 grid gap-3">
                @auth
                    <a href="{{ route('reports.create') }}" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white">Buat Laporan Baru</a>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white">Daftar untuk Melapor</a>
                @endauth
                <a href="{{ route('service-guide') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-700">Buka Panduan Layanan</a>
            </div>
        </aside>
    </section>
</div>
@endsection
