@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <section class="rounded-[2rem] border border-cyan-200 bg-gradient-to-r from-cyan-50 via-sky-50 to-white p-8 shadow-sm">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-cyan-700">Panduan Layanan</p>
            <h2 class="mt-3 text-3xl font-semibold text-slate-900">Bantu warga menemukan prosedur, dokumen, dan kanal pelayanan yang tepat</h2>
            <p class="mt-4 text-slate-700">Fitur ini membuat website lebih berguna untuk masyarakat karena warga tidak harus menunggu bingung dulu sebelum bertindak. Mereka bisa melihat alur umum layanan dan menyiapkan kebutuhan dari awal.</p>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-3">
        @foreach ($serviceCategories as $category)
            <article class="card p-6">
                <h3 class="text-xl font-semibold text-slate-900">{{ $category['name'] }}</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">{{ $category['description'] }}</p>
                <div class="mt-5 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">Checklist Awal</p>
                    <p class="mt-2 text-sm leading-6 text-slate-700">{{ $category['documents'] }}</p>
                </div>
            </article>
        @endforeach
    </section>

    <section class="grid gap-6 lg:grid-cols-[1fr_1fr]">
        <div class="card p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-slate-500">Alur Pelayanan Umum</p>
            <h3 class="mt-3 text-2xl font-semibold text-slate-900">Langkah yang biasanya dialami warga saat mengurus layanan publik</h3>
            <div class="mt-6 space-y-4">
                @foreach ($serviceFlow as $index => $step)
                    <div class="flex items-start gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-cyan-700 text-sm font-semibold text-white">{{ $index + 1 }}</div>
                        <p class="text-sm leading-6 text-slate-700">{{ $step }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-slate-500">Kanal yang Bisa Digunakan</p>
            <h3 class="mt-3 text-2xl font-semibold text-slate-900">Pilihan kanal pelayanan sesuai kebutuhan warga</h3>
            <div class="mt-6 space-y-4">
                @foreach ($publicChannels as $channel)
                    <div class="rounded-3xl border border-slate-200 bg-white p-5">
                        <h4 class="text-lg font-semibold text-slate-900">{{ $channel['title'] }}</h4>
                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ $channel['description'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 rounded-3xl border border-cyan-200 bg-cyan-50 p-5 text-sm text-cyan-900">
                Jika masalah sudah jelas dan perlu ditindaklanjuti, warga bisa langsung membuat laporan dari fitur pelaporan digital.
            </div>
        </div>
    </section>
</div>
@endsection
